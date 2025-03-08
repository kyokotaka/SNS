<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
  <div class="follow_userIcon">
  @foreach($follow_users as $follow_user)
    <img src="{{ asset('storage/' . $follow_user->icon_image) }}" alt="ユーザーアイコン">
    @endforeach
  </div>

  @foreach($follow_userPosts as $follow_userPost)
  <img src="{{ asset('storage/' . $follow_userPost->user->icon_image) }}" alt="ユーザーアイコン">
  <p>{{$follow_userPost->user->username}}</p>
  @endforeach
</x-login-layout>
