<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $table = 'flower';
    protected $primaryKey = "flowerID";
    public $incrementing = false;
    public $timestamps = false;
}
