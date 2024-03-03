<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductType extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'product_types';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'publish',
        'sort',
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

}
