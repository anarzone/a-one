@extends('layouts.app')

@section('content')

<!-- Main -->
<div id="main" class="alt">
<!-- One -->
  <section id="one">
    <div class="inner">
      {{-- <header class="major align-center"> --}}
        <h1 class="align-center">{{$post->title}}</h1>
      {{-- </header> --}}
      <span class="image main">
        <img src="/storage/images/{{$post->cover_image}}" alt="" data-position="center center" />
      </span>
      <div id="myContent">
        {!!$post->body!!}  
      </div>
      @auth
        @if(auth()->user()->id == $post->user_id)
          <a class="button small" href="/posts/{{$post->id}}/edit">Edit</a>
        @endif
      @endauth
    </div>
  </section>
  
</div>

@section('title',"$post->title ")

@section('js')
<script>  
  // const myContent = document.querySelectorAll('#myContent p');
  const images = document.querySelectorAll('#myContent img');
  const tables = document.querySelectorAll('#myContent table');
  // iterate through tables and add class "alt"
  for(let i = 0; i < tables.length; i++){
    const table = tables[i];
    console.log(table)
    table.classList.add('alt');
  }

  for(let i = 0; i < images.length; i++){
    const el = images[i];
    if(el){

    // `element` is the element you want to wrap
   
    const parent = el.parentNode;
    const wrapper = document.createElement('span');
    wrapper.classList.add('responsive');

    // set the wrapper as child (instead of the element)
    parent.replaceChild(wrapper, el);
    // set element as child of wrapper
    wrapper.appendChild(el);
    }
  }
    
</script>

@endsection()