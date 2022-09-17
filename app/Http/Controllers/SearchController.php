<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filter(Request $request, Post $post) {
        $term = $request->input('term');
        $post = $post->newQuery();

        if (empty($term)) {
            return redirect()->route('posts.index');
        }

        if ($request->has('term')) {
            $post->where('title', 'LIKE', '%'.$term.'%')
                ->orWhere('body', 'LIKE', '%'.$term.'%');
        }

        $results = $post->get();

        return view('search.results', compact('results', 'term'));

        // if ($request->has('body')) {
        //     $post->where('body', 'LIKE', $request->input('term'));
        // }
    }

    // public function result() {
    //     return $result;
    // }
}
