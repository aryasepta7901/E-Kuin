<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendor';

    protected $guarded = [];

    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'id_vendor');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
