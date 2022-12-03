<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAccess extends Model
{
    use HasFactory;

    protected $table = 'type_accesses';
    protected $guarded = [];

    public function accesses()
    {
        return $this->hasMany(Access::class, 'type_id', 'id');
    }
}