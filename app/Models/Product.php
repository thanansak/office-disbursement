<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'name',
        'description',
        'price',
        'slug',
        'publish',
        'sort',
        'unit',
        'limit',
        'product_type_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function prodcut_type(){
        return $this->belongsTo(ProductType::class);
    }


}
