<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperHero extends Model
{
    use HasFactory;
    protected $table = 'table_super_hero';
    protected $fillable = ['nama_super_hero','jenis_kelamin','created_at','updated_at'];
}
