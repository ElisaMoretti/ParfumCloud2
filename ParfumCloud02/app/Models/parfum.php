<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parfum extends Model
{
    protected $table = 'tbl_parfum';
    protected $primaryKey = 'ID_parfum';
    protected $fillable = ['parfumname', 'marke', 'parfumstaerke', 'menge', 'beschreibung', 'inhaltsstoffe', 'bewertung', 'preis', 'geschlecht'];
    public $timestamps = false;
}
