<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vueform extends Model
{
    use HasFactory;
    protected $table='vueforms';
    protected $fillable=['name','email','course','gender'];
}
