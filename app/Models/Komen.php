<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    protected $table = 'komen';          // tabel kamu di phpMyAdmin: komen
    protected $primaryKey = 'id_komen';
    public $timestamps = false;

    protected $fillable = ['id_topik','id_users','username','Isi'];

    public function topik()
    {
        return $this->belongsTo(Topik::class, 'id_topik', 'id_topik');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }
}
