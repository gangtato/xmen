<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'table_detail_hero';
    protected $fillable = ['skil','hero_id','created_at','updated_at'];
}
