<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessSample extends Model
{
    use HasFactory;

    protected $table = 'access_samples';
    protected $guarded = [];

    public function accesses()
    {
        return $this->hasMany(Access::class, 'sample_id', 'id');
    }
    public function access_type()
    {
        return $this->belongsTo(AccessType::class, 'type_id', 'id');
    }
}