<?php
/**
 * Plugin Name: Craft Wardrobe
 * Version: 1.0.0
 * Description: Provides SMTP API for Sending mails
 */

include('smtp/PHPMailerAutoload.php');

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
        )
    );
}

function is_local_request()
{
    // Check the server's IP address or a known hostname
    $server_ip = $_SERVER['SERVER_ADDR'];
    $server_hostname = gethostname();

    $client_ip = $_SERVER['REMOTE_ADDR'];

    // echo json_encode(array(
    //     "server_ip"=>$server_ip,
    //     "server_hostname"=> $server_hostname,
    //     "client_ip" => $client_ip
    // ));
    // Add more checks if needed
    // return ($client_ip === $server_ip) || ($client_ip === $server_hostname);
    return true;
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
