<?php

use common\helpers\DateTimeHelper;
use common\models\Project;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\search\ProjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php Pjax::begin(['id' => 'project-pjax-container']); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			[
				'attribute' => 'project_id',
				'label' => '#'
			],
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
				'attribute' => 'created_at',
				'value' => function (Project $model) {
					return DateTimeHelper::getDateTime($model->created_at);
				}
			],
			[
				'attribute' => 'updated_at',
				'value' => function (Project $model) {
					return DateTimeHelper::getDateTime($model->updated_at);
				}
			],
			[
				'class' => ActionColumn::className(),
				'urlCreator' => function ($action, Project $model, $key, $index, $column) {
					return Url::toRoute([$action, 'project_id' => $model->project_id]);
				}
			],
		],
	]); ?>

	<?php Pjax::end(); ?>

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