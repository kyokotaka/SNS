<x-login-layout>
  <!-- @foreach($users_info as $user_info) -->
    <div class="user_profile_area">
      <a href="/user_profile/{{$user_info->id}}"><img src="{{ asset('storage/' . $user_info->icon_image) }}" alt="ユーザーアイコン"></a>
      <div class="">
        <p>ユーザー名　{{$user_info->username}}</p>
        <p>自己紹介　{{$user_info->bio}}</p>
      </div>
      <div class="">
        @switch($user_info->relation())
          @case(0) <span class="search_follow_message">フォローしていません</span> @break
          @case(1) <span class="search_follow_message">あなたがフォロー中</span> @break
          @case(2) <span class="search_follow_message">あなたをフォロー中</span> @break
          @case(3) <span class="search_follow_message">相互フォロー中</span> @break
          @default <span class="search_follow_message">フォローしていません</span>
        @endswitch
      </div>
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
  <!-- @endforeach -->
  @foreach($users_post as $user_post)
  <img src="{{ asset('storage/' . $user_post->user->icon_image) }}" alt="ユーザーアイコン">
  {{$user_post->post}}
  {{$user_post->updated_at}}
  @endforeach

</x-login-layout>