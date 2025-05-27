<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranStok extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'jumlah_keluar',
        'tanggal_keluar',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_keluar' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
