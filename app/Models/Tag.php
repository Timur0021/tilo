<?php

namespace App\Models;

use App\Models\Information\AboutUs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tag extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'tags';

    protected $fillable = [
        'name'
    ];

    public function aboutUs(): BelongsToMany
    {
        return $this->belongsToMany(AboutUs::class, 'about_us_tag', 'tag_id', 'about_us_id');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 1920, 1080)
            ->nonQueued();
    }
}
