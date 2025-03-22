<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceorder extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='service_order';
    protected $primaryKey="s_o_id";
    protected $fillable=['date','u_id','order_status','total_amount','address','additional_notes','phone_number','email','full_name','selected_date','suburb','postcode','payment_id','discount_amount','coupon_id'];
}