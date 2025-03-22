<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonial extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='testimonial';
    protected $primaryKey="t_m_id";
    protected $fillable=['name','company_name','image','message'];
}