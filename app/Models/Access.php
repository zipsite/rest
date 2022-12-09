<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $table = 'accesses';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function access_sample()
    {
        return $this->belongsTo(AccessSample::class, 'sample_id', 'id');
    }
}