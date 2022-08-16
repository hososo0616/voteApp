<?php

namespace db;

use db\DataSource;
use model\CommentModel;

class CommentQuery
{
  public static function fetchByTopicId($topic)
  {
    if (!$topic->isValidId()) {
      return false;
    }

    $db = new DataSource();
    $sql = 'select c.*, u.nickname
            from pollapp.comment c
            innner join pollapp.users u
            on c.user_id = u.id
            where c.topic_id = :id
            and c.body != "" 
            and c.del_flg != 1
            and u.del_flg != 1
            order by c.id desc';

    $result = $db->select($sql, [
      ':id' => $topic->id
    ], DataSource::CLS, TopicModel::class);

    return $result;
  }

  
}
