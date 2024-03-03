@if(isset($_POST['submit']))
    <?php
        date_default_timezone_set('Africa/Nairobi');
    
        // Access token
        $consumerKey = 'MzbOg0uFAJmVZbR3t3B3yJg1sUwusVl0AGHNoAmM1fQJNYtI'; // Fill with your app Consumer Key
        $consumerSecret = 'IwsaCQvAxTLxEAQ80ydL6eewJESvl1wezMndrYE7Ozc8PxAD8qyJKVK4HzZNC4Kq'; // Fill with your app Secret
    
        // Define the variables
        // Provide the following details, this part is found on your test credentials on the developer account
        $BusinessShortCode = '174379';
        $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  
        
        $PartyA = request()->input('phone'); // This is your phone number
        $AccountReference = '2255';
        $TransactionDesc = 'Test Payment';
        $Amount = request()->input('amount');
        
        // Get the timestamp, format YYYYmmddhms -> 20181004151020
        $Timestamp = date('YmdHis');    
        
        // Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
        $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
    
        // Header for access token
        $headers = ['Content-Type:application/json; charset=utf8'];
    
        // M-PESA endpoint urls
        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    
        // Callback url
        $CallBackURL = 'https://c51e-102-213-241-163.ngrok-free.app/callback_url.php';  
    
        $curl = curl_init($access_token_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;  
        curl_close($curl);
    
        // Header for stk push
        $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
    
        // Initiating the transaction
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); // Setting custom header
    
        $curl_post_data = [
            // Fill in the request parameters with valid values
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $Password,
            'Timestamp' => $Timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $BusinessShortCode,
            'PhoneNumber' => $PartyA,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc
        ];
    
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        print_r($curl_response);
    
        echo $curl_response;
    ?>
@endif
