<?php

namespace backend\controllers;

use common\models\Media;
use common\models\Project;
use common\models\RelProjectMedia;
use common\models\search\ProjectSearch;
use Da\User\Filter\AccessRuleFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
	/**
	 * @inheritDoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'ruleConfig' => [
					'class' => AccessRuleFilter::class
				],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['admin'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::class,
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Project models.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$searchModel = new ProjectSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Project model.
	 * @param int $project_id Project ID
	 * @return string
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($project_id)
	{
		return $this->render('view', [
			'model' => $this->findModel($project_id),
		]);
	}

	/**
	 * Creates a new Project model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new Project();

		if ($this->request->isAjax && $model->load($this->request->post())) {
			$this->response->format = Response::FORMAT_JSON;
		
			return ActiveForm::validate($model);
		}

		if ($this->request->isPost) {
			if ($model->load($this->request->post())) {
				$t = \Yii::$app->db->beginTransaction();
				try {
					if (!$model->save()) {
						throw new \Exception();
					}

					foreach ($model->mediaInput as $media) {
						$mediaModel = new Media();
						$mediaModel->load($media, '');
						$mediaModel->project_id = $model->project_id;

						if (!$mediaModel->save()) {
							throw new \Exception();
						}
					}

					$t->commit();

					return $this->redirect(['view', 'project_id' => $model->project_id]);
				} catch (\Throwable $e) {
					$t->rollBack();
				}
			}
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Project model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param int $project_id Project ID
	 * @return string|\yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($project_id)
	{
		$model = $this->findModel($project_id);

		if ($this->request->isAjax && $model->load($this->request->post())) {
			$this->response->format = Response::FORMAT_JSON;
		
			return ActiveForm::validate($model);
		}

		if ($this->request->isPost && $model->load($this->request->post())) {
			$t = \Yii::$app->db->beginTransaction();
			try {
				if (!$model->save()) {
					throw new \Exception();
				}

				Media::deleteAll(['project_id' => $model->project_id]);

				foreach ($model->mediaInput as $media) {
					$mediaModel = new Media();
					$mediaModel->load($media, '');
					$mediaModel->project_id = $model->project_id;

					if (!$mediaModel->save()) {
						throw new \Exception();
					}
				}

				$t->commit();

				return $this->redirect(['view', 'project_id' => $model->project_id]);
			} catch (\Throwable $e) {
				$t->rollBack();
			}
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Project model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param int $project_id Project ID
	 * @return \yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($project_id)
	{
		$this->findModel($project_id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Project model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param int $project_id Project ID
	 * @return Project the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($project_id)
	{
		if (($model = Project::findOne(['project_id' => $project_id])) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
