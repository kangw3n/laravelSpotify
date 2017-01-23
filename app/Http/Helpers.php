<?php

	function msMinute($millseconds)
	{
		$seconds = floor($millseconds / 1000);
		$days = floor($seconds / 86400);
		$hours = floor(($seconds % 86400) / 3600);
		$minutes = floor((($seconds % 86400) % 3600) / 60);
		$timeString = '';


		if ($days > 0) $timeString .= ($days > 1) ? ($days . " days ") : ($days . " day ");
		if ($hours > 0) $timeString .= ($hours > 1) ? ($hours . " hours ") : ($hours . " hour ");
		if ($minutes >= 0) $timeString .= ($minutes > 1) ? ($minutes . " minutes ") : ($minutes . " minute ");

		return $timeString;
	}
