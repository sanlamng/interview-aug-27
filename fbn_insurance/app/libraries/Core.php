<?php

/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    protected $currentController = '';
    protected $currentMethod = '';
    protected $params = [];

    public function __construct()
    {
//        print_r($this->getUrl());

        $url = $this->getUrl();

        // Look in BLL for first value
        if (isset($url[0])) {

            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                // Unset 0 Index
                unset($url[0]);
                // Require the controller
                require_once '../app/controllers/' . $this->currentController . '.php';

                // Instantiate controller class
                $this->currentController = new $this->currentController;
            } else {
                http_response_code(404);
                echo json_encode([
                    'data' => 'File Not found'
                ]);
                exit;
            }

            // Check for second part of url
            if (isset($url[1])) {
                // Check to see if method exists in controller
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    // Unset 1 index
                    unset($url[1]);
                }
            } else {
                echo json_encode([
                    'data' => 'Route Not found'
                ]);
                exit;
            }

            // Get params
            $this->params = $url ? array_values($url) : [];

            if (is_callable([$this->currentController, $this->currentMethod])) {
                // Call a callback with array of params
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            } else {
                echo json_encode([
                    'data' => 'Not Defined'
                ]);
                exit;
            }
        } else {
            echo json_encode([
                'data' => 'Welcome!!!'
            ]);
            exit;
        }

    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}


