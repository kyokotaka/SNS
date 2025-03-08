<div class="head_container">
    <a href="/top"><img src="{{ asset ('images/atlas.png' )}}" class="Atlas_img"></a>
    <p>{{auth()->user()->username}}さん</p>
        <div class="accordion">
            <span class="accordion-allow"></span>
                    <ul class='accordion-menu'>
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/profile">プロフィール</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
        </div>
    <img src="{{ asset ('storage/' . Auth::user()->icon_image) }}" class="auth_user_icon">
</div>
