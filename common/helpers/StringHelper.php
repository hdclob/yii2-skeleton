<?php

namespace common\helpers;

class StringHelper
{
	public static function truncate($string, $limit = 500)
	{
		if (strlen($string) <= $limit) {
			return $string;
		}

		return substr($string, 0, $limit) . '...';
	}
}
