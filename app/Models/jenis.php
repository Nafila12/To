<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class jenis extends Model
{
    use HasFactory;
    protected $table = 'jenis';
    protected $fillable = [ 'nama_jenis'];

    public function menu()
    {
        return $this->hasMany(menu::class, 'jenis_id', 'id');
    }

    // public function kategori()
    // {
    //     return $this->belongsTo(kategory::class, 'kategory_id');
    // }
}
