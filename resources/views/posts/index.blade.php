<x-login-layout>

  {{ Form::open(['url' => '/post/create']) }}<!-- <form action="/post/create" method="post">@csrfと同じ意味 -->
  @csrf
  <div class="post_create_form">
    {{ Form::textarea('post','',['class' => 'post_create'])}}<!-- <input type='text' name='Post',value='' class='post_create'>と同じ意味 -->
  </div>
  <input type="image" name="submit" class="" src="images/post.png" alt="ポストボタン">
  {{ Form::close() }}

  @foreach($posts as $post)
  <div class="post_icon">
    @if($post->user_id != auth()->user()->id)
      <a href="/user_profile/{{$post->user->id}}"><img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="ユーザーアイコン"></a>
    @else
      <a href="/profile"><img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="ユーザーアイコン"></a>
    @endif
  </div>
    {{$post->user->username}}
    {{$post->post}}
    {{$post->updated_at}}
    @if($post->user_id == auth()->user()->id)
      <a class="update-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('images/edit.png' ) }}" alt="編集ボタン"></a>
      <a href="/post/delete/{{$post->id}}" onclick="return confirm('本当に削除しますか？')"><img src="{{ asset('images/trash.png' ) }}" alt="削除ボタン"></a>
      @csrf
      @method('DELETE')
    @endif
  @endforeach
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/update/{{$post->id}}" method="post">
                <textarea name="update_post" class="modal_post"></textarea>
                <input type="hidden" name="update_id" class="modal_id">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
</x-login-layout>
