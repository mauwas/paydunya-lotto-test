<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'code',
        'numbers',
        'user_id',
        'is_expire',
    ];

    protected $casts = [
        'is_expire' => 'boolean',
        'numbers' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drawTicket()
    {
        return $this->hasOne(DrawTicket::class);
    }

    public function scopeOfActive(Builder $query, $userId)
    {
        $query->where('user_id', $userId)->where('is_expire', 0)->first();
    }
}
