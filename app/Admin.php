<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = "username";
    public $incrementing = false;
    public $timestamps = false;
}
