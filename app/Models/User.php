<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';          // <-- samakan dengan DB kamu
    protected $primaryKey = 'id_users';
    public $timestamps = false;

    protected $fillable = ['nama_lengkap','username','password','role'];
    protected $hidden   = ['password'];

    // Relasi
    public function topiks()
    {
        return $this->hasMany(Topik::class, 'id_user', 'id_users');
    }

    public function komens()
    {
        return $this->hasMany(Komen::class, 'id_users', 'id_users');
    }
}
