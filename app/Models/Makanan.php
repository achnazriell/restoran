<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_makanan',
        'harga_makanan',
        'foto_makanan',
    ];

    public $timestamps = false;

    public function pesan()
    {
        return $this->hasMany(Pesan::class, 'id_makanan');
    }
}
