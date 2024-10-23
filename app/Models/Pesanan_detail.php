<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pesanan_detail';
    protected $primaryKey = 'id_detail';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_pesan',
    ];

    public $timestamps = true;

    public function pesan()
    {
        return $this->belongsTo(Pesan::class, 'id_pesan');
    }
}
