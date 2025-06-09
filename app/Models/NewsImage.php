<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsImage extends Model
{
    use CrudTrait;

    protected $table = 'news_images';
    protected $guarded = ['id'];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class, 'news_id');
    }

}
