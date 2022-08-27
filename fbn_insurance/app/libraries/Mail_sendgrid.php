<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MailSendgrid
{

    /**
     * @param $param {contact, email, email_cc, subject, body}
     * @return array
     */
    function sendMail($param)
    {

        $return = '';

        $param = str_replace('\\', '', rawurldecode($param));
        $param = json_decode($param);

        $email = new stdClass();

        foreach ($param as $key => $val)
            $email->{$key} = addslashes($val);
        //return array('status' => false, 'message' => http_response_code(200), 'data' => (array)$param);

        if (empty($email->contact))
            $email->contact = '<' . $email->email . '>';

        $email->body =
            '<table style="width: 100%; background-color: #efefef;" align="center"><tbody><tr><td align="center" style="padding: 20px;">' .
            '<div style="border: 0px solid; background-color: #ffffff; width: 600px; text-align: left; padding: 20px;">' .

            '</div>' .
            '<div style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; background-color: #ffffff; width: 600px; text-align: left; padding: 20px;">' . $email->body .

            '</td></tr></tbody></table>';

        //$post = json_encode(array('personalizations' => array(array('to' => array(array('email' => 'femi.fapohunda@gmail.com', 'name' => 'Femi Fapohunda')), 'subject' => 'Hello, World!')), 'content' => array(array('type' => 'text/html', 'value' => '<strong>Heya! array -> json</strong>')), 'from' => array('email' => 'mutualcare@mutualng.com', 'name' => 'Mutual Care'), 'reply_to' => array('email' => 'info@mutualng.com', 'name' => 'Mutual Care')));

        $regexp_email = '/^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$/i';
        $email->email_cc = explode(',', $email->email_cc);
        $email->cc = array();

        if (!empty($email->email_cc)) {
            foreach ($email->email_cc as $key => $val) {
                //
                if ($email->email == $val) continue;
                //
                if (preg_match($regexp_email, $val)) {
                    $email->cc[] = array('email' => $val);
                }
            }
        }

        //
        if (empty($email->cc)) { // 1==1
            $email->post = json_encode(array('personalizations' => array(array('to' => array(array('email' => $email->email, 'name' => $email->contact)), 'subject' => $email->subject)), 'content' => array(array('type' => 'text/html', 'value' => html_entity_decode($email->body))), 'from' => array('email' => 'test@rt.com', 'name' => 'Test'), 'reply_to' => array('email' => 'info@test.com', 'name' => 'Test Test')));
        } else {
            $email->post = json_encode(array('personalizations' => array(array('to' => array(array('email' => $email->email, 'name' => $email->contact)), 'cc' => $email->cc, 'subject' => $email->subject)), 'content' => array(array('type' => 'text/html', 'value' => html_entity_decode($email->body))), 'from' => array('email' => 'test@rt.com', 'name' => 'Test'), 'reply_to' => array('email' => 'info@test.com', 'name' => 'Test Test')));
        }
        //return array('status' => false, 'message' => http_response_code(200), 'data' => (array) $email->post);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $email->post,
            CURLOPT_HTTPHEADER => array(
//                "authorization: Bearer SG.IZD7NplqRzacKurfP6cJLw.h5MKlv7wlpB6riqymUzP3nL_xpDhTVKgqo9tB2rCL",
//                "authorization: Bearer 921c57599f97553833660f15f56a34b0-02fa25a3-f26c9486",

                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
            return array('status' => false, 'message' => $err);
        } else {
            return array('status' => true, 'data' => $response);
        }

    }

}
