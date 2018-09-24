@extends('layouts.app')

@section('content')
  {{-- @if (session('status'))
    {{ session('status') }}
  @endif --}}
  <section id="one">
    <div class="inner">
      <section>
        <div class="fields">
          <div class="field">
            {{-- <ul class="actions">
              <li><h2>Dashboard</h2></li>
              <li><a class="button" href="#">Create</a></li>
            </ul> --}}
            <div style="">
              <h2 style="display: inline-block">Dashboard</h2>
              <a class="button primary small" style="display: inline-block; float:right" href="/posts/create">
                Create Post</a>
            </div>
            <div class="table-wrapper">
              <table class="alt">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user->posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td class="">
                      {{-- Edit --}}
                      <a class="button small icon fa-edit" href="/posts/{{$post->id}}/edit" style="border-bottom: 0">
                        Edit
                      </a>
                      {{-- /Edit --}}
                      </td>
                      <td>
                        {{-- Edit form --}}
                        <form style="margin:0" action="/posts/{{$post->id}}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button class="button small icon fa-trash" name="delete">Delete</button>
                        </form>
                        {{-- /Edit form --}}
                      </td>
                      <td>
                        <a class="button small icon fa-eye" href="/posts/{{$post->id}}" style="border-bottom: 0">
                          View
                        </a>
                      </td>
                    </tr>
                  @endforeach  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
@endsection
