<?php
class ICS {
	var $data;
	var $name;
	
	public function __construct()
	{
		// Nothing
	}
	
	function create($start,$end,$name,$description,$location) {
		$this->name = $name;
		$this->data = "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\nBEGIN:VEVENT\n".
			"DTSTART:" .date("Ymd\THis",strtotime($start)) .
			"\nDTEND:" .date("Ymd\THis",strtotime($end)).
			"\nLOCATION:".$location.
			"\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nD".
			"TSTAMP:".date("Ymd\THis").
			"\nSUMMARY: WGC reminder [".$name."]".
			"\nDESCRIPTION: This is an automatic generated reminder for: ".$description. "\nfrom: " .$start." to:".$end.
			"\nPRIORITY:1\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\nEND:VCALENDAR\n";
	}
	
	function save() {
		file_put_contents($this->name.".ics",$this->data);
	}
	
	function show() {
		header("Content-type:text/calendar");
		header('Content-Disposition: attachment; filename="'.$this->name.'.ics"');
		Header('Content-Length: '.strlen($this->data));
		Header('Connection: close');
		echo $this->data;
	}
}
?>