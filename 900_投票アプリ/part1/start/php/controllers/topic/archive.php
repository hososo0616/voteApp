<?php 
namespace controller\topic\archive;

use db\TopicQuery;
use lib\Auth;
use db\TopicQuery;
use model\UserModel;

function get() {
  Auth::requireLogin();
  $user = UserModel::getSession();

  $tppics = TopicQuery::fetchByUserId($user);

  

  
}
?>