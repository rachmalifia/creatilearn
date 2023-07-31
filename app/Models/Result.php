<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id',
        'code',
        'no1',
        'no2',
        'no3',
        'no4',
        'no5',
        'no6',
        'no7',
        'no8',
        'no9',
        'no10',
        'no11',
        'no12',
        'no13',
        'no14',
        'no15',
        'no16',
        'no17',
        'no18',
        'no19',
        'no20',
        'no21',
        'no22',
        'no23',
        'no24',
        'no25',
        'no26',
        'no27',
        'no28',
        'no29',
        'no30',
        'no31',
        'no32',
        'no33',
        'no34',
        'no35',
        'score'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
