<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipTier extends Model
{
    protected $fillable = [
        'name',
        'min_transactions',
        'max_transactions',
        'color',
        'creator_id',
        'status',
    ];

    protected $casts = [
        'min_transactions' => 'int',
        'max_transactions' => 'int',
        'status' => 'int',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->creator_id = 1;
        });
    }
}
