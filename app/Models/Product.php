<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // the table name
    protected $fillable = ['name', 'description', 'price'];
}