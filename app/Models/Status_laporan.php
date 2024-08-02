<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Status_laporan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'status_laporan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_status',

    ];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'status_id');
    }
}
