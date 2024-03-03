<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisbursementItem extends Model
{
    use HasFactory;

    protected $table = 'disbursement_items';

    protected $fillable = [
        'qty',
        'unit_price',
        'total_price',
        'remark',
        'product_id',
        'disbursement_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function disbursement(){
        return $this->belongsTo(Disbursement::class,'disbursement_id');
    }

}
