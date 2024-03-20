<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [
        'full_url',
    ];

    public function getFullUrlAttribute(){
        return asset($this->url);
    }
}

