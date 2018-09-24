@extends('layouts.app')

@section('content')
<!-- Banner -->
<section id="banner" class="major">
  <div class="inner">
    <header class="major">
      <h1>Hi, I am A-One</h1>
    </header>
    <div class="content">
      <p></p>
      <ul class="actions">
        <li><a href="#one" class="button next scrolly">Get Started</a></li>
      </ul>
    </div>
  </div>
</section>
  <!-- Main -->
<div id="main">

  <!-- One -->
  <section id="one" class="tiles infinite-scroll">
    @foreach($topics as $topic)
    <article>
      <span class="image">
        <img src="/storage/topics/{{$topic->cover_image}}" alt="{{$topic->cover_image}}" />
      </span>
      <header class="major">
        <h3><a href="/topic/{{$topic->name}}" class="link">{{strtoupper($topic->name)}}</a></h3>
        <p>{{$topic->about}}</p>
      </header>
    </article>
    @endforeach
  </section>

  {{-- <!-- Two -->
  <section id="two">
    <div class="inner">
      <header class="major">
        <h2>Massa libero</h2>
      </header>
      <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet pharetra et feugiat tempus.</p>
      <ul class="actions">
        <li><a href="landing.html" class="button next">Get Started</a></li>
      </ul>
    </div>
  </section> --}}

  {{-- Pagination links --}}
  <div class="inner">
    <div class="row">
      
        <div class="off-5">
          {!! $topics->links() !!}
        </div>
      
    </div>
  </div>

</div>


@section('title',"Learn something everyday | ")


@endsection()