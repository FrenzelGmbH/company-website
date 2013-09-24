<?php
use \yii\helpers\Html;
use app\modules\workflow\models\Workflow;
use app\modules\comments\models\Comment;


$deleteJS = <<<DEL
$('.container').on('click','.op a.delete',function() {
	var th=$(this),
		container=th.closest('div.comment'),
		id=container.attr('id').slice(1);
	if(confirm('Are you sure you want to delete comment #'+id+'?')) {
		$.ajax({
			url:th.attr('href'),
			data:{
				'ajax':1
			},
			type:'POST'
		}).done(function(){container.slideUp()});
	}
	return false;
});

DEL;
$this->registerJs($deleteJS);
?>

<div class="comment" id="c<?php echo $model->id; ?>">

	<p>
		<?php echo Html::a("#{$model->id}", $model->url, array(
			'class'=>'cid',
			'title'=>Yii::t('app','Permalink to this comment'),
		)); ?>
		<?php echo $model->AuthorLink; ?> <?php echo Yii::t('app','says on'); ?>
		<?php echo Html::a(Html::encode($model->post->title), $model->post->url); ?>
	<p>

	<p><?php echo nl2br(Html::encode($model->content)); ?></p>

	<p class="op">
		<?php if($model->status==Workflow::STATUS_PENDING): ?>
			<span class="pending">Pending approval</span> |
			<?php echo Html::a('Approve', array('comment/approve','id'=>$model->id), array('class'=>'approve')); ?> |
		<?php endif; ?>
		<?php echo Html::a('Update',array('comment/update','id'=>$model->id)); ?> |
		<?php echo Html::a('Delete',array('comment/delete','id'=>$model->id),array('class'=>'delete')); ?> |
		<?php echo date('F j, Y \a\t h:i a',$model->time_create); ?>		
	</p>

</div><!-- comment -->