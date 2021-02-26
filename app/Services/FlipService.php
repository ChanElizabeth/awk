<?php

namespace App\Services;

class FlipService
{
    public function get ($url)
    {
        $ch = curl_init();
        $secret_key = env('FLIP_API_SECRET_KEY');
        $url = env('FLIP_ENVIRONMENT'). $url;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded"
        ));
        curl_setopt($ch, CURLOPT_USERPWD, $secret_key.":");
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function post ($url, $data)
    {
        $ch = curl_init();
        $secret_key = env('FLIP_API_SECRET_KEY');
        $url = env('FLIP_ENVIRONMENT'). $url;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded"
        ));

        curl_setopt($ch, CURLOPT_USERPWD, $secret_key.":");

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function indempotent($url, $request)
    {
        $ch = curl_init();
        $secret_key = env('FLIP_API_SECRET_KEY');
        $url = env('FLIP_ENVIRONMENT'). $url;

        $data = [
            "account_number" => $request->account_number,
            "bank_code" => $request->bank_code,
            "amount" => $request->amount,
            "remark" => $request->remark,
            "recipient_city" => $request->recipient_city
        ];

        // $data_str = json_encode($data);
        // $str = env('FLIP_PRIVATE_KEY');
        // $str = chunk_split($str, 64, "\n");
        // $key = "-----BEGIN RSA PRIVATE KEY-----\n$str-----END RSA PRIVATE KEY-----\n";
        // $signature = '';
        // if (openssl_sign($data_str, $signature, $key, 'sha256WithRSAEncryption')) {
        //     echo base64_encode($signature);
        // }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded",
            "idempotency-key: ".$request->idempotency_key."",
            // "X-Signature: ".$signature
        ));

        curl_setopt($ch, CURLOPT_USERPWD, $secret_key.":");

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function callback ($request)
    {
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $token = isset($_POST['token']) ? $_POST['token'] : null;
        if($token === 'the_token_you_get_from_big_flip_dashboard'){
            $decoded_data = json_decode($data, true);
            return $decoded_data;
        }
    }
}
