<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Modules\Master\Entities\Tenant;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Master\Tenant\TenantRepository;
use Modules\Master\Tenant\Traits\ForTenants;

class User extends Authenticatable implements MustVerifyEmail, TenantRepository
{
    use Uuid, Notifiable, ForTenants;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getTenantId()
    {
        return $this->tenant_id;
    }

    /**
     * Related to setting
     *
     * @return BelongsToMany
     */
    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class);
    }
}
