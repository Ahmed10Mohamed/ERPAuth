<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomUpdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'col','exp','db_type','value','permition_id','page_custom','page_type'
    ];
}
