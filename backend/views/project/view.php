<?php

use common\helpers\DateTimeHelper;
use common\models\Project;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Project $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'project_id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'project_id' => $model->project_id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'project_id',
			'title',
			'description:ntext',
			[
				'attribute' => 'display',
				'format' => 'raw',
				'value' => function (Project $model) {
					return '<div class="form-check form-switch">' .
						Html::checkbox(
							'',
							$model->display,
							[
								'class' => 'displayCheckbox form-check-input',
								'data-modelid' => $model->project_id
							]
						) .
						'</div>';
				},
			],
			[
				'label' => 'Media',
				'format' => 'raw',
				'value' => function ($model) {
					$ret = '';
					$lastKey = array_key_last($model->mediaInput);
					foreach ($model->mediaInput as $k => $media) {
						$ret .= Html::a($media['title'], $media['url'], ['target' => '_blank']);
						if ($k != $lastKey) {
							$ret .= '<br/>';
						}
					}

					return $ret;
				}
			],
			[
				'attribute' => 'created_at',
				'value' => function ($model) {
					return DateTimeHelper::getDateTime($model->created_at);
				}
			],
			[
				'attribute' => 'updated_at',
				'value' => function ($model) {
					return DateTimeHelper::getDateTime($model->updated_at);
				}
			],
		],
	]) ?>

</div>

<script>
	$(function() {
		$('body').on('change', '.displayCheckbox', function(e) {
			e.preventDefault();
	
			$.ajax({
				url: '<?= Url::to(['toggle-display']) ?>?project_id=' + $(this).data('modelid')
			})
		})
	})
</script>