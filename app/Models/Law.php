<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'laws';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    public function setTitleAttribute($value): void
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

    public function geTitleAttribute($value)
    {
        $decoded = json_decode($value, true);

        return [$decoded];
    }

    public function setDescriptionAttribute($value): void
    {
        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        if (isset($value[0])) {
            $this->attributes['description'] = json_encode($value[0]);
        } else {
            $this->attributes['description'] = json_encode($value);
        }
    }

    public function geDescriptionAttribute($value)
    {
        $decoded = json_decode($value, true);

        return [$decoded];
    }

}
