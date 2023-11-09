<?php

namespace common\helpers;

class DateTimeHelper
{
	public static function getDate($timestamp)
	{
		return date('Y-m-d', $timestamp);
	}
	
	public static function getDateTime($timestamp)
	{
		return date('Y-m-d H:i:s', $timestamp);
	}
}
