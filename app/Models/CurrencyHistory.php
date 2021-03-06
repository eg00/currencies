<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyHistory extends Model
{
    use HasFactory;

    protected $table = 'currency_history';

    const UPDATED_AT = null;

    protected $fillable = ['rate'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
