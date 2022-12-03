<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $table = 'accesses';
    protected $guarded = [];

    public function userId()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function typeId()
    {
        return $this->hasMany(Type::class, 'id', 'type_id');
    }
}