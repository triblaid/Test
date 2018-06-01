<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texts_user extends Model
{
    protected $fillable = ['user','caption','text','link'];
}
