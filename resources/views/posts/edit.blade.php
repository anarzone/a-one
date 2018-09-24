@extends('layouts.app')



@section('content')
<!-- Main -->
<div id="main" class="alt">
<!-- One -->
  <section id="one">
    <div class="inner">
      {{-- Create Post --}}
      <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        
        <input type="text" name="title"  value="{{$post->title}}">
        <br>
        <div class="row gtr-200">
          <div class="col-6 col-12-medium">
              <select name="topicSelect">

                @foreach($plucked as $key=>$value)
                  <option value="{{$key}}"
                  @if($key == old('topicSelect',$post->topic_id))
                    selected="selected"
                  @else
                     
                  @endif
                  >{{$value}}</option>
                @endforeach
              </select>
          </div>
        </div>
        <br>
        <textarea  name="body" >{{$post->body}}</textarea>
        <br>
        <ul class="actions">
          <li>
            <label for="cover_image">Upload Cover Image</label>
            <input type="file"  name="cover_image" id="cover_image" accept="image/*">
          </li>
          <li>
            <label for="thumb_image">Upload Thumb Image</label>
            <input type="file"  name="thumb_image" id="thumb_image" accept="image/*">
          </li>
        </ul>
        <hr>
        <button name="edited" class="button large">Save</button>
      </form>  
    </div>
  </section>
  
</div>
         
@endsection()

@section('css')
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css"
  type="text/css" media="screen" charset="utf-8">
@endsection()

@section('js')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
    let editor_config = {
    path_absolute : "/",
    selector: "textarea",
    height: 400,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

    tinymce.init(editor_config);
    
  </script>
      
@endsection()