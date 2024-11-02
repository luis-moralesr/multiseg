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
        'duration',
        'image',
        'views',
        'likes',
        'status',
    ];
}
