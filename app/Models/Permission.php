<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'page',
        'is_read',
        'is_create',
        'is_update',
        'is_delete',
        'is_custom_update',
        'is_custom_delete',
        'page_id',
        'role_id',
    ];
    public function role_info()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
    public function page_info()
    {
        return $this->belongsTo(Page::class,'page_id');
    }
    public function customs_updats_info()
    {
        return $this->hasMany(CustomUpdate::class,'permition_id');
    }
}
