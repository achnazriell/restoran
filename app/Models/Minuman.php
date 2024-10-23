<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    use HasFactory;

    protected $table = 'minuman';
    protected $primaryKey = 'id_minuman';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_minuman',
        'harga_minuman',
    ];

    public $timestamps = false;

    public function pesan()
    {
        return $this->hasMany(Pesan::class, 'id_minuman');
    }

}
