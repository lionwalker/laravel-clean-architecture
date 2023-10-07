<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasKey
{
    public static function bootHasKey(): void
    {
        static::creating(function (Model $model) {
            $model->key = Str::substr(Str::lower(class_basename($model)), 0, 3) . "-" . uniqid();
        });
    }
}
