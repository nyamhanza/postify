<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post){



        if($post->likedBy(request()->user())){

            return(response(null,409));
        }

        $post->likes()->create([
            'user_id'=>request()->user()->id
        ]);
        return back();
    }
    public function destroy(Post $post){

        request()->user()->likes()->where('post_id',$post->id)->delete();

        return back();

    }
}
