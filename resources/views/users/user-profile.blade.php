<x-login-layout>
@foreach($users_info as $user_info)
    <div class="">
      <a href="/user_profile/{{$user_info->id}}"><img src="{{ asset('images/' . $user_info->icon_image) }}" alt="ユーザーアイコン"></a>
      <p class="">{{$user_info->username}}</p>
      @switch($user_info->relation())
        @case(0) <span class="search_follow_message">フォローしていません</span> @break
        @case(1) <span class="search_follow_message">あなたがフォロー中</span> @break
        @case(2) <span class="search_follow_message">あなたをフォロー中</span> @break
        @case(3) <span class="search_follow_message">相互フォロー中</span> @break
        @default <span class="search_follow_message">フォローしていません</span>
      @endswitch
      <form method="POST" action="{{ '/follow' }}">
        @csrf
          <input name="follow_id" type="hidden" value="{{ $user_info->id }}" >
          @if($user_info->isFollowing())
            <button type="submit" class="btn btn-outline-danger">フォロー解除</button>
          @else
            <button type="submit" class="btn btn-outline-info">フォロー</button>
          @endif
      </form>
    </div>
  @endforeach
</x-login-layout>