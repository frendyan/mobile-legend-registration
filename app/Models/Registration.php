<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Registration extends Model
{
    use HasFactory, Notifiable;
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'alamat',
        'provinsi',
        'kecamatan',
        'kota',
        'jk',
        'foto',
        'pos',
        'telp',
    ];
    // protected $guarded = array();
}
