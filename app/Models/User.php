<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\School;
use App\Models\Concerns\WithUuid;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use RomegaDigital\Multitenancy\Traits\HasTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasRoles,
        WithUuid,
        HasTenants;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'username',
        'password',
        'last_login_at'
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
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get user schools
     *
     * @return MorphToMany
     */
    public function schools(): MorphToMany
    {
        return $this->morphToMany(
            School::class,
            'user',
            'user_schools',
            'user_id',
            'school_id'
        );
    }

    /**
     * If is super administrator
     *
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return user()->hasRole(config('multitenancy.roles.super_admin'));
    }

    /**
     * Get landing page of user
     * 
     * This will be using data from database
     *
     * @return string
     */
    public function getLandingPageOfUser(): string
    {
        $user = user();

        if (empty($user)) {
            return route('login');
        }

        return route('client.dashboard');
    }
}
