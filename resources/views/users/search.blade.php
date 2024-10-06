<x-login-layout>

  <div class="search_area">
    {{ Form::open(['url' => '/search']) }}
      @csrf
        {{ Form::input('text','search',$keyword,['class' => 'search','placeholder' => 'ユーザー名'])}}
        <input type="image" name="submit" class="search_btn" src="{{asset('images/search.png')}}">
    {{ Form::close() }}
    <div class="search_message">
      <p>{{$message}}</p>
    </div>
  </div>
  @foreach($users as $user)
    <div class="search_user_detail">
      <a href="/user_profile/{{$user->id}}"><img src="{{ asset('storage/image/' . $user->icon_image) }}" alt="ユーザーアイコン"></a>
      <p class="search_username">{{$user->username}}</p>
      <p class="search_bio">{{$user->bio}}</p>
      <form method="POST" action="{{ '/follow' }}">
        @csrf
          <input name="follow_id" type="hidden" value="{{ $user->id }}" >
          @if($user->isFollowing())
            <button type="submit" class="btn btn-outline-danger">フォロー解除</button>
          @else
            <button type="submit" class="btn btn-outline-info">フォロー</button>
          @endif
      </form>
    </div>
  @endforeach
</x-login-layout>
