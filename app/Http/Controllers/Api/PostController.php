<?php

namespace App\Http\Controllers\Api;

use App\Filters\QueryFilters;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filters\QueryFilters  $filters
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, QueryFilters $filters)
    {
        return PostResource::collection((Post::filter($filters)->paginate(10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filters\QueryFilters  $filters
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function userPosts(Request $request, QueryFilters $filters)
    {
        return PostResource::collection($request->user()->posts()->filter($filters)->paginate(10));
    }
}
