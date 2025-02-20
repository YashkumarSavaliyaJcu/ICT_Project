<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='services';
    protected $primaryKey="s_id";
    protected $fillable=['s_title','s_description','s_detail_description','s_image','s_logo','s_url','s_price','cleaning_hour','no_of_cleaner','visiting_hours','s_contact','s_email'];
}