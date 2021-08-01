<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table ='customer';
    protected $primaryKey = 'username';
    public $incrementing = false;
    public $keyType = 'varchar';
    public $timestamps = false;
}
