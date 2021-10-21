<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyWithdrawal extends Model
{
    protected $table ='history_withdrawal';
    protected $primaryKey = 'id_wd';
    public $incrementing = false;
    public $keyType = 'varchar';
    public $timestamps = true;
    const CREATED_AT = 'tanggal_wd';
    const UPDATED_AT = 'updated_at';
}
