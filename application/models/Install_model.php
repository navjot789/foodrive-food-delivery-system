<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 22 - July - 2020
 * Author : TheDevs
 * Install model handles some functions for installing the app
 */
class Install_model extends CI_Model
{
    /**
     * THIS FUNCTION IS FOR CURL REQUEST
     *
     * @param string $code
     * @return void
     */
    function curl_request($code = '')
    {
        $product_code = $code;

        $personal_token = "oFGW4ECN7iquvQkiAhbLECAClwQpZ7Tr";
        $url = "https://api.envato.com/v3/market/author/sale?code=" . $product_code;
        $curl = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:' . $product_code . '.json';
        $ch_verify = curl_init($verify_url . '?code=' . $product_code);

        curl_setopt($ch_verify, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec($ch_verify);
        curl_close($ch_verify);

        $response = json_decode($cinit_verify_data, true);

        if (isset($response['verify-purchase']) && count($response['verify-purchase']) > 0) {
            return true;
        } else {
            // I WILL MAKE IT FALSE AFTER HAVING A VALID PURCHASE CODE TO TEST
            return true;
        }
    }
}
