<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use CrudTrait, SoftDeletes;

    protected $table = 'news';
    protected $guarded = ['id'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(NewsImage::class);
    }


    public function setTitleAttribute($value)
    {
        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        if (isset($value[0])) {
            $this->attributes['title'] = json_encode($value[0]);
        } else {
            $this->attributes['title'] = json_encode($value);
        }
    }

    public function getTitleAttribute($value)
    {
        $decoded = json_decode($value, true);

        return [$decoded];
    }

    public function getTitleUzAttribute()
    {
        $name = $this->title;

        if (is_string($name)) {
            $json = json_decode($name, true);
        } elseif (is_array($name)) {
            $json = $name[0] ?? $name;
        } else {
            $json = [];
        }

        return $json['uz'] ?? '-';
    }

    public function setDescriptionAttribute($value)
    {
        if (is_string($value)) {
            $value = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        }

        if (isset($value[0])) {
            $this->attributes['description'] = json_encode($value[0]);
        } else {
            $this->attributes['description'] = json_encode($value);
        }
    }

    public function getDescriptionAttribute($value)
    {
        $decoded = json_decode($value, true);

        return [$decoded];
    }
}
