<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "media_type".
 *
 * @property int $media_type_id
 * @property int $name
 *
 * @property Media[] $media
 */
class MediaType extends \yii\db\ActiveRecord
{
	const MEDIA_TYPE_IMAGE = 1;
	const MEDIA_TYPE_VIDEO = 2;
	const MEDIA_TYPE_YOUTUBE_VIDEO = 2;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'media_type';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['name'], 'integer'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'media_type_id' => 'Media Type ID',
			'name' => 'Name',
		];
	}

	/**
	 * Gets query for [[Media]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getMedia()
	{
		return $this->hasMany(Media::class, ['media_type_id' => 'media_type_id']);
	}
}
