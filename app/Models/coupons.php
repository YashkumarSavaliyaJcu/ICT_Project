<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupons extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='coupons';
    protected $primaryKey="coupon_id";
    protected $fillable=['title','description','code','min_amount','c_image','c_amount'];
    
}