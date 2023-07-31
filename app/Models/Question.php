<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'code',
        'question',
        'img_question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
        'answer_key',
        'point'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
