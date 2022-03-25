<?php
// Stripe API configuration
$stripe_keys = get_payment_settings('stripe');

$userName = $user_details['name'];

// Convert product price to cent
$stripeAmount = round($amount_to_pay*100, 2);

$values = json_decode($stripe_keys);
$currency = $values[0]->currency;

if ($values[0]->testmode == 'on') {
    define('STRIPE_API_KEY', $values[0]->secret_key);
    define('STRIPE_PUBLISHABLE_KEY', $values[0]->public_key);
} else {
    define('STRIPE_API_KEY', $values[0]->secret_live_key);
    define('STRIPE_PUBLISHABLE_KEY', $values[0]->public_live_key);
}

define('STRIPE_SUCCESS_URL', site_url('checkout/stripe_payment'));
define('STRIPE_CANCEL_URL', site_url('checkout'));

// Include Stripe PHP library
require_once APPPATH.'libraries/Stripe/init.php';

// Set API key
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

$response = array(
    'status' => 0,
    'error' => array(
        'message' => 'Invalid Request!'
    )
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = file_get_contents('php://input');
    $request = json_decode($input);
}

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode($response);
    exit;
}

if(!empty($request->checkoutSession)){
    // Create new Checkout Session for the order

     //delivery info 
    $info = sanitize($request->info) ? sanitize($request->info) : '';
    if (!empty($info)) {
        $this->session->set_userdata('delivery_info', $info);
    }

    try {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'product_data' => [
                        'name' => site_phrase("pay_for_your_order")
                    ],
                    'unit_amount' => $stripeAmount,
                    'currency' => $currency,
                ],
                'quantity' => 1
            ]],
            'mode' => 'payment',
            'success_url' => STRIPE_SUCCESS_URL.'/{CHECKOUT_SESSION_ID}',
            'cancel_url' => STRIPE_CANCEL_URL,
        ]);
    }catch(Exception $e) {
        $api_error = $e->getMessage();
    }

    if(empty($api_error) && $session){
        $response = array(
            'status' => 1,
            'message' => 'Checkout Session created successfully!',
            'sessionId' => $session['id']
        );
    }else{
        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'Checkout Session creation failed! '.$api_error
            )
        );
    }
}

// Return response
echo json_encode($response);
