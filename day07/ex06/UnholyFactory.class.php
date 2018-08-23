<?php
	class UnholyFactory{
		
		private $fighters = array();
		public function absorb($solider){
			if (in_array(get_class($solider), $this->fighters))
				{	
					echo "(Factory already absorbed a fighter of type ".$solider->fightertype.")".PHP_EOL;
					return ;
				}
				if (get_parent_class($solider) != "Fighter")
					echo "(Factory can't absorb this, it's not a fighter".")".PHP_EOL;
				else
				{
					$this->fighters[$solider->fightertype] = get_class($solider);
					echo "(Factory absorbed a fighter of type ".$solider->fightertype.")".PHP_EOL;
				}
		}
		public function fabricate($solider) {
			if (array_key_exists($solider , $this->fighters))
			{
				echo "(Factory fabricates a fighter of type $solider)".PHP_EOL;
				return new $this->fighters[$solider];
			}
			else
			{
				echo "(Factory hasn't absorbed any fighter of type $solider)".PHP_EOL;
				return NULL;
			}
		}
	}
?>