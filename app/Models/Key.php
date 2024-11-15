<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "verification_keys";
    protected $fillable = [
        'key',
    ];
}
