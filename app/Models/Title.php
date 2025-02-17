<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function lecturers() {
        return $this->hasMany(Lecturer::class, 'title_id', 'id');
    }
    public function staffs() {
        return $this->hasMany(Staff::class, 'title_id', 'id');
    }
}
