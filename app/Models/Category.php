<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use CrudTrait, SoftDeletes;


    protected $table = 'categories';
    protected $guarded = ['id'];

    protected $casts = [
        'name' => 'array'
    ];

    public function setNameAttribute($value): void
    {
        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        if (isset($value[0])) {
            $this->attributes['name'] = json_encode($value[0]);
        } else {
            $this->attributes['name'] = json_encode($value);
        }
    }

    public function getNameAttribute($value)
    {
        $decoded = json_decode($value, true);

        return [$decoded];
    }

    public function getNameUzAttribute()
    {
        $name = $this->name;

        if (is_string($name)) {
            $json = json_decode($name, true);
        } elseif (is_array($name)) {
            $json = $name[0] ?? $name;
        } else {
            $json = [];
        }

        return $json['uz'] ?? '-';
    }


}
