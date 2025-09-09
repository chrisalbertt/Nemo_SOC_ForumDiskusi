<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    protected $table = 'topik';          // tabel kamu di phpMyAdmin: topik
    protected $primaryKey = 'id_topik';
    public $timestamps = false;

    protected $fillable = ['id_user','username','Judul','Isi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_users');
    }

    public function komens()
    {
        return $this->hasMany(Komen::class, 'id_topik', 'id_topik');
    }
}
