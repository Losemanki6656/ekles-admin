<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use CrudTrait;


    protected $table = 'documents';
    protected $guarded = ['id'];

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

    public function setFileAttribute($value)
    {
        $attribute_name = "file";
        $disk = "public";
        $destination_path = "files";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function getSlugWithLink()
    {
        return '<a href="' . asset('storage/' . $this->file) . '" target="_blank">'.$this->file.'</a>';
    }
}
