<section class="page login_section">
  <div class="container">
    <div class="login_block">
      <div class="login_head">Вход</div>
      <form action="/users/login" class="login_body"  id="UserLoginForm" method="POST" accept-charset="utf-8">
        <div class="input_block">
          <div class="input_name">Номер телефона</div>
          <input class="form_input" type="tel" name="data[User][username]" placeholder="+7 (___) ___ __ __">
        </div>
        <div class="input_block pass_input_block">
          <div class="input_name">Пароль</div>
          <input class="form_input pass_input" type="password" name="data[User][password]">
          <div class="input_err pass_err"></div>
          <div class="pass_eye"></div>
        </div>
        <button class="form_btn orange_btn login_btn sign_btn" type="submit">Войти</button>
        <a class="forget_pass" href="/users/forgetpwd">Восстановить пароль</a>
      </form>
    </div>
  </div>
</section>


