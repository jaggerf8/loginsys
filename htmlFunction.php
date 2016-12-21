<?php


class htmlFunction
{

public function arrayToTable($array1,$header=false)
{
	echo "we are in arrayToTable function in htmlFunction file <br>";
	echo '<table border=1>';

	if ($header == true)
	{
		$length = count($array1[0]);
		$key1 = array_keys($array1);
		echo '<tr><thead>';
		
		foreach($key1 as $header)
		{
			echo '<th>' . $header . '</th>';
		}
		
		echo '</thead></tr>';
		
		$i = "0";
		foreach($array1 as $el)
		{
			$array2 = array();
			foreach($array1 as $temparray)
			{
				array_push($array2, $temparray[$i]);
			}
			echo '<tr>';
			foreach($array2 as $key)
			{
				echo '<td>' . $key . '</td>';
			}
			echo '</tr>';
			$i += "1";
		}
	}

	else
	{
		foreach($array1 as $el)
		{
			echo '<tr>';
			foreach($el as $key)
			{
				echo '<td>' . $key . '</td>';
			}
			echo '</tr>';
		}
	}
	
	echo '</table>';
}
}

?>
