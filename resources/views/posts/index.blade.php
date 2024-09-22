<x-login-layout>

  {{ Form::open(['url' => '/post/create']) }}<!-- <form action="/post/create" method="post">@csrfと同じ意味 -->
  @csrf
  <div class="post_create_form">
    {{ Form::input('text','post','',['class' => 'post_create'])}}<!-- <input type='text' name='Post',value='' class='post_create'>と同じ意味 -->
  </div>
  <input type="image" name="submit" src="images/post.png">
  {{ Form::close() }}


</x-login-layout>
