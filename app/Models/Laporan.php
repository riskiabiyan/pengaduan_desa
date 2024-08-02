<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Laporan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'laporan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kategori_id',
        'status_id',
        'user_id',
        'judul_laporan',
        'isi_laporan',
        'foto',

    ];

    public function statusLaporan()
    {
        return $this->belongsTo(Status_laporan::class, 'status_id');
    }
}
