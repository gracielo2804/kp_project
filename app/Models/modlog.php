<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modlog extends Model
{
    protected $table ='log_admin';
    protected $primaryKey = null;
    public $timestamps = true;
    const CREATED_AT = 'tanggal';
    const UPDATED_AT = 'updated_at';
}

