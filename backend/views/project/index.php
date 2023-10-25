<?php

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

	<?php Pjax::begin(); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'project_id',
			'title',
			'description:ntext',
			'created_at',
			'updated_at',
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