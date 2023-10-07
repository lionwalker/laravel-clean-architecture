<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PostResource;
use Domain\Blogging\Models\Post;

class ShowController extends Controller
{
    public function __invoke($key)
    {
        return PostResource::collection(Post::where('key', $key)->get());
    }
}
