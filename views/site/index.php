<?php

use yii\bootstrap\Carousel;
use Yii2Imageslider\Yii2Imageslider;

/**
 * @var yii\base\View $this
 */
$this->title = 'Power-Shop The Original! Weil am Rhein, direkt im Ländereck Dutschland, Frankreich, Schweiz';
?>
<div class="site-wsp">

	<div class="row">
		<div class="col-lg-8">
			<div class="bigspace">
				<?php 
					$item = array();
					for($img=4;$img<=5;$img++){
						$item[] = array('content'=>"<img src='images/".$img.".jpg' height='300px' />",'id'=>$img,'caption'=>'Die neuen Modelle 2014 sind da!');
					}

					echo Carousel::widget(array(
						'items'=> $item,
					)); 
				?>

				<?php 
					echo Yii2Imageslider::widget(array(
						'id' => 'sp_slider',
						'items'=> array(
							array(
								'caption'=>'8 50',
								'content' => '<img style="height:90px;width:160px;" src="/powershopyii2/powershop/web/index.php?r=pages/page/connector&cmd=file&target=l1_bW9kZWxsZS8yMDE0LzE0LWhkLTEyMDAtY3VzdG9tLWJzLnBuZw" alt="">'
							),
							array(
								'caption'=>'Longtail',
								'content' => '<img style="height:90px;width:160px;" src="/powershopyii2/powershop/web/index.php?r=pages/page/connector&cmd=file&target=l1_bW9kZWxsZS8yMDE0LzE0LWhkLTg4My1yb2Fkc3Rlci1icy5wbmc" alt="">'
							),
							array(
								'caption'=>'Blobber',
								'content' => '<img style="height:90px;width:160px;" src="/powershopyii2/powershop/web/index.php?r=pages/page/connector&cmd=file&target=l1_bW9kZWxsZS8yMDE0LzE0LWhkLWJyZWFrb3V0LWJzLnBuZw" alt="">'
							),
							array(
								'caption'=>'Chopper',
								'content' => '<img style="height:90px;width:160px;" src="/powershopyii2/powershop/web/index.php?r=pages/page/connector&cmd=file&target=l1_bW9kZWxsZS8yMDE0LzE0LWhkLTg4My1yb2Fkc3Rlci1icy5wbmc" alt="">'
							),
							array(
								'caption'=>'Six Seven',
								'content' => '<img style="height:90px;width:160px;" src="/powershopyii2/powershop/web/index.php?r=pages/page/connector&cmd=file&target=l1_bW9kZWxsZS8yMDE0LzE0LWhkLWJyZWFrb3V0LWJzLnBuZw" alt="">'
							)							
						),
						'clientOptions' => array(
							'visible_items'=>3,
							'circular' => 'yes',
						),
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
