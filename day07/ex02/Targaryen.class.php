<?php
class Targaryen {
	public function resistsFire() {
		return FALSE;
	}
	public function getBurned()
	{
		return ($this->resistsFire() == FALSE) ? "burns alive" : "emerges naked but unharmed"; 
	}
}

?>