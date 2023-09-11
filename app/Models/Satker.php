<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;
    protected $table = 'satker';
    public $incrementing = false;
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'satker_id');
    }
    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'satker_id');
    }
}
