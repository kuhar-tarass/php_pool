<?php
class Lannister{
	function sleepWith($telo)
	{
		if ( get_class($this) == 'Jaime' && get_class($telo) == 'Cersei' ) 
		{
			echo "With pleasure, but only in a tower in Winterfell, then.\n";
		}
		else if ((get_parent_class($telo)) == "Lannister")
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}
}
?>