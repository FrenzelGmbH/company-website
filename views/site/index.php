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
              'id'=>'1',
              'caption' => '<h4>Restricted Party Screening Solution</h4><p>Keep trade governance!</p>'
          );

          $item[] = array(
              'content'=>"<img src='img/sample_planlogiq.png'/>",
              'id'=>'2',
              'caption' => '<h4>Planlogiq</h4><p>Dezentrale Planungslösung für KMU!</p>'
          );

          $item[] = array(
              'content'=>"<img src='img/sample_blog.png'/>",
              'id'=>'3',
              'caption' => '<h4>SBLOG</h4><p>Smart Blog Lösung - indiviual!</p>'
          );

          echo Carousel::widget(array(
            'items'=> $item,
          )); 
        ?>

        <div class="row">
          <div class="col-lg-6">
            <?php
              echo frenzelgmbh\scms\widgets\PortletSinglePage::widget(array(
                  'id'=>1,
              ));
            ?>
          </div>
          <div class="col-lg-6">
            <?php
              echo frenzelgmbh\scms\widgets\PortletSinglePage::widget(array(
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
          /*echo frenzelgmbh\sblog\widgets\PortletPosts::widget(array(
              'limit'=>3,
          ));*/
        ?>
        <?php
          echo frenzelgmbh\scms\widgets\PortletSinglePage::widget(array(
              'id'=>3,
          ));
        ?>
      </div>
    </div>
  </div>  

</div>