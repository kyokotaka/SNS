<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
  @foreach($follow_user as $follow_user)
  <img src="{{ asset('storage/' . $follow_user->icon_image) }}" alt="ユーザーアイコン">
  @endforeach
</x-login-layout>
