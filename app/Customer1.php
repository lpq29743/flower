<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer1 extends Model
{
    protected $table = 'customer1';
    protected $primaryKey = "custID";
    public $timestamps = false;
}
