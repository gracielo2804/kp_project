<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmEmail extends Model
{
    protected $table ='konfirmasi_email';   
    public $incrementing = false;
    public $timestamps = true;
}
