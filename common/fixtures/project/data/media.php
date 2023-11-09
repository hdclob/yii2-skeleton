<?php

function getMediaData($media_id, $project_id, $title, $media_type_id, $url)
{
	return 	[
		'media_id' => $media_id,
		'project_id' => $project_id,
		'title' => $title,
		'media_type_id' => $media_type_id,
		'url' => $url,
	];
}

return [
	getMediaData(1, 1, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(2, 1, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),

	getMediaData(3, 2, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(4, 2, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),

	getMediaData(5, 3, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(6, 3, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),

	getMediaData(7, 4, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(8, 4, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),

	getMediaData(9, 5, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(10, 5, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),

	getMediaData(11, 6, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(12, 6, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),

	getMediaData(13, 7, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(14, 7, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),

	getMediaData(15, 8, 'Youtube Video', 2, 'https://www.youtube.com/watch?v=aBNY3MXnxag'),
	getMediaData(16, 8, 'Image', 1, 'https://static.wikia.nocookie.net/muppet/images/0/08/CookieMonsterWaving.jpg'),
];
