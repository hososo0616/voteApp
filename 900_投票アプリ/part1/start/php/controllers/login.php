<?php

namespace controller\login;

use lib\Auth;
use lib\Msg;
use model\UserModel;

function get()
{
  \view\login\index();
}

function post()
{
  //値が入っていたらその値なければ空文字
  $id = get_param('id', '');
  $pwd = get_param('pwd', '');

  if (Auth::login($id, $pwd)) {

    $user = UserModel::getSession();
    Msg::push(Msg::INFO, "{$user->nickname}さん、ようこそ。");
    redirect(GO_HOME);
    
  } else {

    redirect(GO_REFERER);
  }
}
