<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Subject extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'highlight',
        'url_video',
        'url_pdf'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
