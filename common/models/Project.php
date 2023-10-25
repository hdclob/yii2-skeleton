<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "project".
 *
 * @property int $project_id
 * @property string $title
 * @property string|null $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Media[] $media
 */
class Project extends \yii\db\ActiveRecord
{
	public $mediaInput = [];

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'project';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			[['description'], 'string'],
			[['created_at', 'updated_at'], 'integer'],
			[['title'], 'string', 'max' => 255],
			[['mediaInput'], 'validateMedia'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'project_id' => 'Project ID',
			'title' => 'Title',
			'description' => 'Description',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	public function afterFind()
	{
		parent::afterFind();

		$this->mediaInput = $this->getMedia()->select(['media_id', 'media_type_id', 'title', 'url'])->asArray()->all();
	}

	/**
	 * Gets query for [[Media]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getMedia()
	{
		return $this->hasMany(Media::class, ['project_id' => 'project_id']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			TimestampBehavior::class
		];
	}

	public function validateMedia($attr)
	{
		foreach ($this->mediaInput as $k => $media) {
			if (empty($media['title'])) {
				$this->addError($attr . '[' . $k . '-title]', 'Title cannot be blank');
			}
			if (empty($media['url'])) {
				$this->addError($attr . '[' . $k . '-url]', 'URL cannot be blank');
			}
		}
	}
}
