<?php
function emailpd($em)
{
    $myreg ="/^([a-zA-Z0-9]+[_|\\_|\\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\\_|\\.]?)*[a-zA-Z0-9]+\\.[a-zA-Z]{2,3}$/";
    return preg_match($myreg,$em)?"n":"y";
}

/** 发送一封邮件
 * @param $email
 * @param $msg
 * @return bool
 */
function send_email($email, $subject,$msg)
{
    $file = APP_PATH.'config/admin/config.php';
    \think\Config::load($file,null,'mail');
    date_default_timezone_set('Etc/UTC');
    $mail = new PHPMailer();
    $mail->CharSet = config('mail.CharSet',null,'mail');
    $mail->isSMTP();
    $mail->SMTPDebug = config('mail.SMTPDebug',null,'mail');;
    $mail->Host = config('mail.Host',null,'mail');
    $mail->Port = config('mail.Port',null,'mail');;
    $mail->SMTPSecure = config('mail.SMTPSecure',null,'mail');
    $mail->SMTPAuth = true;
    $mail->Username = config('mail.Username',null,'mail');
    $mail->Password = config('mail.Password',null,'mail');;
    $mail->setFrom(config('mail.Username',null,'mail'),  config('mail.WebName',null,'mail'));
    $mail->addReplyTo(config('mail.Username',null,'mail'), config('mail.WebName',null,'mail'));
    $mail->addAddress($email, 'John Doe');
    $mail->Subject = $subject;
    $mail->msgHTML($msg);
    $mail->AltBody = 'This is a plain-text message body';
    if ($mail->send())
        return true;
    return false;
}

/**产生指定长度的随机数
 * @param $length
 * @return string
 */
function random_keys($length)
{
    $output='';
    for ($a = 0; $a < $length; $a++) {
        $output .= chr(mt_rand(33, 126));    //生成php随机数
    }
    return $output;
}
