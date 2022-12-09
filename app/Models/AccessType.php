<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessType extends Model
{
    use HasFactory;

    protected $table = 'access_types';
    protected $guarded = [];

    public function access_samples()
    {
        return $this->hasMany(AccessSample::class, 'type_id', 'id');
    }
}