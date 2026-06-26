<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['tag', 'title', 'description', 'image_path', 'priority'];
}
