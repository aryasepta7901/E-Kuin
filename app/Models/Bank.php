<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'bank';
    protected $guarded = [];
    public function vendor()
    {
        return $this->hasMany(Vendor::class, 'bank_id');
    }
}
