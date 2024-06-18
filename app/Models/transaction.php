<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $collection = 'transactions';
    protected $fillable = [
        'sending_account',
        'receiving_account',
        'ammount',
    ];
}
