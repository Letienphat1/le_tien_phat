<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'description',
        'status',
        'priority',
        'ordering',
        'assigned_to',
        'created_by',
        'start_at',
        'deadline_at',
        'completed_at',
        'remind_at',
    ];
}
