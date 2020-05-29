<?php

class Email_model extends CI_Model
{
	function send_validation_email($to,$subject,$message) {
		$result = $this->email
			->from('studentCalender4@gmail.com')
			->reply_to('noreply@studentCalender.com')
			->to($to)
			->subject($subject)
			->message($message)
			->send();
		if($result)
			return true;
		else
			echo $this->email->print_debugger();
	}

	function send_confirmation_email($to, $subject, $message){
		$result = $this->email
			->from('studentCalender4@gmail.com')
			->reply_to('noreply@studentCalender.com')
			->to($to)
			->subject($subject)
			->message($message)
			->send();
		if($result)
			return true;
		else
			echo $this->email->print_debugger();
	}
}

?>
