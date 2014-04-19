<?php

use yii\bootstrap\Carousel;
use Yii2Imageslider\Yii2Imageslider;

/**
 * @var yii\base\View $this
 */
$this->title = 'Frenzel GmbH - QlikView Consulting, Individual Software Entwicklung, Management Beratung';
?>
<div class="nostyler">

  <div class="row">
    <div class="col-lg-8">
      <div class="bigspace">
        <?php 
          $item = array();
          $item[] = array(
              'content'=>"<img src='img/sample_rps.png'/>",
              'id'=>$img,
              'caption' => '<h4>Restricted Party Screening Solution</h4><p>Keep trade governance!</p>'
          );

          $item[] = array(
              'content'=>"<img src='img/sample_planlogiq.png'/>",
              'id'=>$img,
              'caption' => '<h4>Planlogiq</h4><p>Dezentrale Planungslösung für KMU!</p>'
          );

          for($img=1;$img<=2;$img++){
            $item[] = array('content'=>"<img src='http://lorempixel.com/750/250/people'/>",'id'=>$img);
          }

          echo Carousel::widget(array(
            'items'=> $item,
          )); 
        ?>

        <div class="row">
          <div class="col-lg-6">
            <?php
              echo app\modules\pages\widgets\PortletSinglePage::widget(array(
                  'id'=>1,
              ));
            ?>
          </div>
          <div class="col-lg-6">
            <?php
              echo app\modules\pages\widgets\PortletSinglePage::widget(array(
                  'id'=>2,
              ));
            ?>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-4">
      <div class="spacer">
        <?php
          echo app\modules\posts\widgets\PortletPosts::widget(array(
              'limit'=>3,
          ));
        ?>
        <?php
          echo app\modules\pages\widgets\PortletSinglePage::widget(array(
              'id'=>3,
          ));
        ?>
      </div>
    </div>
  </div>  

</div>