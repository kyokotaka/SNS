<div class="head_container">
    <a href="/top"><img src="{{ asset ('images/atlas.png' )}}" class="Atlas_img"></a>
    <p>{{auth()->user()->username}}さん</p>
    <div class="accordion">
        <div div class="accordion-container">
            <div class="accordion-title">
                <div class='accordion-menu'>
                    <ul>
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/profile">プロフィール</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset ('storage/' . Auth::user()->icon_image) }}" class="auth_user_icon">
</div>
