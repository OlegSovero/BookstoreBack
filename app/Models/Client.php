<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    use HasFactory;
    protected $primaryKey = 'id_client';
    public $timestamps = false;

    protected $table = 'pos_client' ;

    protected $fillable = [
        'doc_type',
        'doc_number',
        'first_name',
        'last_name',
        'phone',
        'email'
    ];

}
