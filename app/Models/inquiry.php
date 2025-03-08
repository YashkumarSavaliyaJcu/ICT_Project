<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiry extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='inquiry';
    protected $primaryKey="i_id";
    protected $fillable=['i_name','i_mobile','i_email','i_message','i_date'];
}
