<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\ReactionPostRequest;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::with('tags','likes')->get();

        return PostResource::collection($posts);
    }
    
    public function toggleReaction(ReactionPostRequest $request)
    {
        $post = Post::findOrFail($request->post_id);

        $like = Like::where('post_id', $request->post_id)
                    ->where('user_id', auth()->id())
                    ->first();

        if($like && $request->like){

            return $this->liked();

        }elseif($like && !$request->like){

            return $this->unLike($like);
        }

        return $this->like();
    }

    public function liked()
    {
        return response()->json([
            'status' => 409,
            'message' => 'You already liked this post'
        ]);
    }

    public function like()
    {
        Like::create([
            'post_id' => request()->post_id,
            'user_id' => auth()->id()
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'You like this post successfully'
        ]);
    }

    public function unLike($like)
    {
        $like->delete();

        return response()->json([
            'status' => 200,
            'message' => 'You unlike this post successfully'
        ]);
    }
}
