<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'uci_tasks';

    protected $fillable = [
        'name', 'description', 'deadline', 'duration', 'status', 'pu_id'
    ];

    public function progresses() {
        return $this->hasMany(Progress::class, 'task_id', 'id');
    }

    public function projectuser() {
        return $this->belongsTo(ProjectUser::class, 'pu_id', 'id');
    }
}
