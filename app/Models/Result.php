<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_id',
        'notes',
        'presance_recipients'
    ];

    public function letter()
    {
        return $this->hasMany(Letter::class);
    }
}
