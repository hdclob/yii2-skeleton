<?php

namespace frontend\widgets;

use common\helpers\VideoHelper;
use common\models\Media;
use common\models\MediaType;
use common\models\Project;
use yii\base\Widget;

class ProjectDisplayWidget extends Widget
{
	public function run()
	{
		$projects = Project::findAll(['display' => 1]);

		$data = [];
		foreach ($projects as $k => $project) {
			$data[$k]['id'] = $project->project_id;
			$data[$k]['title'] = $project->title;
			$data[$k]['description'] = $project->description;

			$firstMedia = $project->media[0];
			if ($this->isMediaVideo($firstMedia)) {
				$data[$k]['is_video'] = true;
				$data[$k]['media'] = $this->generateVideoTag($firstMedia);
			} else {
				$data[$k]['is_video'] = false;
				$data[$k]['media'] = $project->getMedia()
					->select(['media.media_id', 'media.title', 'url'])
					->andWhere(['media_type_id' => MediaType::MEDIA_TYPE_IMAGE])
					->asArray()
					->all();
			}
		}
		
		return $this->render('project-display', [
			'data' => $data
		]);
	}

	protected function generateVideoTag(Media $media)
	{
		if ($media->media_type_id = MediaType::MEDIA_TYPE_YOUTUBE_VIDEO) {
			return $this->generateYoutubeVideoTag($media);
		}

		$ext = pathinfo($media->url, PATHINFO_EXTENSION);

		return '<video class="w-100" height="315" controls>
			<source src="' . $media->url . '" type="video/"' . $ext .'>
			Your browser does not support the video tag.
		</video>';
	}

	protected function generateYoutubeVideoTag(Media $media)
	{
		// return '<iframe class="w-100" height="315" src="' . VideoHelper::convertYoutubeUrlToEmbedded($media['url']) . '?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
		return '<iframe class="w-100" height="315" src="' . VideoHelper::convertYoutubeUrlToEmbedded($media['url']) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
	}

	protected function isMediaVideo(Media $media)
	{
		$videoTypes = [
			MediaType::MEDIA_TYPE_VIDEO,
			MediaType::MEDIA_TYPE_YOUTUBE_VIDEO
		];

		return in_array($media->media_type_id, $videoTypes);
	}
}
