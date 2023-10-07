<?php

namespace Domain\Blogging\Models;

use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Model;
use Domain\Shared\Models\Concerns\HasKey;
use Domain\Blogging\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Blogging\Models\Builders\PostBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes, HasKey, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'title',
        'slug',
        'body',
        'description',
        'published',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published' => 'boolean'
    ];

    public function getRouteKeyName(): string
    {
        return 'key';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function newEloquentBuilder($query): PostBuilder
    {
        return new PostBuilder($query);
    }
}
