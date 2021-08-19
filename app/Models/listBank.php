<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listBank extends Model
{
    protected $table ='list_bank';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
