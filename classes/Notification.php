<?php 
class Notification
{
	private $conn;

	public function __construct($connectionObject)
	{
		$this->conn = $connectionObject;
	}

	public function notify($to, $message, $section="", $notification_type=1, $is_read=0, $super_recipients="")
		{
		    global $connect, $database_connect;

		    if(isset($to) && $to !="")
		    {
		    	$crud = new Crud($this->conn);
		        $recipients = explode(",", $to);
		        $sent = true;
		        foreach ($recipients as $key => $v) {
		        	$sent = $crud->insert("notifications", array(
		        		'message'=>$message,
		        		'type'=> $notification_type,
		        		'receiver' => $v,
		        		'added_on' => date("Y-m-d H:i:s"),
		        		'section' => $section,
		        		'is_read' => $is_read,
		        		'super_recipients' => $super_recipients
		        	));
		        }

		        if(!$sent)
		        {
		           return false;
		        }
		        else
		        {
		            return true;
		        }
		    }

	}

}




 ?>