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
			<div class="col-8">
				<hr>
				<?= $content ?>
			</div>
			<div class="col-4">
				<div class="static-sidebar position-fixed">
					<hr>
					<div class="clearfix my-4">
						<a href="javascript:;" class="normal-text float-start">Francisco Mendes</a>
						<a href="javascript:;" target="_blank" class="normal-text float-end"><i class="fa-solid fa-file-pdf fa-fw"></i></a>
					</div>
					<div>
						<p class="normal-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<hr>
					<div>
						<ul class="static-sidebar-menu">
							<li>
								<a href="javascript:;" target="_blank" class="normal-text"><i class="fa-solid fa-link fa-fw"></i> Home</a>
							</li>
							<li>
								<a href="javascript:;" target="_blank" class="normal-text"><i class="fa-solid fa-link fa-fw"></i> Linkedin</a>
							</li>
							<li>
								<a href="javascript:;" target="_blank" class="normal-text"><i class="fa-solid fa-link fa-fw"></i> Instagram</a>
							</li>
							<li>
								<a href="javascript:;" target="_blank" class="normal-text"><i class="fa-solid fa-link fa-fw"></i> Behance</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
