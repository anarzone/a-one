<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Post;
use App\Topic;


class PostsController extends Controller{
  public function __construct(){
    $this->middleware('auth', ['except'=> ['show','index','post_locale']]);
  }

  public function index(){
    
  }
  // show selected posts
  public function show(Post $post){
    // $tag = Tag::where('name',$name)->first();
    // $postsByTopic = Post::whereHas('tags', function($query) use ($topic){
    //   $query->where('name',$topic->name);
    // })->get();
    // return view('topics.show',compact('postsByTopic','topic'));
    // $posts = Post::whereHas('topics',function($query) use ($name){
    //   $query->where('name',$name);
    // });
    return view('posts.show',compact('post','fourPost'));
  }

  // create post form
  public function create(){
    $topics = Topic::all();
    return view('posts.create',compact('topics'));
  }

  // save post to database
  public function store(Request $request){

    // check for uploaded cover image
    if($request->hasFile('cover_image')){
      // get filename with extension
      $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
      // get only filename
      $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
      // get extension
      $extension = $request->file('cover_image')->getClientOriginalName();
      // filename to store
      $filenameToStore = $filename . '_' . time() . '.' . $extension;
      // upload image to folder
      $path = $request->file('cover_image')->storeAs('public/images', $filenameToStore);
    }else{
      $filenameToStore = 'noimage.jpg';
    }


    // check if request has thumb image file 
    if($request->hasFile('thumb_image')){
      // get filename with extension
      $thumbImageWithExtension = $request->file('thumb_image')->getClientOriginalName();
      // get only filename
      $thumbImage = pathinfo($thumbImageWithExtension, PATHINFO_FILENAME);
      // get extension
      $extension = $request->file('thumb_image')->getClientOriginalName();
      // filename to store
      $thumbImageToStore = $thumbImage . '_' . time() . '.' . $extension;
      // upload image to folder
      $path = $request->file('thumb_image')->storeAs('public/thumbImages', $thumbImageToStore);
    }
    // make validations
    $this->validate(request(),[
      'title' => 'required|min:3',
      'body' => 'required|min:6',
      'cover_image' => 'image|nullable|max:1993',
      'thumb_image' => 'image|nullable|max:1993'
    ]);
    
    // proceed create function
    Post::create([
      'title' => request('title'),
      'body' => request('body'),
      'user_id' => auth()->user()->id,
      'cover_image' => $filenameToStore,
      'thumb_image' => $thumbImageToStore,
      'topic_id' => request('topicSelect'),
    ]);
    
    // redirect to dashboard page
    return redirect('/home');
  }

  // edit post if user authorized
  public function edit(Post $post){
    $plucked = Topic::pluck('name','id')->toArray();
    // dd($plucked);
    $topics = Topic::all();
    if(!auth()->user()->id == $post->user_id){
      return redirect('/');
    }
    return view('posts.edit',compact('post','topics','plucked'));
  }

  // update posts table
  public function update(Request $request, Post $post){
    // check for uploaded cover image
    if($request->hasFile('cover_image')){
      // get filename with extension
      $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
      // get only filename
      $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
      // get extension
      $extension = $request->file('cover_image')->getClientOriginalName();
      // filename to store
      $filenameToStore = $filename . '_' . time() . '.' . $extension;
      // upload image to folder
      $path = $request->file('cover_image')->storeAs('public/images', $filenameToStore);
    }
    
    // check for uploaded thumb image
    if($request->hasFile('thumb_image')){
      // get filename with extension
      $thumbImageWithExtension = $request->file('thumb_image')->getClientOriginalName();
      // get only filename
      $thumbImage = pathinfo($thumbImageWithExtension, PATHINFO_FILENAME);
      // get extension
      $extension = $request->file('thumb_image')->getClientOriginalName();
      // filename to store
      $thumbImageToStore = $thumbImage . '_' . time() . '.' . $extension;
      // upload image to folder
      $path = $request->file('thumb_image')->storeAs('public/thumbImages', $thumbImageToStore);
    }

    // if there is cover image update
    //else keep old one
    if($request->hasFile('cover_image')){
      if($post->cover_image != 'noImage.png'){
        Storage::delete('public/image/'.$post->cover_image);
        $fileToUpdate = $filenameToStore;
      }
    }else{
      $fileToUpdate = $post->cover_image;
    }
    // if there is thumb image update
    //else keep old one
    if($request->hasFile('thumb_image')){
      if($post->thumb_image != 'default.png'){
        Storage::delete('public/thumbImages/'.$post->thumb_image);
        $thumbImageToUpdate = $thumbImageToStore;
      }
    }else{
      $thumbImageToUpdate = $post->thumb_image;
    }

    // make valitions
    $this->validate(request(),[
      'title' => 'required|min:3',
      'body' => 'required|min:6',
      'cover_image' => 'image|nullable|max:1993',
      'thumb_image' => 'image|nullable|max:1993',
    ]);

    // if request name is 'edited' proceed update
    if($request->has('edited')){
      $post->update([
        'title' => request('title'),
        'body' => request('body'),
        'cover_image' => $fileToUpdate,
        'thumb_image' => $thumbImageToUpdate,
        'topic_id' => request('topicSelect'),
      ]);
      return redirect("/posts/$post->id");
    }  
  }

  // delete post
  public function destroy(Request $request, Post $post){
    if(auth()->user()->id != $post->user_id){
      return redirect('/');
    }
    if($request->has('delete')){
      $post->delete();
      return back();
    }
  }

  public function post_locale(Request $request){
    Session::put(['locale'=>$request->locale]);
    App::setLocale(Session::get('locale'));
  }
}



