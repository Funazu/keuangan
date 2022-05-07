<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'masuk', 'keluar', 'keterangan', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
