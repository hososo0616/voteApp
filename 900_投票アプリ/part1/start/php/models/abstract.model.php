<?php 

namespace model;

use Error;

abstract class AbstractModel {

  protected static $_SESSION_NAME = null;

  public static function setSession($val) {
    if(empty(static::$_SESSION_NAME)) {
      throw new Error('SESSION_NAMEを設定してください');
    }
    $_SESSION[static::$_SESSION_NAME] = $val;
  }

  public static function getSession() {
    return $_SESSION[static::$_SESSION_NAME] ?? null;
  }

  public static function clearSession() {
    static::setSession(null);
  }
}

?>