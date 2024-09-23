<x-login-layout>

  {{ Form::open(['url' => '/post/create']) }}<!-- <form action="/post/create" method="post">@csrfと同じ意味 -->
  @csrf
  <div class="post_create_form">
    {{ Form::input('text','post','',['class' => 'post_create'])}}<!-- <input type='text' name='Post',value='' class='post_create'>と同じ意味 -->
  </div>
  <input type="image" name="submit" src="images/post.png">
  {{ Form::close() }}

  @foreach($posts as $post)
    <a href="/user_profile/{{$post->user->id}}"><img src="{{ asset('images/' . $post->user->icon_image) }}" alt="ユーザーアイコン"></a>
    {{$post->user->username}}
    {{$post->post}}
    {{$post->user->updated_at}}
    @if($post->user_id == auth()->user()->id)
    <a href="/post/delete/{{$post->id}}"><img src="{{ asset('images/trash.png' ) }}" alt="削除ボタン"></a>
    @endif
  @endforeach
</x-login-layout>
