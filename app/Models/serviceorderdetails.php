<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceorderdetails extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='service_order_details';
    protected $primaryKey="s_o_d_id";
    protected $fillable=['s_o_id','s_id','price'];
}