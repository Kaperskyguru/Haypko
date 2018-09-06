<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
// require_once 'vendor/autoload.php';
//require_once 'Mail.php';

function mailer($data)
{
    $msg = '

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
    <!--[if gte mso 9]><xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <title>Haykpo Email </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <meta name="format-detection" content="telephone=no">
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!--<![endif]-->
    <style type="text/css">
    @font-face{
        font-family:nunito-bold;
        src:url("https://haypko.com/assets/fonts/nunito-bold.woff2");
        font-weight: bold;
    }
    @font-face{
        font-family:nunito-regular;
        src:url("https://haypko.com/assets/fonts/nunito-regular.woff2");
        font-weight: normal;
    }
    body {
        margin: 0 !important;
        padding: 0 !important;
        -webkit-text-size-adjust: 100% !important;
        -ms-text-size-adjust: 100% !important;
        -webkit-font-smoothing: antialiased !important;
    }
    img {
        border: 0 !important;
        outline: none !important;
    }
    p {
        Margin: 0px !important;
        Padding: 0px !important;
    }
    table {
        border-collapse: collapse;
        mso-table-lspace: 0px;
        mso-table-rspace: 0px;
    }
    td, a, span {
        border-collapse: collapse;
        mso-line-height-rule: exactly;
    }
    .ExternalClass * {
        line-height: 100%;
    }
    .em_defaultlink a {
        color: inherit !important;
        text-decoration: none !important;
    }
    span.MsoHyperlink {
        mso-style-priority: 99;
        color: inherit;
    }
    span.MsoHyperlinkFollowed {
        mso-style-priority: 99;
        color: inherit;
    }
     @media only screen and (min-width:481px) and (max-width:699px) {
    .em_main_table {
        width: 100% !important;
    }
    .em_wrapper {
        width: 100% !important;
    }
    .em_hide {
        display: none !important;
    }
    .em_img {
        width: 100% !important;
        height: auto !important;
    }
    .em_h20 {
        height: 20px !important;
    }
    .em_padd {
        padding: 20px 10px !important;
    }
    }
    @media screen and (max-width: 480px) {
    .em_main_table {
        width: 100% !important;
    }
    .em_wrapper {
        width: 100% !important;
    }

    .em_img {
        width: 100% !important;
        height: auto !important;
    }
    .em_h20 {
        height: 20px !important;
    }
    .em_padd {
        padding: 20px 10px !important;
    }
    .em_text1 {
        font-size: 16px !important;
        line-height: 24px !important;
    }
    u + .em_body .em_full_wrap {
        width: 100% !important;
        width: 100vw !important;
    }
    }
    </style>
    </head>

    <body class="em_body" style="margin:0px; padding:0px;" >
        <table class="em_full_wrap" valign="top" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">
            <tbody>
                <tr>
                    <td valign="top" align="center">
                        <table class="em_main_table" style="width:700px;" width="700" cellspacing="0" cellpadding="0" border="0" align="center">
                                    <!--Header section-->
                                    <tbody style="background:url("https://haypko.com/assets/images/email/bg.jpg");">
                                        <tr>
                                            <td style="padding:30px;" class="em_padd" valign="top" bgcolor="#151d27" align="center">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                      <tbody>
                                                            <tr>
                                                                <td style="font-family:"nunito-regular", Arial, sans-serif; font-size:12px; line-height:15px; color:white;" valign="top" align="center">Haykpo |
                                                                    <a href="https://haypko.com/" target="_blank" style="color:white; text-decoration:underline;">Buy fuel Now</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--//Header section-->
                                        <!--Banner section-->
                                        <tr>
                                            <td valign="top" align="center">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" align="center" style="padding:20px;background-color: white" >
                                                                <img class="em_img" alt="Haykpo Logo" style="display:block; font-family:"nunito-regular",Arial,sans-serif; font-size:30px; line-height:34px; color:#000000; max-width:700px;" src="https://haypko.com/assets/images/email/logo.png" width="20%" border="0" >
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <!--//Banner section-->
                                        <!--Content Text Section-->
                                        <tr >
                                              <td style="padding:35px 70px 30px;" class="em_padd" valign="top" bgcolor="transparent" align="center">
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                          <tbody>
                                                                    <tr>
                                                                        <td style="font-family:"nunito-regular",Open Sans, Arial, sans-serif; font-size:1.5rem; line-height:30px; color:#151d27;font-weight: bold" valign="top" align="left">Welcome to Haykpo</td>
                                                                     </tr>
                                                                    <tr>
                                                                        <td style="font-size:0px; line-height:0px; height:15px;" height="15">&nbsp;</td>
                                                                        <!--—this is space of 15px to separate two paragraphs ---->
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-family:"nunito-regular",Open Sans, Arial, sans-serif; font-size:1rem; line-height:1.2rem; color:#666666; padding-bottom:12px;" valign="top" >You\'ve created a new
                                                                            <strong>hayko</strong,> account. Here are your account details:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="em_h20" style="font-size:0px; line-height:0px; height:25px;" height="25">&nbsp;</td>                                                                            </td>
                                                                        <!--—this is space of 25px to separate two paragraphs ---->
                                                                    </tr>

                                                            </tbody>
                                                    </table>
                                                    <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;overflow:hidden;border-radius:3px;border:1px solid #d8d8d8" align="center">
                                                          <tbody >
                                                                    <tr>
                                                                        <td style="font-family:"nunito-regular",Open Sans, Arial, sans-serif; font-size:1rem; line-height:30px; color:#151d27;padding-bottom: 40px;" valign="top" align="left">
                                                                            <div style="border-radius: 5px;padding:25px;font-size:1rem;border:1px solid #f6f6f6;background-color:white;box-shadow: 0px 0px 5px rgba(0,0,0,0.2);">
                                                                            <ul style="list-style-type: none;padding-left: 0px;">
                                                                                <li>Username: <strong>'. $data['username'] .'</strong></li>
                                                                                <li>Password: <strong>'. $data['password'] .'</strong></li>
                                                                            </ul>
                                                                            <span style="font-size: 0.8rem;">Your can now order fuel from the comfort of your home.We\'re happy you\'re here!</span>
                                                                            </div>
                                                                        </td>
                                                                     </tr>
                                                            </tbody>
                                                    </table>
                                                </td>
                                        </tr>

                                        <!--//Content Text Section-->
                                        <!--Footer Section-->
                                        <tr>
                                            <td style="padding:38px 30px;" class="em_padd" valign="top" bgcolor="#f6f7f8" align="center">
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                      <tbody>
                                                            <tr>
                                                                <td style="padding-bottom:16px;" valign="top" align="center">
                                                                    <table cellspacing="0" cellpadding="0" border="0" align="center">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="top" align="center">
                                                                                    <a href="#" target="_blank" style="text-decoration:none;">
                                                                                            <img src="https://haypko.com/assets/images/email/fb.png" alt="facebook" style="display:block; font-family:"nunito-regular",Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;" width="26" border="0" height="26">
                                                                                    </a>
                                                                                </td>
                                                                                <td style="width:6px;" width="6">&nbsp;</td>
                                                                                <td valign="top" align="center">
                                                                                    <a href="#" target="_blank" style="text-decoration:none;">
                                                                                        <img src="https://haypko.com/assets/images/email/tw.png" alt="twitter" style="display:block; font-family:"nunito-regular",Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:27px;" width="27" border="0" height="26">
                                                                                    </a>
                                                                                </td>
                                                                                <td style="width:6px;" width="6">&nbsp;</td>
                                                                                <td valign="top" align="center">
                                                                                    <a href="#" target="_blank" style="text-decoration:none;">
                                                                                        <img src="https://haypko.com/assets/images/email/in.png" alt="instagram" style="display:block; font-family:"nunito-regular",Arial, sans-serif; font-size:14px; line-height:14px; color:#151d27; max-width:26px;" width="26" border="0" height="26">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-family:"nunito-regular",Open Sans, Arial, sans-serif; font-size:11px; line-height:18px; color:#999999;" valign="top" align="center"><a href="https://haypko.com/pages/privacy" target="_blank" style="color:#999999; text-decoration:underline;">PRIVACY STATEMENT</a> | <a href="https://haypko.com/pages/terms" target="_blank" style="color:#999999; text-decoration:underline;">TERMS OF SERVICE</a> | <a href="https://haypko.com/pages/returns" target="_blank" style="color:#999999; text-decoration:underline;">RETURNS</a><br>
                                                              © 2017 Haykpo. All Rights Reserved.<br>
                                                              If you do not wish to receive any further emails from us, please <a href="#" target="_blank" style="text-decoration:none; color:#999999;">unsubscribe</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </td>
                                        </tr>
                                    </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

    </body>
    </html>';

    $title = "ACCOUNT DETAILS";
    if (pretty_mail($data['email'], $title, $msg, 'null')) {

        return true;
    }

    return false;
}

function pretty_mail($to, $title, $msg, $typeof)
{
        // Create the Transport
    $transport = (new Swift_SmtpTransport('YOUR MAIL SERVER', 25))
    ->setUsername('YOUR USERNAME')
    ->setPassword('YOUR PASSWORD');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message($title))
    ->setFrom(['info@haypko.com' => 'Admin'])
    ->setTo([$to, 'info@haypko.com'])
    ->setBody($msg, 'text/html');

    // Send the message
    return $result = $mailer->send($message);
}
