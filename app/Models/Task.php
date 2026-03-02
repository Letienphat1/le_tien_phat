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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function label(string $status): string
    {
        return match ($status) {
            'todo'     => 'Việc cần làm',
            'progress' => 'Đang tiến hành',
            'review'   => 'Đang chờ duyệt',
            'done'     => 'Đã xong',
            default    => 'Không xác định',
        };
    }
}
