<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table ='image';
    protected $primaryKey = 'image_id';
    public $incrementing = false;

    protected $fillable= [
        'image_name',
        'username'
    ];

    public $timestamps = true;

    public function tag() {
        return $this->belongsToMany(Tag::class, 'image_tag');
    }
}
