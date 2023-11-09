<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\bootstrap5\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php $this->registerCsrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body>
	<?php $this->beginBody() ?>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-8 col-12 order-md-1 order-2">
				<hr>
				<?= $content ?>
			</div>
			<div class="col-md-4 col-12 order-md-2 order-1">
				<div class="static-sidebar position-fixed d-md-block d-none">
					<?= $this->render('_static-info') ?>
				</div>
				<div class="d-md-none d-block">
					<?= $this->render('_static-info') ?>
				</div>
			</div>
		</div>
	</div>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
