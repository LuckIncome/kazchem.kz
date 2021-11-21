<section class="page login_section">
  <div class="container">
    <div class="login_block">
      <div class="login_head">Подтверждение E-mail</div>
      <form action="/users/send_activation_email" class="login_body"  id="UserLoginForm" method="POST" accept-charset="utf-8">
        <div class="input_block">
          <div class="input_name">Введите эл. почту:</div>
          <input class="form_input" type="text" name="data[User][email]" value="<?=(isset($_POST['data']['User']['email'])) ? $_POST['data']['User']['email'] : '' ?>">
        </div>
        
        <button class="form_btn orange_btn login_btn sign_btn" type="submit">Отправить</button>
      </form>
    </div>
  </div>
</section>


