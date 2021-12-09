<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dividen extends Model
{
    protected $table ='history_dividen';
    protected $primaryKey = null;
    public $timestamps = true;
    const CREATED_AT = 'tanggal_pembagian';
    const UPDATED_AT = 'updated_at';
}
