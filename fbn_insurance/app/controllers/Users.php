<?php
/***
 * Class Users
 */

class Users extends Controller
{
    protected $post;

    private $method_array = array(
//        endpoints with the method allowed
        'POST' => array('create', 'login'),
        'GET' => array('getUser'),
    );
    private $userModel;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->methods_check($this->method_array);
        // get the raw POST data
        $this->post = json_decode(file_get_contents("php://input"), true);

        if (is_array($this->post))
            $this->post = (object)filter_var_array($this->post);
        else {
            http_response_code(400);
            echo json_encode(array('status' => false, 'message' => 'Malformed JSON format'));
            exit;
        }

        if ($this->post->api_key === '' || empty($this->post->api_key)) {
            $response = array('status' => false, 'message' => 'API KEY can not be empty');
            http_response_code(401);
            $this->send_response($response);
        }

//        var_dump($this->post->api_key !== MOBILE ||  $this->post->api_key !== WEB ||  $this->post->api_key !== MOBILE_IOS); exit;

        if ($this->post->api_key !== MOBILE && $this->post->api_key !== WEB && $this->post->api_key !== MOBILE_IOS) {
            $response = array('status' => false, 'message' => 'Unauthorised. Access denied!!!');
            http_response_code(401);
            $this->send_response($response);
        }
    }

//    new employer creation endpoint
    public function create()
    {
        $user_array = array('last_name', 'first_name', 'date_of_birth', 'mobile_phone', 'email', 'password');
        $this->validateInput($user_array, array_keys(get_object_vars($this->post)));
        //        validate each input
//
        $this->post->{'mobile'} = preg_replace($this->regexp_illegal, '', trim($this->post->mobile));

        $this->post->{'email'} = preg_replace($this->regexp_illegal, '', trim($this->post->email));

        if (!preg_match($this->regexp_email, $this->post->email)) {
            $response = array('status' => false, 'message' => 'EMAIL INVALID');
            http_response_code(400);
            $this->send_response($response);
        }
//
//        }
        if (empty($this->post->last_name)) {
            $response = array('status' => false, 'message' => 'LAST NAME IS REQUIRED');
            http_response_code(400);
            $this->send_response($response);
        }
        if (empty($this->post->mobile_phone)) {
            $response = array('status' => false, 'message' => 'MOBILE PHONE NUMBER IS REQUIRED');
            http_response_code(400);
            $this->send_response($response);
        }
        if (empty($this->post->first_name)) {
            $response = array('status' => false, 'message' => 'FIRST NAME IS REQUIRED');
            http_response_code(400);
            $this->send_response($response);
        }
        if (empty($this->post->password)) {
            $response = array('status' => false, 'message' => 'PASSWORD IS REQUIRED');
            http_response_code(400);
            $this->send_response($response);
        }

        $this->post->password = password_hash($this->post->password, PASSWORD_BCRYPT);
        $this->post->created_at = date('Y-m-d h:i:s');

        //confirm if user already exist::::

        if (!$this->userModel->getUser($this->post->email)) {
            $new_user = $this->userModel->newUser($this->post);

            if ($new_user) {

                $this->send_response(array(
                    'status' => true,
                    'message' => 'User Created',
                    'data' => array(
                        'first_name' => $this->post->first_name,
                        'last_name' => $this->post->last_name,
                        'email' => $this->post->email,
                        'mobile' => $this->post->mobile_phone
                    )
                ));
            }else{
                $this->send_response(array(
                    'status' => false,
                    'message' => 'User Not Created'
                ));
            }
        } else {
            http_response_code(200);
            $this->send_response(array('status' => false, 'message' => 'User is already existing'));
        }
    }

//    customers login endpoint
    public function login()
    {
        $user_login_array = array('username', 'password');
        $this->validateInput($user_login_array, array_keys(get_object_vars($this->post)));

        if(empty($this->post->username) && empty($this->post->password)){
            $this->send_response(array(
                'status' => false,
                'message' => 'Empty Credentials'
            ));
        }
        if(empty($this->post->password)){
            $this->send_response(array(
                'status' => false,
                'message' => 'Empty Password'
            ));
        }
        if(empty($this->post->username)){
            $this->send_response(array(
                'status' => false,
                'message' => 'Empty Password'
            ));
        }
        $user = $this->userModel->getUser($this->post->username);
        if (!$user) {
            http_response_code(200);
            $this->send_response(array(
                'status' => false,
                'message' => 'User does not exist'
            ));
        }

        if (password_verify($this->post->password, $user->password)) {
            $token = $this->encode(base64_encode($this->post->api_key), $user->id, $user->email, $user->first_name, $user->last_name );
            $this->send_response(array(
                'status' => true,
                'message' => 'User logged in',
                'data' => array(
                    'token' => $token
                )
            ));
        }else{
            $this->send_response(array(
                'status' => false,
                'message' => 'Password or Username Invalid'
            ));
        }

    }


}