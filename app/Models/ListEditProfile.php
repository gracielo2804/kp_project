<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListEditProfile extends Model
{
    protected $table ='list_edit_profile';
    protected $primaryKey = null;
    public $timestamps = true;
    const CREATED_AT = 'tanggal';
    const UPDATED_AT = 'updated_at';
}

