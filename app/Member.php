<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = "email";
    public $incrementing = false;
    public $timestamps = false;
}
