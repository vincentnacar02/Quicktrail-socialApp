<?php

/**
* 
*/
class EventLoggingController
{
	var $event;
	public function SetEvent($event)
	{
		$this->event = $event;
	}
	public function GetEvent()
	{
		return $this->event;
	}
	public function LogEvent($event)
	{
		$this->SetEvent($event);
		try {
			
		} catch (Exception $e) {
			
		}
	}
}

?>