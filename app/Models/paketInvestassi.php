<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paketInvestassi extends Model
{
    protected $table ='paket_investasi';
    protected $primaryKey = 'id_paket';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
