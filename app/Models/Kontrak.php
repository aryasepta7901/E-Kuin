<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'kontrak_kerja';
    public $incrementing = false;
    protected $guarded = [];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'id_vendor');
    }
    public function name_pbj()
    {
        return $this->belongsTo(User::class, 'pbj');
    }
    public function name_ppk()
    {
        return $this->belongsTo(User::class, 'ppk');
    }
    public function userPPK()
    {
        return $this->belongsTo(UserPPK::class, 'ppk', 'user_id');
    }
    public function jenis()
    {
        return $this->belongsTo(JenisKontrak::class, 'jenis_id');
    }
    public function denda()
    {
        return $this->belongsTo(DendaKontrak::class, 'denda_id');
    }
}
