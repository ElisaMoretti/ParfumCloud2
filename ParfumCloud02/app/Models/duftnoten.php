<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class duftnoten extends Model
{
    protected $table = 'tbl_duftnoten';
    protected $primaryKey = 'ID_duftnoten';
    protected $fillable = ['kopfnote', 'herznote', 'basisnote'];
    public $timestamps = false;
}
