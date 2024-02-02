<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    // use HasFactory;
    protected $guarded=[];
    
    protected $table = 'surveys'; // Nama tabel sesuai dengan skema

    protected $primaryKey = 'id'; // Kolom primary key

    protected $fillable = [
         'value', 'created_at','updated_at'
    ];
}
