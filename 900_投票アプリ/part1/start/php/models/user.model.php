<?php 

namespace model;

class UserModel extends AbstractModel{
  public string $id;
  public string $pwd;
  public string $nickname;
  public int $del_flg;

  protected static $_SESSION_NAME = '_user';
}

?>