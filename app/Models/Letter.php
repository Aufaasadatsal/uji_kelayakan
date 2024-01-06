<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_type_id',
        'letter_perihal',
        'recipients',
        'content',
        'attachment',
        'notulis',
    ];

    protected $casts = [
        'recipients' => 'array',
        // 'attachment' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'notulis', 'id');
    }

    public function lettertype()
    {
        return $this->belongsTo(Letter_type::class, 'letter_type_id', 'id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'letter_id', 'id');
    }
}
