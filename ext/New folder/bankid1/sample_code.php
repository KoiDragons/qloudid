<?php

if(isset($_REQUEST['personal'])){
    #loading bankid php library
    require_once './vendor/autoload.php';
    $bankIDService = new Nangia\BankID\Service\BankIDService(
        'https://appapi2.test.bankid.com/rp/v5/', #NEW END POINT
        #'188.99.180.242',
        $_SERVER['REMOTE_ADDR'], # Change this with your user's IP
        [
            'verify' => false,
            'cert'   => './mycertname.pem', #Change certificate to yours
        ]
    );

    # enter personal number and message for the user
    $response = $bankIDService->getSignResponse($_REQUEST['personal'], 'Hi, Sushil Jain is testing the app. Please verify');
    # let the user open app and accept
    while(1){
    $collectResponse = $bankIDService->collectResponse($response->orderRef);

    if($collectResponse->status === Nangia\BankID\Model\CollectResponse::STATUS_COMPLETED) {
    	echo 'Thanks for verifying';
        break;
    }	
    # status is not pending, then dont wait and exit the loop
    elseif($collectResponse->status!== Nangia\BankID\Model\CollectResponse::STATUS_PENDING){
    	echo 'User cancelled the request or some other error occurred';
    	break;
    }
    # status pending, wait for 3 seconds
    else{
    	sleep(3);	
    }

    }
}else{ ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Verify personal number</title>
        <script type="text/javascript">
            function sbmitform(){
                document.getElementById("message").innerHTML = 'Please open the BankID app on your phone';
                document.getElementById("bankid").submit();

            }
        </script>
    </head>
    <body>
        <form method="post" name="bankid" id="bankid">
            <input type="text" name="personal" value="198801251946">
            <input type="button" name="sbmitbtn" value="Verify" onclick="sbmitform()">
        </form><br/>
        <div id="message">
            
        </div>
    </body>
    </html>

<?php } ?>

