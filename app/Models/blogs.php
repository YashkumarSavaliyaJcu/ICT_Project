<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='blogs';
    protected $primaryKey="b_id";
    protected $fillable=['b_title','b_description','b_image','b_url','b_date','b_created_at'];
}