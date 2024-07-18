<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name'
    ];

//    public function aboutUs(): BelongsToMany
//    {
//        return $this->belongsToMany(AboutUs::class, 'about_us_tag', 'tag_id', 'about_us_id');
//    }
}
