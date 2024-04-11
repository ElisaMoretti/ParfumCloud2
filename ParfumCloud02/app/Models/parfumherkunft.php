<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parfumherkunft extends Model
{
    protected $table = 'tbl_parfumherkunft';
    protected $primaryKey = 'ID_parfumherkunft';
    protected $fillable = ['land', 'kanton'];
    public $timestamps = false;
}
