<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = [];
    
    public function accesses() {
        return $this->hasMany(Access::class, 'user_id', 'id');
    }
}
