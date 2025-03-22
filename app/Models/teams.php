<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teams extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='teams';
    protected $primaryKey="t_id";
    protected $fillable=['name','position','t_image','twitter','instagram','youtube','facebook'];
}