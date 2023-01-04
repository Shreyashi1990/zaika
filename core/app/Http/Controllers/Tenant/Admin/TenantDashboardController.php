<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Helpers\EmailHelpers\VerifyUserMailSend;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\PageBuilder;
use App\Models\PaymentLogs;
use App\Models\PricePlan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Modules\Blog\Entities\Blog;
use Modules\Service\Entities\Service;
use function __;
use function auth;
use function response;
use function view;


class TenantDashboardController extends Controller
{
    const BASE_PATH = 'tenant.admin.';

    public function redirect_to_tenant_admin_panel(){
        $user_details = Auth::guard('web')->user();
        return redirect()->to(get_tenant_website_url($user_details).'/admin-home');
    }

    public function dashboard(){
        $total_admin = Admin::count();
        $total_user= User::count();
        $all_blogs = Blog::count();
        $total_services = Service::count();;
        $total_price_plan = PricePlan::count();
        $total_brand = Brand::all()->count();
        $recent_order_logs = PaymentLogs::orderBy('id','desc')->take(5)->get();
        $current_package = tenant()->user()->first()->payment_log()->first();
    

        return view(self::BASE_PATH.'admin-home',compact('total_admin','total_user','all_blogs',
                    'total_services','total_price_plan','total_brand','recent_order_logs','current_package'));
    }

    /* work later */
    public function verify_user_email(){
        return view('landlord.frontend.auth.login');
    }
    public function change_password(){
        return view(self::BASE_PATH.'profile.change-password');
    }
    public function edit_profile(){
        return view(self::BASE_PATH.'profile.edit-profile');
    }
    public function update_change_password(Request $request){
        $this->validate($request,[
           'password' => 'required|confirmed|min:8'
        ]);

        //
        tenant()->user()->name = 'asdfasdf';
            tenant()->user()->save();

            Http::withToken(tenant()->user()->plain_text_token)->post('',[]);

        User::find(auth('web')->id())->update(['password'=> Hash::make($request->password)]);
        Auth::guard('web')->logout();
        return response()->success(__('Password Change Success'));
    }
    public function update_edit_profile(Request $request){
        $this->validate($request,[
           'name' => 'required|string',
           'email' => 'required|email',
           'mobile' => 'nullable|numeric',
           'company' => 'nullable|string',
           'city' => 'nullable|string',
           'state' => 'nullable|string',
           'address' => 'nullable|string',
           'country' => 'nullable|string',
           'image' => 'nullable|integer',
        ]);

        User::find(auth('web')->id())->update([
            'name' => $request->name,
            'email' => $request->email ,
            'mobile' => $request->mobile ,
            'company' => $request->company ,
            'city' => $request->city ,
            'state' => $request->state ,
            'address' => $request->address ,
            'country' => $request->country ,
            'image' => $request->image ,
        ]);

        return response()->success(__('Settings Saved'));
    }

}
