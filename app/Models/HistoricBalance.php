<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class HistoricBalance extends Model
{
    use HasFactory;
    protected $collection = 'historic_balance';

    protected $fillable = [
        'month',
        'balance',
        'account_id',
    ];
}
