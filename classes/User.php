<?php 

class User
{
	   	private $conn;
	 
	   	public function __construct($connectionObject)
			{
				$this->conn = $connectionObject;
			}
	 


		public function signUp($table, $password_column, $password, $usernamecolumn, $username, $othervalues = array())
		{
			try
			{
					$crud  = new Crud($this->conn);
					$result = $crud->select($table, " * ", " '$usernamecolumn' = '$username' ");
					
					if($result)
					{
						return false; 
					}
					else
					{
						$new_password = password_hash($password, PASSWORD_DEFAULT);
						
						foreach ($othervalues as $key => $val) {
							$rowsa[] = $key;
							$preps[] = ":".$key;
						}

						//add password values
						$rowsa[] = $password_column;
						$preps[] = ":".$password_column;

						$rowsa[] = $usernamecolumn;
						$preps[] = ":".$usernamecolumn;

						$sql = "INSERT INTO $table "; 
						$rows = implode(",", $rowsa);
						$value = implode(",", $preps);
						$sql .= " (" . $rows . ")";
						$sql .= " VALUES (" . $value . ")";

					


						$q = $this->conn->prepare($sql);

						foreach ($othervalues as $key => &$val) {
							$q->bindParam(":".$key, $val) ;
						}
						$q->bindParam(":".$password_column, $new_password) ;           
						$q->bindParam(":".$usernamecolumn, $username) ;  
						$q->execute(); 
				
							// return true;
							return $this->conn->lastInsertId(); 
					}

				
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}    
		}





	 
	    public function logIn($username,$password)
	    {
	       try
	       {

	          $q = $this->conn->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
	          $q->execute(array(':username'=>$username));
	          $userRow=$q->fetch(PDO::FETCH_ASSOC);
	          if($q->rowCount() > 0)
	          {
	             if(password_verify($password, $userRow['password']))
	             {
	                $data[] =  $userRow;

	                return $data;
	             }
	             else
	             {
	                return false;
	             }
	          }
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   	}



	   	public function logIn2($email,$password,$table)
	    {
	       try
	       {

	          $q = $this->conn->prepare("SELECT * FROM $table WHERE email=:email LIMIT 1");
	          $q->execute(array(':email'=>$email));
	          $userRow=$q->fetch(PDO::FETCH_ASSOC);
	          if($q->rowCount() > 0)
	          {
	             if(password_verify($password, $userRow['password']))
	             {
	                $data[] =  $userRow;

	                return $data;
	             }
	             else
	             {
	                return false;
	             }
	          }
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   	}

	   	public function ResendActivation($email)
	    {
	       try
	       {
				$activationcode = $this->ActivationCode(30);
				$q = $this->conn->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
				$q->execute(array(':email'=>$email));
				$userRow=$q->fetch(PDO::FETCH_ASSOC);
				if($q->rowCount() > 0)
				{
					$q = $this->conn->prepare("UPDATE users SET activation_code=:activation_code 
						WHERE email=:email");
					$q->execute(array(':activation_code'=>$activationcode, 
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



	    public function ActivateUser($email, $userconfirm)
	    {
	       try
	       {
	       	  $activationcode = $this->ActivationCode(30);
	          $q = $this->conn->prepare("SELECT * FROM users WHERE email =:email && activation_code=:userconfirm  LIMIT 1");
	          $q->execute(array(':email'=>$email,':userconfirm'=>$userconfirm));
	          $userRow=$q->fetch(PDO::FETCH_ASSOC);
	          if($q->rowCount() > 0)
	          {

	          	 $q = $this->conn->prepare("UPDATE users SET active_status = '2', activated_on=:activatedon, 
	          	 	ip_address =:ipaddress WHERE email=:email");
	          	 $q->execute(array(':activated_on'=>date("Y-m-d G:i:s"),
	          	 					':email'=>$email,
	          	 					':ip_address'=>$_SERVER["REMOTE_ADDR"]));
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


	   	public function ActivationCode($len)
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


	 
	   	public function isLoggedin()
	   	{
	      if(isset($_SESSION['duid']))
	      {
	         return true;
	      }
	   	}

	 
	   	public function redirect($url)
	   	{
	       header("Location: $url");
	   	}

	 
		public function logout()
		{
				session_destroy();
				unset($_SESSION['duid']);
				return true;
		}
}

?>