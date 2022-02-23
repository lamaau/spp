<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\School;
use App\Models\Concerns\WithUuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        WithUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
     * First school of user logged in
     *
     * @return School|null
     */
    public function getFirstSchoolOfUser(): School|null
    {
        $user = user();

        if (empty($user)) {
            return null;
        }

        $school = $user->withoutEvents(function () use ($user) {
            return $user->schools()->first();
        });

        if (empty($school)) {
            return null;
        }

        return $school;
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
        if (empty(user())) {
            return route('login');
        }

        $school = school() ?: $this->getFirstSchoolOfUser()?->id;

        return route('dashboard', ['school' => $school]);
    }
}
