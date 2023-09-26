<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Draw extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'winning_numbers',
        'jackpot_id',
        'draw_date',
    ];

    protected $casts = [
        'winning_numbers' => 'json',
        'draw_date' => 'date',
    ];

    public function jackpot()
    {
        return $this->belongsTo(Jackpot::class);
    }

    public function drawTickets()
    {
        return $this->hasMany(DrawTicket::class);
    }
}
