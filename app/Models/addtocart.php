<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addtocart extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='add_to_cart';
    protected $primaryKey="id";
    protected $fillable=['s_id','u_id'];
}