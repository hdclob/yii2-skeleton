<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $media_id
 * @property int $project_id
 * @property string $title
 * @property int $media_type_id
 * @property string $url
 *
 * @property MediaType $mediaType
 * @property Project $project
 */
class Media extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'media';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['title', 'media_type_id', 'url'], 'required'],
			[['project_id', 'media_type_id'], 'integer'],
			[['title', 'url'], 'string', 'max' => 255],
			[['media_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MediaType::class, 'targetAttribute' => ['media_type_id' => 'media_type_id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'media_id' => 'Media ID',
			'project_id' => 'Project ID',
			'title' => 'Title',
			'media_type_id' => 'Media Type ID',
			'url' => 'Url'
		];
	}

	/**
	 * Gets query for [[MediaType]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getMediaType()
	{
		return $this->hasOne(MediaType::class, ['media_type_id' => 'media_type_id']);
	}

	/**
	 * Gets query for [[Projects]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getProject()
	{
		return $this->hasOne(Project::class, ['project_id' => 'project_id']);
	}
}
