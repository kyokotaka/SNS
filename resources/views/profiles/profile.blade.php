<x-login-layout>

  {{Form::open(['url' => '/profile/edit','files' => true] )}}<!-- enctype="multipart/form-data" ='files' => true -->
  @csrf
  <div class="user_profile">
    {{ Form::label ('ユーザー名') }}
    {{ Form::text ('username',(auth()->user()->username),['class' => 'input']) }}

    {{ Form::label ('メールアドレス') }}
    {{ Form::email ('email',(auth()->user()->email),['class' => 'input']) }}

    <!-- {{ Form::label ('パスワード') }}
    {{ Form::text ('password',null,['class' => 'input']) }}

    {{ Form::label ('パスワード確認') }}
    {{ Form::text ('password_confirmation',null,['class' => 'input']) }} -->

    {{ Form::label ('自己紹介') }}
    {{ Form::text ('bio',(auth()->user()->bio),['class' => 'input']) }}

    {{ Form::label ('アイコン画像') }}
    {{ Form::file ('icon',(auth()->user()->icon),['class' => 'input']) }}

    {{ Form::submit('更新')}}

    {!! Form::close() !!}
  </div>

</x-login-layout>
