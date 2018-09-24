@extends('layouts.app')

@section('content')
<!-- Banner -->
<!-- Note: The "styleN" class below should match that of the header element. -->
<section id="banner" class="style2">
  <div class="inner">
    <span class="image">
      <img src="/storage/topics/{{$topic->cover_image}}" alt="" />
    </span>
    <header class="major">
      <h1>{{$topic->name}}</h1>
    </header>
    <div class="content">
      <p>{{$topic->about}}</p>
    </div>
  </div>
</section>

<!-- Two -->
<section id="two" class="spotlights">
  @foreach($topic->posts as $post)
    <section>
      <a href="/posts/{{$post->id}}" class="image">
        <img src="/storage/thumbImages/{{$post->thumb_image}}" alt="{{$post->thumb_image}}" data-position="center center" />
      </a>
      <div class="content">
        <div class="inner">
          <header class="major">
            <h3>{{$post->title}}</h3>
          </header>
          <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa sed magna lacinia magna pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis tempus.</p>
          <ul class="actions">
            <li><a href="/posts/{{$post->id}}" class="button">Learn more</a></li>
          </ul>
        </div>
      </div>
    </section>
  @endforeach  
</section>


  
@section('title',"Topic: $topic->name")

@endsection()