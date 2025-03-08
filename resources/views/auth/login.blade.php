<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  <p class="welcome">AtlasSNSへようこそ</p>
  {!! Form::open(['url' => '/login']) !!}
  @csrf
  <div class = "login_form" >
    {{ Form::label('email') }}
    {{ Form::text('email',null,['class' => 'input']) }}
    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
    {{ Form::submit('ログイン') }}
    {!! Form::close() !!}
  </div>

    <p><a href="/register">新規ユーザーの方はこちら</a></p>

</x-logout-layout>
