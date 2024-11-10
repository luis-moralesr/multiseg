<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = "enrollments";

    protected $fillable = [
        'student_id',
        'course_id',
        'progress',
        'completed',

    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function certification()
    {
        return $this->hasOne(Certification::class, 'enrollment_id');
    }
}
