<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_book';
    public $timestamps = false;

    protected $table = 'pos_book' ;

    protected $fillable = [
        'isbn',
        'name',
        'stock',
        'precio'
    ];
}
