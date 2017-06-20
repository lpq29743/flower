<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopList extends Model
{
    protected $table = 'shoplist';
    protected $primaryKey = "SLID";
    public $timestamps = false;
}
