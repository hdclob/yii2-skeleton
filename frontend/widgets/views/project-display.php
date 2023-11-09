<?php

/** @var common\models\Project[] $projects */

use common\helpers\StringHelper;
use common\helpers\VideoHelper;
use common\models\MediaType;
use yii\helpers\Url;

?>

<?php foreach ($data as $d) : ?>
	<div class="row">
		<div class="col-md-6 col-12">
			<?php if ($d['is_video']) : ?>
				<?= $d['media'] ?>
			<?php else : ?>
			<?php endif ?>
		</div>
		<div class="col-md-6 col-12">
			<div class="my-4">
				<span class="normal-text">#<?= $d['id'] ?></span>
				<a href="<?= Url::to(['/project/view', 'project_id' => $d['id']]) ?>" class="normal-text"><?= $d['title'] ?></a>
			</div>
			<div class="mb-4">
				<p class="normal-text">
					<?= StringHelper::truncate($d['description']) ?>
				</p>
			</div>
			<div class="mb-4">
				<a href="<?= Url::to(['/project/view', 'project_id' => $d['id']]) ?>" class="normal-text">Read more</a>
			</div>
		</div>
	</div>
	<hr>
<?php endforeach;
