<?php

require_once 'config.php';

//library
require_once SOURCE_BASE . 'libs/helper.php';
require_once SOURCE_BASE . 'libs/auth.php';

//Model
require_once SOURCE_BASE . 'models/abstract.model.php';
require_once SOURCE_BASE . 'models/user.model.php';

//DB
require_once SOURCE_BASE . 'db/datasource.php';
require_once SOURCE_BASE . 'db/user.query.php';

//対象のクラスを先に読み込まないとセッションに格納できないため順番に注意
session_start();

require_once SOURCE_BASE . 'partials/header.php';

$rpath = str_replace(BASE_CONTEXT_PATH, '', $_SERVER['REQUEST_URI']);
$method = strtolower($_SERVER['REQUEST_METHOD']);

route($rpath, $method); 

function route($rpath, $method)
{
  if ($rpath === '') {
    $rpath = 'home';
  }

  $targetFile = SOURCE_BASE . "controllers/{$rpath}.php";

  if (!file_exists($targetFile)) {
    require_once SOURCE_BASE . 'views/404.php';
    return;
  }
  
  require_once $targetFile;

  $fn = "\\controller\\{$rpath}\\{$method}";

  $fn();

}

// if ($_SERVER['REQUEST_URI'] === 'login') {
//   require_once SOURCE_BASE . 'controllers/login.php';
// } elseif ($_SERVER['REQUEST_URI'] === '/poll/part1/start/register') {
//   require_once SOURCE_BASE . 'controllers/register.php';
// } elseif ($_SERVER['REQUEST_URI'] === '/poll/part1/start/') {
//   require_once SOURCE_BASE . 'controllers/home.php';
// }

require_once SOURCE_BASE . 'partials/footer.php';
