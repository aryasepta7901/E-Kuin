<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    public $incrementing = false;
    protected $guarded = [];

    public function pbj()
    {
        return $this->hasMany(Kontrak::class, 'pbj');
    }
    public function ppk()
    {
        return $this->hasMany(Kontrak::class, 'ppk');
    }
    public function userPPK()
    {
        return $this->belongsTo(UserPPK::class, 'id', 'user_id');
    }
}
