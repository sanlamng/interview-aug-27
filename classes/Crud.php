<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




class Crud
{
		private $conn;

		public function __construct($connectionObject)
		{
			$this->conn = $connectionObject;
		}



		//method to select data from any table
		public function select($table, $rows='*', $where=null, $order=null, $join =null, $limit=null, $group_by =null)
		{  

			try 
			{
				$sql="SELECT $rows FROM $table"; 

				if($join!=null)
				{
					$sql .= $join;
				}

				

				if($where!=null)
				{
					$sql .= " WHERE " . $where;
				}

				if($group_by!=null)
				{
					$sql .= " GROUP BY " . $group_by;
				}

				if($order!=null)
				{
					$sql .= " ORDER BY " . $order;
				}

				if($limit!=null)
				{
					$sql .= " LIMIT " . $limit;
				}


				//echo $sql;
				
				$q = $this->conn->prepare($sql);  
				$q->execute();

				if($q->rowCount() > 0)
				{
					while($r = $q->fetch(PDO::FETCH_ASSOC))
					{ 
						$data[]=$r; 
				
					} 
					return $data; 
				}

				else
				{
					return false;
				}

				
				
					

			} 

			catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}


		} 


		//Method to fetch any column by issuing an ID
		public function anyContent($whatyouwant, $table, $column, $equalsvalue)
		{
		 	try 
		 	{
		 		$sql = "SELECT $whatyouwant FROM $table WHERE $column = :equalsvalue ";
				$q = $this->conn->prepare($sql);
				$q->execute(array(':equalsvalue'=>$equalsvalue));
				$data = $q->fetch(PDO::FETCH_ASSOC);
				return $data["$whatyouwant"];
		 	} 

		 	catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}
			
		}

		public function generateTextPass($len){
		  $result = "";
		    $pickfrom = "ABCDEFGHJKMNPQRSTUVWXYZ";
		    $charArray = str_split($pickfrom);
		    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		      $result .= "".$charArray[$randItem];
		    }
		    return $result;
		}

		

		//method to insert data into any table
		public function insert($table, $vmk=array())
		{  
			try
			{

					foreach ($vmk as $key => $val) {
						$rowsa[] = $key;
						$preps[] = ":".$key;

					}

					$sql = "INSERT INTO $table "; 
					$rows = implode(",", $rowsa);
					$value = implode(",", $preps);
					$sql .= " (" . $rows . ")";
					$sql .= " VALUES (" . $value . ")";

					//echo $sql;

					$q = $this->conn->prepare($sql); 

					
					foreach ($vmk as $key => &$val) 
					{
						
						$q->bindParam(":".$key, $val) ;

					}
					$q->execute();

					return true; 

			} 

		 	catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}
		}  


		//method to insert data into any table eliminating duplicate
		public function insertIgnore($table, $vmk=array())
		{  
			try
			{

					foreach ($vmk as $key => $val) {
						$rowsa[] = $key;
						$preps[] = ":".$key;

					}

					$sql = "INSERT IGNORE INTO $table "; 
					$rows = implode(",", $rowsa);
					$value = implode(",", $preps);
					$sql .= " (" . $rows . ")";
					$sql .= " VALUES (" . $value . ")";

					//echo $sql;

					$q = $this->conn->prepare($sql); 

					
					foreach ($vmk as $key => &$val) 
					{
						
						$q->bindParam(":".$key, $val) ;

					}
					$q->execute();

					return true; 

			} 

		 	catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}
		}  

		//method to insert data into any table
		public function insertWithReturnValue($table, $vmk=array())
		{  
			try
			{

					foreach ($vmk as $key => $val) {
						$rowsa[] = $key;
						$preps[] = ":".$key;

					}

					$sql = "INSERT INTO $table "; 
					$rows = implode(",", $rowsa);
					$value = implode(",", $preps);
					$sql .= " (" . $rows . ")";
					$sql .= " VALUES (" . $value . ")";

					//echo $sql;

					$q = $this->conn->prepare($sql); 

					
					foreach ($vmk as $key => &$val) 
					{
						
						$q->bindParam(":".$key, $val) ;

					}
					$q->execute();

					return $this->conn->lastInsertId();  

			} 

		 	catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}
		}  



		public function update($table, $column, $id, $vmk=array())
		{  
			try
			{

					$sql = "UPDATE $table SET "; 
					foreach ($vmk as $key => $val) 
					{
						$tt[] = "$key=:$key";
					}

					$rows = implode(",", $tt);
					$sql .= $rows;
					$sql .=" WHERE $column=:$column";

					//echo $sql;

					$q = $this->conn->prepare($sql); 

					
					foreach ($vmk as $key => &$val) 
					{
						
						$q->bindParam(":".$key, $val) ;

					}
					$q->bindParam(":".$column, $id) ;
					$q->execute();


					return true; 

			} 

		 	catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}
		}  

		public function rawSQl($sql, $parameters)
		{  
			try
			{
				//run query
				$sql = $sql;
				$q = $this->conn->prepare($sql); 

				foreach ($parameters as $key => &$val) 
				{
					$q->bindParam(":".$key, $val) ;
				}
				$q->execute();
				return true; 

			} 

		 	catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}
		}  


		
		public function delete($column,$id,$table)
		{  
			try
			{ 
				$sql="DELETE FROM $table WHERE $column=:id"; 
				$q = $this->conn->prepare($sql); 
				$q->bindParam(":id", $id);
				$q->execute(); 
				return true; 
			} 

		 	catch (PDOException $e) 
			{
				
				echo $e->getMessage();
			}
		}



		//this logs user action to audit trail
		public function auditTrail($task, $description, $ip_address, $audit_date, $action_by)
		{
			try 
		 	{
		 		$sql = "INSERT INTO audittrail SET task = :task, 
		 										   description = :description, 
		 										   ip_address = :ip_address, 
		 										   audit_date = :audit_date, 
		 										   action_by = :action_by ";
				$q = $this->conn->prepare($sql);
				$q->execute(array(':task'=>$task,
							':description'=>$description,
							':ip_address'=>$ip_address,
							'audit_date'=>$audit_date,
							'action_by'=>$action_by
							));
		 	} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
		       
		}
		
		public function checkforRegistry($cart_items){
			$output = false;
			$registry_id = "0";
			
			foreach ($cart_items as $key => $v) {
				if(intval($v["registry_id"]) > 0) {
					$output = true;
					$registry_id = $v["registry_id"];
					break;
				}
			}
			return ["output"=>$output, "registry_id"=>$registry_id];
		}

		public function resendActivation($email)
	   	{
	       try
	       {
	       	  $activationcode = $this->ActivationCode(30);
	          $q = $this->conn->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
	          $q->execute(array(':email'=>$email));
	          $userRow=$q->fetch(PDO::FETCH_ASSOC);
	          if($q->rowCount() > 0)
	          {

	          	 $q = $this->conn->prepare("UPDATE users SET activation_code=:activationcode WHERE email=:email");
	          	 $q->execute(array(':activationcode'=>$activationcode, 
	          	 					':email'=>$email));
	             return $activationcode;
	          }
	          else
	          {
	          	return false;
	          }
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   	}

		public function showViews($table, $column_to_count, $value){
			$count = $this->select($table, " count(id) as total ", " $column_to_count = '$value' ");
			return $count[0]["total"];
		}


	    public function activateUser($email, $userconfirm)
	    {
	       try
	       {
	       	  $activationcode = $this->ActivationCode(30);
	          $q = $this->conn->prepare("SELECT * FROM users WHERE Email =:email && ActivationCode=:userconfirm  LIMIT 1");
	          $q->execute(array(':email'=>$email,':userconfirm'=>$userconfirm));
	          $userRow=$q->fetch(PDO::FETCH_ASSOC);
	          if($q->rowCount() > 0)
	          {

	          	 $q = $this->conn->prepare("UPDATE users SET ActiveStatus = '2', ActivatedOn=:activatedon, 
	          	 	IPAddress =:ipaddress WHERE Email=:email");
	          	 $q->execute(array(':activatedon'=>date("Y-m-d G:i:s"),
	          	 					':email'=>$email,
	          	 					':ipaddress'=>$_SERVER["REMOTE_ADDR"]));
	             return true;
	          }
	          else
	          {
	          	return false;
	          }
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   	}


	   	public function activationCode($len)
	   	{
		  $result = "";
		    $pickfrom = "1234567890abscefghijklmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWXYZ";
		    $charArray = str_split($pickfrom);
		    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		      $result .= "".$charArray[$randItem];
		    }
		    return $result;
		}


		

		//send notification
		public function notify($user_id, $subject, $message){
			$connect = $this->conn;
			$crud = new Crud($connect);
			$themails = explode(",", $user_id);
			$save_notification = true;
			for ($i=0; $i <count($themails) ; $i++) { 
				$save_notification = $crud->insert("notifications", [
					"subject" => $subject,
					"message" => $message,
					"recipient" => $themails[$i],
					"received_on" => date("Y-m-d H:i:s")
				]);
			}

			if(!$save_notification){
				return false;
			}
			else {
				return true;
			}

		}

		//get product total
		public function getCartTotal($cart){

			$total = 0;
			foreach ($cart as $key => $v) {
				$total += $v["product_quantity"] * $v["product_price"];
			}
			return $total;
		}

		//fetch sub categories
		function subCategories($table, $column, $value)
		{

		    $data = array();
		    $crud = new Crud($this->conn);

		    $row = $crud->select($table, " * ", " $column ='$value' ");
		    return $row;
		}

		//fetch price
		function fetchPrice($item_id) {	
			global $connect;
			$crud = new Crud($connect);

			$price_range = $crud->select(
				"product_sizes p", 
				" MAX(p.product_price) as max_price, MIN(p.product_price) as min_price", 
				" p.product_id = '$item_id' "
			);

			if(!empty($price_range)){
				return ["min_price"=> $price_range[0]["min_price"], "max_price"=> $price_range[0]["max_price"]];
			}
			else {
				return false;
			}
		}
		

		public function wordSuffix($word){
			$yourWord= substr($word, -1);
			if(in_array(strtolower($yourWord[0]),array('s', 'e', 'i', 'o', 'u')))
			{
				$suffix="' ";
			}
			else
			{
				$suffix="'s ";
			}
		
			return $word.$suffix;
		}

		// fetch system admin user
		function fetchAdminUsers($usertype)
		{

		    $data = array();
		    $m = new Crud($this->conn);

		    $row = $m->select("users", "GROUP_CONCAT(id separator ', ') as admin_email",
		                    " access_level IN ($usertype) ");
		    return $row[0]["admin_email"];
		}


		// fetch system admin emails
		function fetchAdminEmails()
		{

		    $data = array();
		    $m = new Crud($this->conn);

		    $row = $m->select("system_email",
		                    "GROUP_CONCAT(email separator ', ') as admin_email",
		                    " is_active ='1' ");
		    return $row[0]["admin_email"];
		}

		//make url
		function makeUrl($page_title)
		{
			$url = trim(strtolower($page_title));
			$url = str_replace(" ", "-", $url);
			$url = preg_replace('/&/', 'and', $url);
			$url = preg_replace('/[^a-zA-Z0-9_-]/', '', $url);
			return $url;
		}

		public function sanitize($input)
		{
		    $t = preg_replace('#[^a-zA-Z0-9-_]#i', '', $input);
		    return str_replace("'", "", $t);
		}

		public function safeDisplay($input)
		{
		    return htmlspecialchars($input, ENT_QUOTES, "UTF-8");
		}

		public function safeInput($input)
		{
		    return htmlspecialchars($input, ENT_QUOTES, "UTF-8");
		}

		public function safeOutput($input)
		{
		    return htmlspecialchars_decode($input, ENT_NOQUOTES);
		}

		public function stripHtml($input)
		{
		    return strip_tags($input);
		}

		public function formatSizeUnits($bytes)
	    {
	        if ($bytes >= 1073741824)
	        {
	            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
	        }
	        elseif ($bytes >= 1048576)
	        {
	            $bytes = number_format($bytes / 1048576, 2) . ' MB';
	        }
	        elseif ($bytes >= 1024)
	        {
	            $bytes = number_format($bytes / 1024, 2) . ' KB';
	        }
	        elseif ($bytes > 1)
	        {
	            $bytes = $bytes . ' bytes';
	        }
	        elseif ($bytes == 1)
	        {
	            $bytes = $bytes . ' byte';
	        }
	        else
	        {
	            $bytes = '0 bytes';
	        }

	        return $bytes;
		}

		public function number_shorten($number)
		{
			$abbrevs = [12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => ''];
		
			foreach ($abbrevs as $exponent => $abbrev) {
				if (abs($number) >= pow(10, $exponent)) {
					$display = $number / pow(10, $exponent);
					$decimals = ($exponent >= 3 && round($display) < 100) ? 1 : 0;
					$number = number_format($display, $decimals).$abbrev;
					break;
				}
			}
		
			return $number;
		}


		public function generate_image_thumbnail($source_image_path, $thumbnail_image_path, $thumbnail_width=150, $thumbnail_height=150)
		{
			list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
			switch ($source_image_type) {
				case IMAGETYPE_GIF:
					$source_gd_image = imagecreatefromgif($source_image_path);
					break;
				case IMAGETYPE_JPEG:
					$source_gd_image = imagecreatefromjpeg($source_image_path);
					break;
				case IMAGETYPE_PNG:
					$source_gd_image = imagecreatefrompng($source_image_path);
					break;
			}
			if ($source_gd_image === false) {
				return false;
			}
			$source_aspect_ratio = $source_image_width / $source_image_height;
			$thumbnail_aspect_ratio = $thumbnail_width / $thumbnail_height;
			if ($source_image_width <= $thumbnail_width && $source_image_height <= $thumbnail_height) {
				$thumbnail_image_width = $source_image_width;
				$thumbnail_image_height = $source_image_height;
			} elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
				$thumbnail_image_width = (int) ($thumbnail_height * $source_aspect_ratio);
				$thumbnail_image_height = $thumbnail_height;
			} else {
				$thumbnail_image_width = $thumbnail_width;
				$thumbnail_image_height = (int) ($thumbnail_width / $source_aspect_ratio);
			}
			$thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
			imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
		
			$img_disp = imagecreatetruecolor($thumbnail_width,$thumbnail_width);
			$backcolor = imagecolorallocate($img_disp,255,255,255);
			imagefill($img_disp,0,0,$backcolor);
		
				imagecopy($img_disp, $thumbnail_gd_image, (imagesx($img_disp)/2)-(imagesx($thumbnail_gd_image)/2), (imagesy($img_disp)/2)-(imagesy($thumbnail_gd_image)/2), 0, 0, imagesx($thumbnail_gd_image), imagesy($thumbnail_gd_image));
		
			imagejpeg($img_disp, $thumbnail_image_path, 90);
			imagedestroy($source_gd_image);
			imagedestroy($thumbnail_gd_image);
			imagedestroy($img_disp);
			return true;
		}


}



?>