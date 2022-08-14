  <?php

use lib\Msg;

require_once 'config.php';

//library
require_once SOURCE_BASE . 'libs/helper.php';
require_once SOURCE_BASE . 'libs/auth.php';
require_once SOURCE_BASE . 'libs/router.php';

//Model
require_once SOURCE_BASE . 'models/abstract.model.php';
require_once SOURCE_BASE . 'models/user.model.php';

//Message
require_once SOURCE_BASE . 'libs/message.php';

//DB 
require_once SOURCE_BASE . 'db/datasource.php';
require_once SOURCE_BASE . 'db/user.query.php';

//Partials
require_once SOURCE_BASE . 'partials/header.php';
require_once SOURCE_BASE . 'partials/footer.php';

//View
require_once SOURCE_BASE . 'views/login.php';
require_once SOURCE_BASE . 'views/register.php';

use function lib\route;

//対象のクラスを先に読み込まないとセッションに格納できないため順番に注意
session_start();

try {
  \partials\header();

  $rpath = str_replace(BASE_CONTEXT_PATH, '', CURRENT_URI);
  $method = strtolower($_SERVER['REQUEST_METHOD']);

  route($rpath, $method);

  \partials\footer();

} catch (Throwable $e) {
  die('<h1>何かがすごくおかしいようです。</h1>');
}
