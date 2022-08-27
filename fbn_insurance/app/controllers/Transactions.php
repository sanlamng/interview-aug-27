<?php


class Transactions extends Controller
{
    protected $post;

    private $method_array = array(
//        endpoints with the method allowed
        'POST' => array('create', 'getAllTransactions', 'getTransactionByReference', 'getSumAndCount'),
    );
    private $transModel;

    /**
     * Transaction constructor.
     */
    public function __construct()
    {
        $this->transModel = $this->model('Transaction');
        $this->methods_check($this->method_array);
        // get the raw POST data
        $this->post = json_decode(file_get_contents("php://input"), true);

//        if ($method !== 'GET'){
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
            if ($this->post->api_key !== MOBILE && $this->post->api_key !== WEB && $this->post->api_key !== MOBILE_IOS) {
                $response = array('status' => false, 'message' => 'Unauthorised. Access denied!!!');
                http_response_code(401);
                $this->send_response($response);
            }
//        }



//        var_dump($this->post->api_key !== MOBILE ||  $this->post->api_key !== WEB ||  $this->post->api_key !== MOBILE_IOS); exit;


    }


//    new employer creation endpoint
    public function create()
    {

        if (!$this->decode($this->post->api_key)) {
            $response = array('status' => false, 'message' => 'Access Denied');
            http_response_code(400);
            $this->send_response($response);
        } else {

//            get the user id from the token
            $this->post->customer_id = $this->decode($this->post->api_key)->data->id;
//            get the user email from the token
            $this->post->customer_email = $this->decode($this->post->api_key)->data->email;
//         var_dump($this->post); exit;

            if (empty($this->post->customer_id)){
                $response = array('status' => false, 'message' => 'Customer access denied');
                http_response_code(400);
                $this->send_response($response);
            }
        $trans_array = array('amount', 'payment_date', 'product_id', 'transaction_reference');
        $this->validateInput($trans_array, array_keys(get_object_vars($this->post)));
        //        validate each input

        if (empty($this->post->amount)) {
            $response = array('status' => false, 'message' => 'AMOUNT IS REQUIRED');
            http_response_code(400);
            $this->send_response($response);
        }
        if (empty($this->post->payment_date)) {
            $response = array('status' => false, 'message' => 'PAYMENT DATE IS REQUIRED');
            http_response_code(400);
            $this->send_response($response);
        }
        if (empty($this->post->customer_id)) {
            $response = array('status' => false, 'message' => 'User not authenticated');
            http_response_code(400);
            $this->send_response($response);
        }
        if (empty($this->post->product_id)) {
            $response = array('status' => false, 'message' => 'Product details is required');
            http_response_code(400);
            $this->send_response($response);
        }

        $this->post->submited_at = date('Y-m-d h:i:s');

        $this->post->source = constant($this->post->api_key);
            $post = [
                'amount' => $this->post->amount,
                'payment_date' => $this->post->payment_date,
                'customer_id' => $this->post->customer_id,
                'product_id' => (int) $this->post->product_id,
                'transaction_reference' => $this->post->transaction_reference,
                'source' => $this->post->source,
                'submitted_at' => date('Y-m-d h:i:s')
        ];

        $check_duplicate = $this->transModel->getSingleTransactionByRef($post['transaction_reference']);

        if ($check_duplicate){
            $this->send_response(array(
                'status' => false,
                'message' => 'Transaction already exist',
                'data' => array(
                    'amount' => $this->post->amount,
                    'reference' => $this->post->transaction_reference,

                )
            ));
        }else{
            $new_trans = $this->transModel->newTransaction((object)$post);

            if ($new_trans){

                $this->send_response(array(
                    'status' => true,
                    'message' => 'Transaction Successfully Created',
                    'data' => array(
                        'amount' => $this->post->amount,
                        'reference' => $this->post->transaction_reference,

                    )
                ));
            }else{
                $this->send_response(array(
                    'status' => false,
                    'message' => 'User Not Created'
                ));
            }
        }

        }
    }
    public function getAllTransactions(){
        if (!$this->decode($this->post->api_key)) {
            $response = array('status' => false, 'message' => 'Access Denied');
            http_response_code(400);
            $this->send_response($response);
        } else {
//            get the user id from the token

            $this->post->customer_id = $this->decode($this->post->api_key)->data->id;
            $all_trnx = $this->transModel->getAllTransaction($this->post->customer_id);

            if($all_trnx){
                $this->send_response(array(
                    'status' => true,
                    'message' => 'All transactions',
                    'data' => $all_trnx
                ));
            }
            else{
                $this->send_response(array(
                    'status' => false,
                    'message' => 'No transaction yet'
                ));
            }
        }
    }
    public function getTransactionByReference(){
        if (!$this->decode($this->post->api_key)) {
            $response = array('status' => false, 'message' => 'Access Denied');
            http_response_code(400);
            $this->send_response($response);
        } else {
//            get the user id from the token
            $this->post->customer_id = $this->decode($this->post->api_key)->data->id;
            $trnx = $this->transModel->getSingleTransactionByRef($this->post->transaction_reference);

            if($trnx){
                $this->send_response(array(
                    'status' => true,
                    'message' => 'Transaction by Reference',
                    'data' => $trnx
                ));
            }
            else{
                $this->send_response(array(
                    'status' => false,
                    'message' => 'Not found'
                ));
            }
        }
    }
    public function getSumAndCount(){
        if (!$this->decode($this->post->api_key)) {
            $response = array('status' => false, 'message' => 'Access Denied');
            http_response_code(400);
            $this->send_response($response);
        } else {
//            get the user id from the token
            $this->post->customer_id = $this->decode($this->post->api_key)->data->id;
            $trnx = $this->transModel->getSumAndCount($this->post->customer_id);

            if($trnx){
                $this->send_response(array(
                    'status' => true,
                    'message' => 'Transaction by Sum and Count',
                    'data' => $trnx
                ));
            }
            else{
                $this->send_response(array(
                    'status' => false,
                    'message' => 'Not found'
                ));
            }
        }
    }

}