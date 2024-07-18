<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Advantage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function aboutUs(): BelongsToMany
    {
        return $this->belongsToMany(AboutUs::class, 'about_us_advantage');
    }
}
