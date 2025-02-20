<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='users';
    protected $primaryKey="u_id";
    protected $fillable=['name','password','email','status','u_type','forgot_otp'];
}