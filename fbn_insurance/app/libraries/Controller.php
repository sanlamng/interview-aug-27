<?php


require_once 'php-jwt/src/BeforeValidException.php';
require_once 'php-jwt/src/ExpiredException.php';
require_once 'php-jwt/src/SignatureInvalidException.php';
require_once 'php-jwt/src/JWT.php';
require_once 'php-jwt/src/Key.php';
require_once 'php-jwt/src/JWK.php';

//Load the model and the view
class Controller
{

    // REGULAR EXPRESSION
    // EMAIL
    public $regexp_email = '/^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$/i';
    // PHONE, MOBILE
    public $regexp_phone = '/^([1-9]{1,3})([7-9][0-9]{9}|[1-9]{1,2}[0-9]{7})$/i'; //"/^[0-9]{1,3}[0-9]{7,10}
    // PASSWORD
    public $regexp_password = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,20}$/'; //(?=.*?[#?!@$%^&*-.])
    // USERNAME
    public $regexp_username = '/^((?![_.])(?!.*[_.]{2})(?![_.])[_A-Za-z0-9\.\-]*([_A-Za-z0-9\.\-])){4,40}$/i';
    // ILLEGAL CHARACTERS
    public $regexp_illegal = '/[\'\"\&\<\>\\r\\n\\t\\v]/';

    /**
     * @param $method_array
     * Check if the request method is valid with respect to the defined functions
     */
    public function methods_check($method_array)
    {

        $url = rtrim($_GET['url'], '/');
        $method = $_SERVER['REQUEST_METHOD'];
        $function = explode('/', $url)[1];
        $data = '';
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'OPTIONS') {

            // need preflight here

            header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

            header('Access-Control-Max-Age: 86400');
            header('Cache-Control: public, max-age=86400');
            header('Vary: origin');

            // just exit and CORS request will be okay

            // NOTE: We are exiting only when the OPTIONS preflight request is made

            // because the pre-flight only checks for response header and HTTP status code.
            exit(0);

        }
        if (array_key_exists($method, $method_array)) {
            if (!in_array($function, $method_array[$method])) {

                http_response_code(404);
                $data = [
                    'status' => false,
                    'message' => 'Route relative to the Method is Not Found '
                ];
            }
        } else {

            http_response_code(405);
            $data = [
                'status' => false,
                'message' => 'Method Not Allowed'
            ];
        }
        if (!empty($data)) {
            $this->send_response($data);
            exit;
        }

    }

    /**
     * @param array $data
     */
    public function send_response(array $data)
    {
        echo json_encode($data);
        exit;
    }

    /**
     * @param $sec_key
     * @param $id
     * @param $email
     * @param $first_name
     * @param $last_name
     * @return string
     */

    public function encode($sec_key, $id, $email, $first_name, $last_name)
    {
        $issuer_claim = SITENAME; // this can be the servername
        $audience_claim = SITE_URL;
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim; //not before in seconds
        $expire_claim = $issuedat_claim + 120; // expire time in seconds
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => $id,
                "email" => $email,
                "first_name" => $first_name,
                "last_name" => $last_name
            ));
        return JWT::encode($token, $sec_key, 'HS256');
    }

    /**
     * @param $sec_key
     * @return stdClass|string
     */
//    public function decode($sec_key)
//    {
//        $headers = apache_request_headers();
//
//        if (isset($headers['Authorization'])) {
//            $jwt =   substr($headers['Authorization'], 7);
//
//        }
//        else{
//            return 'Token is missing';
//        }
//
//        $token_decoded = '';
//        $algo = new Key($sec_key, 'HS256');
//
//        if ($jwt) {
//            try {
//                $token_decoded = JWT::decode($jwt, $algo);
//                return $token_decoded;
//            } catch (Exception $e) {
//                return $e->getMessage();
//            }
//        }
//        else{
//            return false;
//        }
//
//    }

public function decode($sec_key){
    $headers = apache_request_headers();

    if (isset($headers['Authorization'])) {
        $jwt =   substr($headers['Authorization'], 7);

    }
    else{
        return false;
    }

    if ($jwt) {
            try {
                $sign = json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $jwt)[0]))));

                if ($sign->typ !== 'JWT' && $sign->alg !== 'HS256' ) {
                    return false;
                } else {
                    $token_decoded = json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $jwt)[1]))));
                    return $token_decoded;
                }
            }
            catch
                (Exception $e) {
                    return false;
                }

        }
        else{
            return false;
        }

}
    /**
     * @param array $method_args
     * @param array $input_args
     */
    public function validateInput(array $method_args, array $input_args)
    {
        if (empty($input_args)) {
            echo json_encode(array('status' => false, 'message' => 'No data provided'));
            exit;
        } else {
//               compare the arrays
            $diff_array = array_diff($method_args, $input_args);
            if (!empty($diff_array)) {
                $diff = implode(' | ', $diff_array);
                $response = array(
                    'status' => false,
                    'message' => "Missing params : $diff ");
                http_response_code(400);
                $this->send_response($response);

                exit;
            }
        }
    }

    //    validate the input for the method


//    public function generate_unique_pension($type)
//    {
//        if ($type == 'EMP') {
//            //                read the last unique serial number of the table
//            $last_id = $this->model('Employer')->read_id();
//            return $this->last_num($last_id, $type);
//
//        } else {
//            $last_id = $this->model('Employee')->read_id();
//            return $this->last_num($last_id, $type);
//        }
//
//    }


    public function model($model)
    {
        //Require model file
        require_once '../app/models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }


    public function sendMail($mail_payload)
    {
        $email = (new Mail())->sendMail($mail_payload);
        return $email['status'] ? true : $email['message'];
    }

//    public function last_num($last_id, $type)
//    {
//        if (empty($last_id)) {
//            $unique = $type . '0000000000000';
////                   var_dump('Empty');
//        } else {
//            $last = $last_id[0]->id;
//            $len = strlen($last);
//            $rem_zeros = 12 - $len;
//            $s = '';
//            for ($i = 0; $i < $rem_zeros; $i++) {
//                $s .= '0';
//            }
//            $unique = $type . $s . $last;
//        }
//
//        return $unique;
//    }


    public function get_bearer_token()
    {

        $headers = apache_request_headers();

        if (isset($headers['Authorization'])) {
            return substr($headers['Authorization'], 7);

        }

        return false;
    }

    public function getOS()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform = "";
        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }
        return $os_platform;
    }


    public function getBrowser()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $browser = "";
        $browser_array = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }
        return $browser;
    }

}
