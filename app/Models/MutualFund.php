<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutualFund extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fund_name',
        'amount',
        'date',
        'status',
        'reference_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
