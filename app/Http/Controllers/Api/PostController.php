<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $posts = BlogPost::all();

        return response()->json([
           'status' => true,
           'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->input();
        $item = new BlogPost($data);
        $item->save();

        if($item->wasChanged()) {
            return response()->json([
                'status' => 'true',
                'message' => 'Post created successfully',
                'post' => $item,
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Post not created',
                'post' => $item,
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StorePostRequest $request, $id)
    {
        $item = BlogPost::find($id);
        $data = $request->all();
        $result = $item->fill($data)->save();
        if($result) {
            return response()->json([
                'status' => 'true',
                'message' => 'Post updated successfully',
                'post' => $item,
            ], 200);
        } else {
            return response()->json([
                'status' => 'true',
                'message' => 'Post not updated',
                'post' => $item,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $item = BlogPost::find($id);
        $item->delete();
        return response()->json([
            'status' => 'true',
            'message' => 'Post deleted successfully',
        ], 200);
    }
}
