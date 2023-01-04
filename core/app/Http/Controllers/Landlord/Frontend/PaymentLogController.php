<?php

namespace App\Http\Controllers\Landlord\Frontend;

use App\Helpers\Payment\DatabaseUpdateAndMailSend\LandlordPricePlanAndTenantCreate;
use App\Helpers\Payment\PaymentGatewayCredential;
use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Models\PaymentLogs;
use App\Models\PricePlan;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PaymentLogController extends Controller
{
    private const SUCCESS_ROUTE = 'landlord.frontend.order.payment.success';
    private const STATIC_CANCEL_ROUTE = 'landlord.frontend.order.payment.cancel.static';

    private static function go_home_page()
    {
        return redirect()->route('landlord.homepage');
    }

    public function order_payment_form(Request $request)
    {
        $request_pack_id = $request->package_id;
        $request->validate([
            'name' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'package_id' => 'required|string',
            'payment_gateway' => 'nullable|string',
            'subdomain' => "required_if:custom_subdomain,!=,null",
            'custom_subdomain' => "required_if:subdomain,==,custom_domain__dd",
        ],
            [
                "custom_subdomain.required_if" => "Custom Sub Domain Required",
                "trasaction_id" => "Transaction ID Required",
                "trasaction_attachment" => "Transaction Attachment Required",
            ]);

        if ($request->custom_subdomain == null) {
            $request->validate([
                'subdomain' => 'required'
            ]);

            $exising_lifetime_plan = PaymentLogs::where(['tenant_id' => $request->subdomain, 'payment_status' => 'complete', 'expire_date' => null])->first();
            if ($exising_lifetime_plan != null) {
                return back()->with(['type' => 'danger', 'msg' => 'You are already using a lifetime plan']);
            }
        }


        if ($request->custom_subdomain != null) {
            $has_subdomain = Tenant::find(trim($request->custom_subdomain));
            if (!empty($has_subdomain)) {
                return back()->with(['type' => 'danger', 'msg' => 'This subdomain is already in use, Try something different']);
            }
        }

        $order_details = PricePlan::find($request->package_id) ?? '';

        $package_start_date = '';
        $package_expire_date = '';

        if (!empty($order_details)) {
            if ($order_details->type == 0) { //monthly
                $package_start_date = Carbon::now()->format('d-m-Y h:i:s');
                $package_expire_date = Carbon::now()->addMonth(1)->format('d-m-Y h:i:s');

            } elseif ($order_details->type == 1) { //yearly
                $package_start_date = Carbon::now()->format('d-m-Y h:i:s');
                $package_expire_date = Carbon::now()->addYear(1)->format('d-m-Y h:i:s');
            } else { //lifetime
                $package_start_date = Carbon::now()->format('d-m-Y h:i:s');
                $package_expire_date = null;
            }
        }

        if ($request->subdomain != 'custom_domain__dd') {
            $subdomain = Str::slug($request->subdomain);
        } else {
            $subdomain = Str::slug($request->custom_subdomain);
        }

        $amount_to_charge = $order_details->price;
        $request_date_remove = $request;

        $selected_payment_gateway = $request_date_remove['selected_payment_gateway'] ?? $request_date_remove['payment_gateway'];
        $package_id = $request_date_remove['package_id'];
        $name = $request_date_remove['name'];
        $email = $request_date_remove['email'];
        $trasaction_id = $request_date_remove['trasaction_id'];

        if ($request->trasaction_attachment != null) {
            $image = $request->file('trasaction_attachment');
            $image_extenstion = $image->extension();
            $image_name_with_ext = $image->getClientOriginalName();

            $image_name = pathinfo($image_name_with_ext, PATHINFO_FILENAME);
            $image_name = strtolower(Str::slug($image_name));
            $image_db = $image_name . time() . '.' . $image_extenstion;

            $path = global_assets_path('assets/landlord/uploads/payment_attachments/');
            $image->move($path, $image_db);
        }
        $trasaction_attachment = $image_db ?? null;

        unset($request_date_remove['custom_form_id']);
        unset($request_date_remove['selected_payment_gateway']);
        unset($request_date_remove['payment_gateway']);
        unset($request_date_remove['package_id']);
        unset($request_date_remove['package']);
        unset($request_date_remove['pkg_user_name']);
        unset($request_date_remove['pkg_user_email']);
        unset($request_date_remove['name']);
        unset($request_date_remove['email']);
        unset($request_date_remove['trasaction_id']);
        unset($request_date_remove['trasaction_attachment']);

        $auth = auth()->guard('web')->user();
        $auth_id = $auth->id;

        $is_tenant = Tenant::find($subdomain);

        DB::beginTransaction(); // Starting all the actions as safe translations
        try {
            // Exising Tenant + Plan
            if (!is_null($is_tenant)) {
                $old_tenant_log = PaymentLogs::where(['user_id' => $auth_id, 'tenant_id' => $is_tenant->id])->latest()->first() ?? '';

                // If Payment Renewing
                if (!empty($old_tenant_log->package_id) == $request_pack_id && !empty($old_tenant_log->user_id) && $old_tenant_log->user_id == $auth_id && $old_tenant_log->payment_status == 'complete') {
                    if ($package_expire_date != null) {
                        $old_days_left = Carbon::now()->diff($old_tenant_log->expire_date);
                        $left_days = 0;

                        if ($old_days_left->invert == 0) {
                            $left_days = $old_days_left->days;
                        }

                        $renew_left_days = 0;
                        $renew_left_days = Carbon::parse($package_expire_date)->diffInDays();

                        $sum_days = $left_days + $renew_left_days;
                        $new_package_expire_date = Carbon::today()->addDays($sum_days)->format("d-m-Y h:i:s");
                    } else {
                        $new_package_expire_date = null;
                    }

                    PaymentLogs::findOrFail($old_tenant_log->id)->update([
                        'email' => $email,
                        'name' => $name,
                        'package_name' => $order_details->getTranslation('title',get_user_lang()),
                        'package_price' => $amount_to_charge,
                        'package_gateway' => $selected_payment_gateway,
                        'package_id' => $package_id,
                        'user_id' => auth()->guard('web')->user()->id ?? null,
                        'tenant_id' => $subdomain ?? null,
                        'status' => 'pending',
                        'payment_status' => 'pending',
                        'renew_status' => is_null($old_tenant_log->renew_status) ? 1 : $old_tenant_log->renew_status + 1,
                        'is_renew' => 1,
                        'track' => Str::random(10) . Str::random(10),
                        'updated_at' => Carbon::now(),
                        'start_date' => $package_start_date,
                        'expire_date' => $new_package_expire_date,
                        'theme' => $request->theme_slug ?? $old_tenant_log->theme
                    ]);

                    $tenant = Tenant::find($old_tenant_log->tenant_id);
                    \DB::table('tenants')->where('id', $tenant->id)->update([
                        'renew_status' => $tenant->renew_status + 1,
                        'is_renew' => 1,
                    ]);

                    $payment_details = PaymentLogs::findOrFail($old_tenant_log->id);
                } // If Payment Pending
                elseif (!empty($old_tenant_log) && $old_tenant_log->payment_status == 'pending') {
                    PaymentLogs::findOrFail($old_tenant_log->id)->update([
                        'email' => $email,
                        'name' => $name,
                        'package_name' => $order_details->getTranslation('title',get_user_lang()),
                        'package_price' => $amount_to_charge,
                        'package_gateway' => $selected_payment_gateway,
                        'package_id' => $package_id,
                        'user_id' => auth()->guard('web')->user()->id ?? null,
                        'tenant_id' => $subdomain ?? null,
                        'status' => 'pending',
                        'payment_status' => 'pending',
                        'is_renew' => $old_tenant_log->renew_status != null ? 1 : 0,
                        'track' => Str::random(10) . Str::random(10),
                        'updated_at' => Carbon::now(),
                        'start_date' => $package_start_date,
                        'expire_date' => $package_expire_date
                    ]);

                    $payment_details = PaymentLogs::findOrFail($old_tenant_log->id);
                }
            } // New Tenant + Plan (New Payment)
            else {
                $old_tenant_log = PaymentLogs::where(['user_id' => $auth_id, 'tenant_id' => trim($request->custom_subdomain)])->latest()->first();
                if (empty($old_tenant_log)) {
                    $payment_log_id = PaymentLogs::create([
                        'email' => $email,
                        'name' => $name,
                        'package_name' => $order_details->getTranslation('title',get_user_lang()),
                        'package_price' => $amount_to_charge,
                        'package_gateway' => $selected_payment_gateway,
                        'package_id' => $package_id,
                        'user_id' => auth()->guard('web')->user()->id ?? null,
                        'tenant_id' => $subdomain ?? null,
                        'status' => 'pending',
                        'payment_status' => 'pending',
                        'is_renew' => 0,
                        'track' => Str::random(10) . Str::random(10),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'start_date' => $package_start_date,
                        'expire_date' => $package_expire_date,
                        'theme' => $request->theme_slug
                    ])->id;

                    $payment_details = PaymentLogs::findOrFail($payment_log_id);
                } else {
                    $old_tenant_log->update([
                        'email' => $email,
                        'name' => $name,
                        'package_name' => $order_details->getTranslation('title',get_user_lang()),
                        'package_price' => $amount_to_charge,
                        'package_gateway' => $selected_payment_gateway,
                        'package_id' => $package_id,
                        'user_id' => auth()->guard('web')->user()->id ?? null,
                        'status' => 'pending',
                        'payment_status' => 'pending',
                        'is_renew' => 0,
                        'track' => Str::random(10) . Str::random(10),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'start_date' => $package_start_date,
                        'expire_date' => $package_expire_date,
                        'theme' => $request->theme_slug ?? 'theme-1'
                    ]);

                    $payment_details = PaymentLogs::findOrFail($old_tenant_log->id);
                }
            }

            DB::commit(); // Committing all the actions
        } catch (\Exception $exception) {
            DB::rollBack(); // Rollback all the actions
            return back()->with('msg', 'Something went wrong');
        }

        if ($selected_payment_gateway === 'paypal') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.paypal.ipn'));
            $paypal = PaymentGatewayCredential::get_paypal_credential();
            return $paypal->charge_customer($params);

        } elseif ($selected_payment_gateway === 'paytm') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.paytm.ipn'));
            $paytm = PaymentGatewayCredential::get_paytm_credential();
            return $paytm->charge_customer($params);

        } elseif ($selected_payment_gateway === 'mollie') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.mollie.ipn'));
            $mollie = PaymentGatewayCredential::get_mollie_credential();
            return $mollie->charge_customer($params);

        } elseif ($selected_payment_gateway === 'stripe') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.stripe.ipn'));

            $stripe = PaymentGatewayCredential::get_stripe_credential();
            return $stripe->charge_customer($params);

        } elseif ($selected_payment_gateway === 'razorpay') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.razorpay.ipn'));
            $razorpay = PaymentGatewayCredential::get_razorpay_credential();
            return $razorpay->charge_customer($params);

        } elseif ($selected_payment_gateway === 'flutterwave') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.flutterwave.ipn'));
            $flutterwave = PaymentGatewayCredential::get_flutterwave_credential();
            return $flutterwave->charge_customer($params);

        } elseif ($selected_payment_gateway === 'paystack') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.paystack.ipn'));
            $paystack = PaymentGatewayCredential::get_paystack_credential();
            return $paystack->charge_customer($params);

        } elseif ($selected_payment_gateway === 'midtrans') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.midtrans.ipn'));
            $midtrans = PaymentGatewayCredential::get_midtrans_credential();
            return $midtrans->charge_customer($params);

        } elseif ($selected_payment_gateway == 'payfast') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.payfast.ipn'));
            $payfast = PaymentGatewayCredential::get_payfast_credential();
            return $payfast->charge_customer($params);

        } elseif ($selected_payment_gateway == 'cashfree') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.cashfree.ipn'));
            $cashfree = PaymentGatewayCredential::get_cashfree_credential();
            return $cashfree->charge_customer($params);

        } elseif ($selected_payment_gateway == 'instamojo') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.instamojo.ipn'));
            $instamojo = PaymentGatewayCredential::get_instamojo_credential();
            return $instamojo->charge_customer($params);

        } elseif ($selected_payment_gateway == 'marcadopago') {

            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.marcadopago.ipn'));
            $marcadopago = PaymentGatewayCredential::get_marcadopago_credential();
            return $marcadopago->charge_customer($params);

        }
        elseif($selected_payment_gateway == 'squareup')
        {
            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.squareup.ipn'));
            $squareup = PaymentGatewayCredential::get_squareup_credential();
            return $squareup->charge_customer($params);
        }

        elseif($selected_payment_gateway == 'cinetpay')
        {
            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.cinetpay.ipn'));
            $cinetpay = PaymentGatewayCredential::get_cinetpay_credential();
            return $cinetpay->charge_customer($params);
        }

        elseif($selected_payment_gateway == 'paytabs')
        {
            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.paytabs.ipn'));
            $paytabs = PaymentGatewayCredential::get_paytabs_credential();
            return $paytabs->charge_customer($params ?? []);
        }
        elseif($selected_payment_gateway == 'billplz')
        {
            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.billplz.ipn'));
            $billplz = PaymentGatewayCredential::get_billplz_credential();
            return $billplz->charge_customer($params);
        }
        elseif($selected_payment_gateway == 'zitopay')
        {
            $params = $this->common_charge_customer_data($amount_to_charge,$payment_details,$request,route('landlord.frontend.zitopay.ipn'));
            $zitopay = PaymentGatewayCredential::get_zitopay_credential();
            return $zitopay->charge_customer($params);
        }
        elseif ($selected_payment_gateway == 'manual_payment')
        {
            $this->validate($request, [
                'manual_payment_attachment' => 'required|file'
            ], ['manual_payment_attachment.required' => __('Bank Attachment Required')]);

            $fileName = time().'.'.$request->manual_payment_attachment->extension();
            $request->manual_payment_attachment->move('assets/uploads/attachment/',$fileName);
            LandlordPricePlanAndTenantCreate::send_order_mail($payment_details->id);
            PaymentLogs::where('id', $payment_details->id)->update(['manual_payment_attachment' => $fileName,'status' => 'pending']);
            $order_id = Str::random(6) .$payment_details->id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE,$order_id);
        }
        return redirect()->route('landlord.homepage');
    }

    public function paypal_ipn()
    {
        $paypal = PaymentGatewayCredential::get_paypal_credential();
        try{
            $payment_data = $paypal->ipn_response();
        }catch(\Exception $e){
           self::go_home_page();
        }

        return $this->common_ipn_data($payment_data);
    }

    public function paytm_ipn()
    {
        $paytm = PaymentGatewayCredential::get_paytm_credential();

        try{
            $payment_data = $paytm->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function flutterwave_ipn()
    {
        $flutterwave = PaymentGatewayCredential::get_flutterwave_credential();

        try{
            $payment_data = $flutterwave->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function stripe_ipn()
    {
        $stripe = PaymentGatewayCredential::get_stripe_credential();
        try{
            $payment_data = $stripe->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function razorpay_ipn()
    {
        $razorpay = PaymentGatewayCredential::get_razorpay_credential();
        try{
            $payment_data = $razorpay->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function paystack_ipn()
    {
        $paystack = PaymentGatewayCredential::get_paystack_credential();
        try{
            $payment_data = $paystack->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function payfast_ipn()
    {
        $payfast = PaymentGatewayCredential::get_payfast_credential();
        try{
            $payment_data = $payfast->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function mollie_ipn()
    {
        $mollie = PaymentGatewayCredential::get_mollie_credential();
        try{
            $payment_data = $mollie->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function midtrans_ipn()
    {
        $midtrans = PaymentGatewayCredential::get_midtrans_credential();
        try{
            $payment_data = $midtrans->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }

        return $this->common_ipn_data($payment_data);
    }

    public function cashfree_ipn()
    {
        $cashfree = PaymentGatewayCredential::get_cashfree_credential();
        try{
            $payment_data = $cashfree->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }

        return $this->common_ipn_data($payment_data);
    }

    public function instamojo_ipn()
    {
        $instamojo = PaymentGatewayCredential::get_instamojo_credential();
        try{
            $payment_data = $instamojo->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function marcadopago_ipn()
    {
        $marcadopago = PaymentGatewayCredential::get_marcadopago_credential();
        try{
            $payment_data = $marcadopago->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }

        return $this->common_ipn_data($payment_data);
    }

    public function squareup_ipn()
    {
        $squareup = PaymentGatewayCredential::get_squareup_credential();
        try{
            $payment_data = $squareup->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function cinetpay_ipn()
    {
        $cinetpay = PaymentGatewayCredential::get_cinetpay_credential();
        try{
            $payment_data = $cinetpay->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }

    public function paytabs_ipn()
    {
        $paytabs = PaymentGatewayCredential::get_paytabs_credential();

        try{
            $payment_data = $paytabs->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }

        return $this->common_ipn_data($payment_data);
    }

    public function billplz_ipn()
    {
        $billplz = PaymentGatewayCredential::get_billplz_credential();

        try{
            $payment_data = $billplz->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }

        return $this->common_ipn_data($payment_data);
    }

    public function zitopay_ipn()
    {
        $zitopay = PaymentGatewayCredential::get_zitopay_credential();
        try{
            $payment_data = $zitopay->ipn_response();
        }catch(\Exception $e){
            self::go_home_page();
        }
        return $this->common_ipn_data($payment_data);
    }


    private function common_charge_customer_data($amount_to_charge,$payment_details,$request,$ipn_url) : array
    {
        $data = [
            'amount' => $amount_to_charge,
            'title' => $payment_details->package_name,
            'description' => 'Payment For Package Order Id: #' . $request->package_id . ' Package Name: ' . $payment_details->package_name .
                'Payer Name: ' . $request->name . ' Payer Email:' . $request->email,
            'order_id' => $payment_details->id,
            'track' => $payment_details->track,
            'cancel_url' => route(self::STATIC_CANCEL_ROUTE),
            'success_url' => route(self::SUCCESS_ROUTE, $payment_details->id),
            'email' => $payment_details->email,
            'name' => $payment_details->name,
            'payment_type' => 'order',
            'ipn_url' => $ipn_url,
        ];

        return $data;
    }

    private function common_ipn_data($payment_data)
    {
        
       
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            
            try{
                    LandlordPricePlanAndTenantCreate::update_database($payment_data['order_id'], $payment_data['transaction_id']);
                    LandlordPricePlanAndTenantCreate::tenant_create_event_with_credential_mail($payment_data['order_id']);
                    LandlordPricePlanAndTenantCreate::update_tenant($payment_data);
                    LandlordPricePlanAndTenantCreate::send_order_mail($payment_data['order_id']);
            
            }catch(\Exception $e){
         
                $payment_details = PaymentLogs::find($payment_data['order_id']);

                LandlordPricePlanAndTenantCreate::store_exception($payment_details->tenant_id,'domain create',$e->getMessage(),0);

                //todo: send an email to admin that this user databse could not able to create automatically

                try {

                    $message = sprintf(__('Database Crating failed for user id %1$s , please checkout admin panel and generate database for this user from admin panel manually'),
                        $payment_details->user_id);
                    $subject = sprintf(__('Database Crating failed for user id %1$s'),$payment_details->user_id);
                    Mail::to(get_static_option('site_global_email'))->send(new BasicMail($message,$subject));

                } catch (\Exception $e) {
                 
       
                      LandlordPricePlanAndTenantCreate::store_exception($payment_details->tenant_id,'domain failed email',$e->getMessage(),0);
                }
            }

            $order_id = wrap_random_number($payment_data['order_id']);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }

        return redirect()->route(self::STATIC_CANCEL_ROUTE);
    }

}
