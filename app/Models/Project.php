<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'assigned_leader',
        'status',
        'deadline_at',
    ];

    public function getStatusNameProjectAttribute()
    {
        return match ($this->status) {
            'pending'   => 'Đang chờ',
            'progress' => 'Đang làm',
            'done'   => 'Đã xong',
            default   => 'Không xác định',
        };
    }

    public function getStatusColorProjectAttribute()
    {
        return match ($this->status) {
            'pending'   => 'red',
            'progress' => 'yellow',
            'done'   => 'green',
            default   => 'Không xác định',
        };
    }

    public function tasks()
{
    return $this->hasMany(Task::class)->orderBy('ordering');
}

}
