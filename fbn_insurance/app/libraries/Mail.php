<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mail
{

    /**
     * @param $param {contact, email, email_cc, subject, body}
     * @return array
     */


    function sendMail($param)
    {

//        $return = '';
        $param = json_decode($param);

//        var_dump($param); exit;

        $email = new stdClass();

        foreach ($param as $key => $val)
            $email->{$key} = $val;
//        return array('status' => false, 'message' => http_response_code(200), 'data' => (array)$param);

        $regexp_email = '/^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$/i';

        if (!empty($email->to) && preg_match($regexp_email, $email->to))
            $email->to = $email->full_name . ' <' . $email->to . '>';
        if (!empty($email->cc) && preg_match($regexp_email, $email->cc))
            $email->cc = $email->full_name . ' <' . $email->cc . '>';
//        if (!empty($email->variables))
//            $email->variables =
//
        $email->post = json_encode(
            array(
                'from' => $email->from,
                'to' => $email->to,
                'subject' => $email->subject,
                'cc' => $email->cc,
                'template' => $email->template,
                'X-Mailgun-Variables' => $email->variables
            )
        );

        //return array('status' => false, 'message' => http_response_code(200), 'data' => (array) $email->post);

        $mg_api = '921c57599f97553833660f15f56a34b0-02fa25a3-f26c9486'; //YOUR API KEY
        $mg_version = 'api.mailgun.net/v3/'; //ROOT URL FOR MAILGUN
        $mg_domain = "myisusu.com"; //YOUR DOMAIN AS SPECIFIED IN THE CONTROL PANEL
//        $mg_from_email = "noreply@myisusu.com"; // YOUR FROM EMAIL
        $mg_reply_to_email = "support@myisusu.com"; // YOUR REPLY-TO EMAIL (USUALLY MATCHES FROM EMAIL)

        $mg_message_url = "https://" . $mg_version . $mg_domain . "/messages";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $mg_api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $mg_message_url);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            array('from' => 'My Isusu  <' . $email->from . '>',
                'to' => $email->to,
                'h:Reply-To' => ' <' . $mg_reply_to_email . '>',
                'subject' => $email->subject,
                'template' => $email->template,
                'h:X-Mailgun-Variables' => $email->variables
            ));
        $result = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($result, TRUE);

        if ($res['message'] == 'Queued. Thank you.') {
            return array('status' => true, 'message' => 'Mail sent successfully');
        } else {
            return array('status' => false, 'message' => $res['message']);
        }

    }

}
