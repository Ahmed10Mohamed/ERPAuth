<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'page',
        'permation',
        'role_id'
    ];
    public function role_info()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

}
