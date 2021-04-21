<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ImageModel extends Authenticatable
{

    protected $table = 'images';
    protected $fillable = [
        'image'
    ];

    public function labels(){
        return $this->hasMany(ImageLabels::class , 'image_id');
    }
}
