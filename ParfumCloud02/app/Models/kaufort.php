<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaufort extends Model
{
    protected $table = 'tbl_kaufort';
    protected $primaryKey = 'ID_kaufort';
    protected $fillable = ['land', 'kanton', 'ort', 'PLZ', 'strasse', 'strassennummer'];
    public $timestamps = false;
}
