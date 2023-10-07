<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasKey(): void
    {
        static::creating(function (Model $model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
