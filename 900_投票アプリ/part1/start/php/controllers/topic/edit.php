<?php 

namespace controller\edit;

use db\TopicQuery;
use model\TopicModel;
use model\UserModel;

function get() {
  Auth::requireLogin();

  $topic = new TopicModel;
  $topic->id = get_param('topic_id', null, false);

  $user = UserModel::getSession();
  Auth::requirePeramission($topic->id, $user);

  $fetchedTopic = TopicQuery::fetchById($topic);

  \view\topic\edit\index($fetchedTopic);
}

?>