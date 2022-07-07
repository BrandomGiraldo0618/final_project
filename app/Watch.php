<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Watch extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'watch_name',
                'onUpdate' => true
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
