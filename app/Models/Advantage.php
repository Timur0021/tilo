<?php

namespace App\Models;

use App\Models\Information\AboutUs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
