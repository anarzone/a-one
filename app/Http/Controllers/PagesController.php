<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Topic;

class PagesController extends Controller
{
  public function index(){
    // // find 2 latest posts
    // $count = Post::count();
    // $skip = 2;
    // $limit = $count-$skip;
    // $latestTwo = Post::latest()->take($skip)->get();

    // // find posts comes after latest 2 posts
    // $postsOffsetTwo = Post::latest()->skip($skip)->take($limit)->get();
    // return view('posts.index',compact('latestTwo','postsOffsetTwo'));
    $topics = Topic::paginate(10);
    
    return view('posts.index',compact('topics','pagination'));
  }

  public function show($name){
    $topic = Topic::where('name','=',$name)->first();
    return view('topics.show',compact('topic'));
  }
}
