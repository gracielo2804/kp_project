<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kontrak_paket extends Model
{
    protected $table ='kontrak_paket';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    public $keyType = 'varchar';
    public $timestamps = true;
    const CREATED_AT = 'tanggal_pembelian';
    const UPDATED_AT = 'updated_at';
}
