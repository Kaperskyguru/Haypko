    <?php

    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;
    // require_once 'vendor/autoload.php';
    //require_once 'Mail.php';

    function mailer($data)
    {
        $msg = '

    <!Doctype html>
    <head>
      <title>New Message from Haykpo.com</title>
    </head>

    <body>

    <div>

    <div>

      <h4> Your login details are listed below. Please login and change your password!</h4>

    </div>

    <div>
        <h5>'. $data['username'] .'</h5>
        <h5>'. $data['password'] .'</h5>
    </div>

    </div>
    </body>';

        $title = "ACCOUNT DETAILS";
        if (pretty_mail($data['email'], $title, $msg, 'null')) {

            return true;
        }

        return false;
    }

    function pretty_mail($to, $title, $msg, $typeof)
    {
        //header parameters
        $headers = "MIME-VERSION:1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . "Haykpo.com" . "\r\n";
        $headers .= "Cc: info@haykpo.com";

        //Regular variables
        $txt = "";
        if (isset($to) and isset($msg)) {
            $txt .= $msg . '<br />';
        }

        //send the Goddamn mail bitch! something is wrong here
        mail($to, $title, $txt, $headers);
    }
