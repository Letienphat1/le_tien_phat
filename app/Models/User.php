<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });
    }

    public function getRoleNameAttribute()
    {
        return match ($this->role) {
            'admin'   => 'Quản trị viên',
            'manager' => 'Quản lý',
            'staff'   => 'Nhân viên',
            default   => 'Không xác định',
        };
    }

    public function getStatusNameAttribute()
    {
        return match ($this->status) {
            'active'   => 'Hoạt động',
            'locked' => 'Bị khóa',
            'pending'   => 'Đang chờ',
            default   => 'Không xác định',
        };
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'active'   => 'green',
            'locked' => 'red',
            'pending'   => 'amber',
            default   => 'Không xác định',
        };
    }
}
