<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "courses";
    protected $fillable = [
        'name',
        'description',
        'url',
        'image',
        'views',
        'likes',
        'status',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }



    public function comments()
    {
        return $this->hasMany(Comment::class, 'course_id');
    }



}
