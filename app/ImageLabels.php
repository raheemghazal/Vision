<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ImageLabels extends Authenticatable
{

    protected $table = 'imagelabels';
    protected $fillable = [
        'label' , 'score' , 'image_id'
    ];


    public function iamgemodel(){
        return $this->belongsTo(ImageModel::class , 'image_id');
    }
}
