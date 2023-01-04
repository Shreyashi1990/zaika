<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PaymentLogs extends Model
{
    use LogsActivity;
    protected $table = 'payment_logs';
    protected $fillable = ['email','name','package_name','package_price','package_gateway','package_id',
        'user_id','tenant_id','attachments','custom_fields','status','track','transaction_id','payment_status','start_date','expire_date','renew_status','is_renew',
        'trial_expire_date','manual_payment_attachment','theme'
    ];

    protected static $recordEvents = ['updated','created','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name','package_name','package_price','user_id']);
    }

    public function package(){
        return $this->belongsTo('App\Models\PricePlan','package_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function price_plan(){
        return $this->hasMany('App\Models\PricePlan','package_id','id');
    }
    
    public function tenant(){
        return $this->belongsTo(Tenant::class,'tenant_id','id');
    }

   protected $casts = [
       'expire_date' => 'datetime',
   ];

}
