<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesan';
    protected $primaryKey = 'id_pesan';
    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = [
        'id_pelanggan',
        'id_makanan',
        'jumlah_makanan',
        'id_minuman',
        'jumlah_minuman',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'id_makanan');
    }

    public function minuman()
    {
        return $this->belongsTo(Minuman::class, 'id_minuman');
    }
}

