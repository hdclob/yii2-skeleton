<?php

use common\models\MediaType;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use unclead\multipleinput\MultipleInput;

/** @var yii\web\View $this */
/** @var common\models\Project $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="project-form">

	<?php $form = ActiveForm::begin([
		'id' => 'project-form',
		'enableAjaxValidation' => true,
		'enableClientValidation' => false,
	]); ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'mediaInput')->widget(MultipleInput::class, [
		'rowOptions' => function ($model, $index, $context) {
			return [
				'class' => 'align-baseline'
			];
		},
		'addButtonOptions' => ['class' => 'btn btn-light'],
		'iconSource' => MultipleInput::ICONS_SOURCE_FONTAWESOME,
		'enableError' => true,
		'min' => 1,
		'columns' => [
			[
				'name' => 'media_id',
				'type' => 'hiddenInput',
			],
			[
				'name' => 'title',
				'title' => 'Title',
				'type' => 'textInput',
				'errorOptions' => ['class' => 'invalid-feedback'],
				'options' => [
					'maxlength' => true,
					'class' => 'form-control',
				]
			],
			[
				'name' => 'media_type_id',
				'title' => 'Type',
				'type' => 'dropdownList',
				'errorOptions' => ['class' => 'invalid-feedback'],
				'items' => MediaType::find()->select('name')->indexBy('media_type_id')->column(),
				'options' => [
					'maxlength' => true,
					'class' => 'form-select',
				]
			],
			[
				'name' => 'url',
				'title' => 'URL',
				'type' => 'textInput',
				'errorOptions' => ['class' => 'invalid-feedback'],
				'options' => [
					'maxlength' => true,
					'class' => 'form-control',
				]
			],
		]
	])->label(false) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['id' => 'projectSubmitBtn', 'class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>

<script>
	$(function() {
		$('#projectSubmitBtn').on('click', function() {
			$(this).attr('disabled', true);

			$('#project-form').data('yiiActiveForm').submitting = true;
			$('#project-form').yiiActiveForm('validate');

			return false;
		});

		$('#project-form').on('afterValidate', function(e, m, errors) {
			if (Array.isArray(errors) && errors.length) {
				$('#projectSubmitBtn').attr('disabled', false);
			}
			return false;
		});
	})
</script>