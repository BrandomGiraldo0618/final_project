<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'priority'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function watches(){
        return $this->hasMany(Watch::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
