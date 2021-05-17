<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    const CREATED_AT = null;

    protected $fillable = ['char_code', 'name', 'rate'];

    public function history()
    {
        return $this->hasMany(CurrencyHistory::class, 'currency_id');
    }
}
