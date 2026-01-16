<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
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

    public function status()
    {
        return $this->hasOne(
            UserStatusModel::class,
            'user_id',
            'id'
        );
    }

    public function profiles()
    {
        return $this->belongsToMany(
            ProfileModel::class,
            'user_profile',
            'user_id',
            'profile_id'
        );
    }

    public function sectors()
    {
        return $this->profiles()->with('sector')->get()->pluck('sector')->unique();
    }

    public function isSuperAdmin(): bool
    {
        return $this->profiles()->where('name', 'Administrador')->exists();
    }

    public function profile()
    {
        return $this->belongsToMany(
            UserProfileModel::class,
            'user_profile',         // tabela pivot
            'user_id',              // FK pivot para usuário
            'user_profile_model_id' // FK pivot para perfil
        );
    }

    public function registration()
    {
        return $this->hasOne(UserRegistrationModel::class, 'user_id', 'id');
    }

    public function info()
    {
        return $this->hasOne(UserInfoModel::class, 'user_id', 'id');
    }

    public function userStatus()
    {
        return $this->hasOne(UserStatusModel::class, 'user_id');
    }

    public function avatars()
    {
        return $this->hasMany(AvatarModel::class);
    }

    public function currentAvatar()
    {
        return $this->hasOne(AvatarModel::class)->where('current', true);
    }

    public function notifications()
    {
        return $this->hasMany(NotificationModel::class, 'user_id');
    }

        public function documents()
    {
        return $this->hasMany(UserDocumentModel::class);
    }

}
