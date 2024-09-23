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
  @foreach($users as $user)
    <div class="search_user_detail">
      <img src="{{ asset('images/' . $user->icon_image) }}" alt="ユーザーアイコン">
      <p>{{$user->username}}</p>
      @switch($user->relation())
        @case(0) <span>フォローしていません</span> @break
        @case(1) <span>あなたがフォロー</span> @break
        @case(2) <span>あなたをフォロー</span> @break
        @case(3) <span>相互フォロー</span> @break
        @default <span>フォローしていません</span>
      @endswitch
      <form method="POST" action="{{ '/follow' }}">
        @csrf
          <input name="follow_id" type="hidden" value="{{ $user->id }}" >
          @if($user->isFollowing())
            <button type="submit" class="btn btn-outline-info">フォロー解除</button>
          @else
            <button type="submit" class="btn btn-outline-danger">フォロー</button>
          @endif
      </form>
    </div>
  @endforeach
</x-login-layout>
