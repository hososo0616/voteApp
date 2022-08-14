<?php

namespace view\login;

function index()
{
?>

  <h1 class="sr-only">ログイン</h1>
  <div class="mt-5">
    <div class="text-center mb-4">
      <img src="./images/logo.svg" alt="タイトルロゴ" width="65" />
    </div>
    <div class="login-form bg-white p-4 shadow-sm mx-auto rounded">
      <form action="<?php echo CURRENT_URI ?>" method="POST">
        <div class="form-group">
          <label for="id">ユーザーID</label>
          <input id="id" type="text" class="form-control" name="id" />
        </div>
        <div class="form-group">
          <label for="pwd">パスワード</label>
          <input is="pwd" type="password" class="form-control" name="pwd" />
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <a href="<?php the_url('register') ?>">アカウント登録</a>
          </div>
          <div>
            <input type="submit" class="btn btn-primary shadow-sm" value="ログイン" />
          </div>
        </div>
      </form>
    </div>
  </div>

<?php } ?>