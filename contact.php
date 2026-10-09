<?php
declare(strict_types=1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function back(string $status): void { header('Location: index.html?contact=' . rawurlencode($status) . '#collab', true, 303); exit; }
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') { header('Allow: POST'); http_response_code(405); exit('Method not allowed.'); }
$name=trim((string)($_POST['name']??'')); $email=trim((string)($_POST['email']??'')); $type=trim((string)($_POST['type']??'')); $message=trim((string)($_POST['message']??''));
$allowed=['YouTube Collaboration','Sponsorship','Stream Collaboration','Business Inquiry','Other'];
if($name===''||strlen($name)>80||!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($email)>254||preg_match('/[\r\n]/',$email)||!in_array($type,$allowed,true)||$message===''||strlen($message)>12000) back('error');
$configFile=__DIR__.'/private-config.php';
$required=[__DIR__.'/PHPMailer/src/Exception.php',__DIR__.'/PHPMailer/src/PHPMailer.php',__DIR__.'/PHPMailer/src/SMTP.php'];
if(!is_file($configFile)||!is_readable($configFile)){error_log('Contact form: private configuration missing.');back('error');}
foreach($required as $file){if(!is_file($file)||!is_readable($file)){error_log('Contact form: PHPMailer dependency missing.');back('error');}}
$config=require $configFile;
if(!is_array($config)){error_log('Contact form: invalid private configuration.');back('error');}
$user=(string)($config['smtp_username']??'');$pass=(string)($config['smtp_password']??'');$to=(string)($config['recipient']??'');
if(!filter_var($user,FILTER_VALIDATE_EMAIL)||$pass===''||!filter_var($to,FILTER_VALIDATE_EMAIL)){error_log('Contact form: incomplete SMTP configuration.');back('error');}
require_once $required[0];require_once $required[1];require_once $required[2];
$mail=new PHPMailer(true);
try{$mail->isSMTP();$mail->Host='smtp.gmail.com';$mail->SMTPAuth=true;$mail->Username=$user;$mail->Password=$pass;$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;$mail->Port=587;$mail->CharSet='UTF-8';$mail->Timeout=20;$mail->setFrom($user,'NG BLOX YT Website');$mail->addAddress($to,'NG BLOX YT');$mail->addReplyTo($email,$name);$mail->isHTML(false);$mail->Subject='Website Contact: '.$type;$mail->Body="New message from NG BLOX YT website\n\nName: {$name}\nEmail: {$email}\nInquiry type: {$type}\n\nMessage:\n{$message}\n";$mail->send();back('success');}
catch(Exception $e){error_log('Contact form mail error: '.$mail->ErrorInfo);back('error');}
