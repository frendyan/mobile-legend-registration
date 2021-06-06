<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FirstTest extends Model
{
    use HasFactory, Notifiable;
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'opt_a',
        'opt_b',
        'opt_c',
        'opt_d',
        'opt_e',
        'key',
        'image',
    ];
    // protected $guarded = array();
}
