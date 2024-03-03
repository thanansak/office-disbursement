<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Disbursement extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'disbursements';


    const STATUS_PENDING = '0';
    const STATUS_APPROVED = '1';
    const STATUS_EJECT = '2';

    protected $fillable = [
        'disbursement_code',
        'remark',
        'total_price',
        'qty',
        'slug',
        'status',
        'sort',
        'created_by',
        'updated_by',
        'approved_by',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'disbursement_code'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function createBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function updateBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    public function approvedBy(){
        return $this->belongsTo(User::class,'approved_by');
    }

    public function disbursement_item(){
        return $this->hasMany(DisbursementItem::class);
    }
}
