<?php

namespace app\controllers;

use Yii;
use app\modules\posts\models\Post;
use app\modules\app\controllers\AppController;

use \Suin\RSSWriter\Feed;
use \Suin\RSSWriter\Channel;
use \Suin\RSSWriter\Item;

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

class RssController extends AppController
{

  public function actionFeed()
  {
    header('Content-Type: application/rss+xml; charset=UTF-8');
    $feed = new Feed();

    $channel = new Channel();
    $channel
        ->title("Simple But Magnificent")
        ->description("Fashion, Lifestyle, Food, Fun, Travel, People")
        ->url('http://www.simplebutmagnificent.com')
        ->appendTo($feed);

    $Posts = Post::getAdapterForPosts('20')->all();
    foreach($Posts As $Post)
    {
      $item = new Item();
      $item
      ->title(Html::encode(strtoupper($Post->title)))
      ->description(HtmlPurifier::process($Post->content))
      ->pubDate(gmdate("Y-m-d",$Post->time_create))
      ->url(\Yii::$app->urlManager->createAbsoluteUrl(['/posts/post/onlineview','id'=> $Post->id]))
      ->appendTo($channel);
    }

    echo $feed;
    exit;
  }

}
