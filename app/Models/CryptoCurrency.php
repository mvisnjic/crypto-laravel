<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoCurrency extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = ['crypto_id', 'rank', 'name','symbol', 'price', 'percent_change_15m', 'isEdited'];
}
