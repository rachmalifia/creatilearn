<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'member',
    ];

    public function discussion()
    {
        return $this->hasMany(Discussion::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
