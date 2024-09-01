<x-login-layout>

  {{ Form::open(['url' => '/post/create']) }}<!-- <form action="/post/create" method="post">@csrfと同じ意味 -->
  <div class="post_create_form">
    {{ Form::input('text','Post','null',['class' => 'post_create'])}}<!-- <input type='text' name='Post',value='' class='post_create'>と同じ意味 -->
  <h2>機能を実装していきましょう。</h2>

</x-login-layout>
