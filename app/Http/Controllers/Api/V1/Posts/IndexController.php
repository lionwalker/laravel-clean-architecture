<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PostResource;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = QueryBuilder::for(
            Post::class,
        )->allowedIncludes(
            ['user']
        )->published()->paginate(3);

        return response()->json(
            PostResource::collection($posts),
            200
        );
    }
}
