<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategory extends Model
{
    use HasFactory;
    protected $table = 'kategory';
    protected $fillable = ['nama'];
}
