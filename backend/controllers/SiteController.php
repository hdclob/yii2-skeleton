<?php

namespace backend\controllers;

use common\models\LoginForm;
use Da\User\Filter\AccessRuleFilter;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
	/**
	 * {@inheritdoc}
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
						'actions' => ['error'],
						'allow' => true,
					],
					[
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['admin'],
					],
				],
			]
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => \yii\web\ErrorAction::class,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		return $this->render('index');
	}
}
