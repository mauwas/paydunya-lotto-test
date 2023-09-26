<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jackpot extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'amount',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function draw()
    {
        return $this->hasOne(Draw::class);
    }
}
