<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DendaKontrak extends Model
{
    use HasFactory;
    protected $table = 'denda_kontrak';
    protected $guarded = [];
    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'jenis_id');
    }
}
