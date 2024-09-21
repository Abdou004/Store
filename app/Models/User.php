<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function isAdmin(): bool
    {
        return $this->getAttribute('role') == 'admin';
    }
    public function isEditor(): bool
    {
        return $this->getAttribute('role') == 'editor';
    }
    public function isUser(): bool
    {
        return $this->getAttribute('role') == 'user';
    }

    public function getRedirectRoute()
    {
        if ($this->isEditor()){
            return ('editor_dashboard');
        }elseif ($this->isAdmin()){
            return ('admin_dashboard');
        }
        return RouteServiceProvider::HOME;
    }
}
