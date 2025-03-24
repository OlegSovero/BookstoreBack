<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    use HasFactory;
    protected $primaryKey = 'id_order';
    public $timestamps = false;

    protected $table = 'pos_order' ;

    protected $fillable = [
        'id_client',
        'total',
        'doc_type',
        'doc_number',
        'created_at'

    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'pos_order_detail', 'id_order', 'id_book')
                    ->withPivot('quantity', 'detail_price')
                    ->withTimestamps(); 
    }
}
