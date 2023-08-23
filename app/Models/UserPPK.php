<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPPK extends Model
{
    use HasFactory;
    protected $table = 'user_ppk';
    protected $guarded = [];
    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'ppk', 'user_id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
