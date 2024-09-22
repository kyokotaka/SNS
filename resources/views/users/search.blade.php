<x-login-layout>

  <div class="search_area">
    {{ Form::open(['url' => '/search']) }}
      @csrf
        {{ Form::input('text','search',$keyword,['class' => 'search','placeholder' => 'ユーザー名'])}}
        <input type="image" name="submit" class="search_btn" src="{{asset('images/search.png')}}">
    {{ Form::close() }}
    <div class="message">
      {{$message}}
    </div>
  </div>
  <div class="search_user_detail">
    @foreach($users as $user)
      <img src="{{ asset('images/' . $user->icon_image) }}" alt="ユーザーアイコン">
      {{$user->username}}
      <button type="button" class="btn btn-outline-info">フォローする</button>
      <button type="button" class="btn btn-outline-danger">フォロー解除する</button>
    @endforeach
  </div>
</x-login-layout>
