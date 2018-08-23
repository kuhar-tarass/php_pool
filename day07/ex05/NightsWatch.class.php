<?php
	class NightsWatch
	{
		public function recruit($telo)
		{
			if ($telo instanceof IFighter)
				$this->$members[]=$telo;
		}
		public function fight()
		{
			foreach($this->$members as $fighter)
			{
				$fighter->fight();
			}

		}
	}
?>