<?php
	function ft_is_sort($arr){
		$arr1 = $arr;
		sort ($arr1);
		if ($arr1 == $arr)
			return TRUE;
		else
		{
			$arr1 = $arr;
			rsort ($arr1);
			if ($arr1 == $arr)
				return TRUE;
		}
		return FALSE;
	}
?>