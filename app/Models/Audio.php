<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $table = 'audio';
    protected $primaryKey = "audio_id";
    protected $fillable = [
        'audio_name',
        'url',
        'username',
    ];
    public $timestamps = true;
}
