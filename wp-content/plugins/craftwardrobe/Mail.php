<?php
/**
 * Plugin Name: Craft Wardrobe
 * Version: 1.0.0
 * Description: Provides SMTP API for Sending mails
 */

session_start();
// include('smtp/PHPMailerAutoload.php');
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";

$senderMail = "";
$senderPassword = "";
$reciverMail = "";
$mailHost = "";
$mailPort = "";


function getConfig()
{
    $smtp_list = new WP_Query(
        array(
            'post_type' => 'smtp_details',
            'post_status' => 'publish'
        )
    );
    if ($smtp_list->have_posts()) {
        while ($smtp_list->have_posts()) {
            $post = $smtp_list->the_post();
            // the_field('description')
            $custom = get_post_custom($post->ID);

            return array(
                "senderMail" => isset($custom['sender_mail']) ? $custom['sender_mail'][0] : "",
                "senderPassword" => isset($custom['sender_password']) ? $custom['sender_password'][0] : "",
                "reciverMail" => isset($custom['receiver_mail']) ? $custom['receiver_mail'][0] : "",
                "mailHost" => isset($custom['host']) ? $custom['host'][0] : "",
                "mailPort" => isset($custom['port']) ? $custom['port'][0] : ""
            );
        }
    }
}

function sendmail_api_init()
{
    register_rest_route(
        'craftwardrobe/v1',
        '/sendmail/',
        array(
            'methods' => 'POST',
            'callback' => 'sendmail_callback',
            'permission_callback' => '__return_true'
        )
    );
}

function is_local_request()
{
    return session_status() === PHP_SESSION_ACTIVE?$_SESSION['craftwardrobe']:false;
}

function sendmail_callback()
{
    if (is_local_request()) {
        $config = getConfig();
        $senderMail = $config['senderMail'];
        $senderPassword = $config['senderPassword'];
        $reciverMail = $config['reciverMail'];
        $message = $_POST['message'];
        $subject = $_POST['subject'];

        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = $config['mailHost'];
        $mail->Port = $config['mailPort'];
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = $senderMail;
        $mail->Password = $senderPassword;
        $mail->SetFrom($senderMail);
        $mail->Subject = $subject;
        $mail->Body = $message;
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
            $attachmentPath = $_FILES['attachment']['tmp_name'];
            $attachmentName = $_FILES['attachment']['name'];
            $mail->addAttachment($attachmentPath, $attachmentName);
        }
        $mail->AddAddress($reciverMail);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            )
        );

        if (!$mail->Send()) {
            $response_arr = array(
                "Message" => $mail->ErrorInfo,
                "Status" => "Error"
            );
            return $response_arr;
        } else {
            $response_arr = array(
                "Message" => "Success",
                "Status" => "Success"
            );
            return $response_arr;
        }
    } else {
        return new WP_Error('server_access_only', 'Server access only.', array('status' => 401));
    }
}

add_action('rest_api_init', 'sendmail_api_init');
