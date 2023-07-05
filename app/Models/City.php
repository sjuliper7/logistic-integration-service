<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id',
        'province_id',
        'external_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
