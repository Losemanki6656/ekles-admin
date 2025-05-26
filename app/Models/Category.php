<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use CrudTrait, SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'name' => 'array'
    ];

    public function setNameAttribute($value)
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

        // Backpack repeatable uchun array of objects formatga o‘tkazamiz
        return [$decoded];
    }

    public function getNameUzAttribute()
    {
        $name = $this->name;

        // Agar $name string bo‘lsa — decode qilamiz
        if (is_string($name)) {
            $json = json_decode($name, true);
        } elseif (is_array($name)) {
            // Agar repeatable accessor'dan chiqqan bo‘lsa: [ ['uz' => ..., ...] ]
            $json = $name[0] ?? $name;
        } else {
            $json = [];
        }

        return $json['uz'] ?? '-';
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
