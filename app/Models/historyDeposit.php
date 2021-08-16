<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyDeposit extends Model
{
    protected $table ='history_deposit';
    protected $primaryKey = 'id_depo';
    public $incrementing = false;
    public $keyType = 'varchar';
    public $timestamps = true;
    const CREATED_AT = 'tanggal_depo';
    const UPDATED_AT = 'updated_at';
}
