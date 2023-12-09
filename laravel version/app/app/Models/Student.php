<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'rollno'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
