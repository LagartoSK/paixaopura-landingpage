<?php

   require_once ('vendor/autoload.php');

    MercadoPago\SDK::setAccessToken("TEST-1902276775186214-111319-69b14cedace086c242d687573b1e70da-440215777");

    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = (float)$_POST['transactionAmount'];
    $payment->token = $_POST['token'];
    $payment->description = "Teste item card";
    $payment->installments = (int)$_POST['installments'];
    $payment->payment_method_id = $_POST['paymentMethodId'];
    $payment->issuer_id = (int)$_POST['issuer'];

    $payer = new MercadoPago\Payer();
    $payer->email = $_POST['email'];
    $payer->identification = array(
        "type" => $_POST['docType'],
        "number" => $_POST['docNumber']
    );
    $payment->payer = $payer;

    $payment->save();

    $response = array(
        'status' => $payment->status,
        'status_detail' => $payment->status_detail,
        'id' => $payment->id
    );
    echo json_encode($response);

?>



<?php

// require __DIR__  . 'vendor/autoload.php';


//     //REPLACE WITH YOUR ACCESS TOKEN AVAILABLE IN: https://developers.mercadopago.com/panel/credentials
//     MercadoPago\SDK::setAccessToken("TEST-1902276775186214-111319-69b14cedace086c242d687573b1e70da-440215777");

// $path = $_SERVER['REQUEST_URI'];

// switch($path){
//     case '':
//     case '/':
//         require __DIR__ . 'index.html';
//         break;
//     case '/process_payment':

//         $payment = new MercadoPago\Payment();
//         $payment->transaction_amount = (float)$_POST['transactionAmount'];
//         $payment->token = $_POST['token'];
//         $payment->description = $_POST['description'];
//         $payment->installments = (int)$_POST['installments'];
//         $payment->payment_method_id = $_POST['paymentMethodId'];
//         $payment->issuer_id = (int)$_POST['issuer'];

//         $payer = new MercadoPago\Payer();
//         $payer->email = $_POST['email'];
//         $payer->identification = array( 
//             "type" => $_POST['docType'],
//             "number" => $_POST['docNumber']
//         );
//         $payment->payer = $payer;

//         $payment->save(); 

//         $response = array(
//             'status' => $payment->status,
//             'status_detail' => $payment->status_detail,
//             'id' => $payment->id
//         );
//         echo json_encode($response);
//         break; 
        
//     //Serve static resources
//     default:
//         $file = __DIR__ . '' . $path;
//         $extension = end(explode('.', $path));
//         $content = 'text/html';
//         switch($extension){
//             case 'js': $content = 'application/javascript'; break;
//             case 'css': $content = 'text/css'; break;
//             case 'png': $content = 'image/png'; break;
//         }
//         header('Content-Type: '.$content);
//         readfile($file);
//         break;
// }

?>