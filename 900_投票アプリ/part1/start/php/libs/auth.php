<?php

namespace lib;

use db\UserQuery;
use model\UserModel;

class Auth
{
  public static function login($id, $pwd)
  {
    $success = false;

    $user = UserQuery::fetchById($id);

    if (!empty($user) && $user->del_flg !== 1) {

      if (password_verify($pwd, $user->pwd)) {
        $success = true;
        UserModel::setSession($user);
      } else {
        echo 'パスワードが一致しません';
      }
    } else {
      echo 'ユーザーが見つかりません';
    }
    return $success;
  }

  public static  function regist($user)
  {
    $success = false;

    $exist_user = UserQuery::fetchById($user->id);

    //ユーザが存在しているか
    if (!empty($exsit_user)) {
      echo 'ユーザーが既に存在します。';
      return false;
    }

    $success = UserQuery::insert($user);

    //ユーザーがログイン状態化の判定
    if ($success) {
      UserModel::setSession($user);
    }

    return $success;
  }

  public static function isLogin()
  {
    $user = UserModel::getSession();

    if (isset($user)) {
      return true;
    } else {
      return false;
    }
  }
}
