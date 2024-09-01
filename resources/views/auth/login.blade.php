<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/login']) !!}
  @csrf
  <p>AtlasSNSへようこそ</p>
  <div class = "login_form" ></div>
  {{ Form::label('email') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('ログイン') }}

  <p><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
  {!! Form::close() !!}

</x-logout-layout>
