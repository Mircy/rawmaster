<?php
$clean = array();
$errors = array();
$form_submitted = false;
$errors_detected = false;

if(isset($_POST['sendmsg'])){
	$form_submitted = true;
	if(isset($_POST['name'])){
		$name = ucwords(strtolower(trim($_POST['name'])));
		if(preg_match("/^[a-zA-Z][a-zA-Z ]*$/", $name)){
			$clean['name'] = htmlentities($name);
		}else{
			$errors_detected = true;
			$errors['name'] = '*Name is invalid';
		}
	}else{
		$errors_detected = true;
		$errors['name'] = '*Name is required';
	}
	if(isset($_POST['phone'])){
		$phone = trim($_POST['phone']);
		if(preg_match("/^(?:\+\d{1,3}|0\d{1,3}|00\d{1,2})?(?:\s?\(\d+\))?(?:[-\/\s.]|\d)+$/", $phone)){
			$clean['phone'] = htmlentities($phone);
		}else {
			$errors_detected = true;
			$errors['phone'] = '*Phone is invalid';
		}
	}else{
		$errors_detected = true;
		$errors['phone'] = '*Phone is required';
	}
	if(isset($_POST['mail'])){
		$email = strtolower(trim($_POST['mail']));
		if(preg_match("/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,}$/", $email)){
			$clean['email'] = htmlentities($email);
		}else {
			$errors_detected = true;
			$errors['email'] = '*Email is invalid';
		}
	}else{
		$errors_detected = true;
		$errors['email'] = '*Email is required';
	}
	if(isset($_POST['message'])){
		$message = ucfirst(strtolower(trim($_POST['message'])));
		if(preg_match("/^\s*([^\s]\s*){5,500}$/",$message)){
			$clean['message'] = htmlentities($message);
		}else {
			$errors_detected = true;
			$errors['message'] = '*Message is invalid';
		}
	}else{
		$errors_detected = true;
		$errors['message'] = '*Message is required';
	}
}

$page_title = $title_contact;
$current = 'Contact';
include 'includes/header.php';
echo $header;

if($form_submitted == true && $errors_detected == false){
	$to = "vasile.cocosila@rawmaster.co.uk";
	$subject = "New client from website";
	$client_name = $clean['name'];
	$client_phone = $clean['phone'];
	$client_email = $clean['email'];
	$client_message = $clean['message'];
	$msg = nl2br("Name: ".$client_name."\r\n"."Phone: ".$client_phone."\r\n"."Email: ".$client_email."\r\n"."Message: ".$client_message);
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <rawmaster@rawmaster.co.uk>' . "\r\n";
	$headers .= 'Cc: mircea.gancea@gmail.com' . "\r\n";
	mail($to, $subject, $msg, $headers);
	header('Location: index.php?page=confirm');
}else {
	$value_name = keep_value($clean, 'name');
	$value_phone = keep_value($clean, 'phone');
	$value_email = keep_value($clean, 'email');
	$value_message = keep_value($clean, 'message');
	
	$tpl_form = file_get_contents('templates/form.html');
	$place_holders = array(
							'[+legend+]',
							'[+p1+]',
							'[+p2+]',
							'[+field_1+]',
							'[+value_name+]',					
							'[+field_2+]', 
							'[+value_phone+]',	
							'[+field_3+]',
							'[+value_email+]',							
							'[+field_4+]',
							'[+value_message+]',							
							'[+submit+]'
	);
	$data = array(
					$contact_legend, 
					$contact_p1,
					$contact_p2,
					$contact_field_1,
					$value_name,
					$contact_field_2,
					$value_phone,
					$contact_field_3,
					$value_email,
					$contact_field_4, 
					$value_message,
					$contact_submit
	);
	$form = str_replace($place_holders, $data, $tpl_form);
	$form_errors = "";
	foreach($errors as $value){
            $form_errors .=  "<p>$value</p>" .PHP_EOL;
    }
	
	$tpl = file_get_contents('templates/contact.html');
	//$contact1 = str_replace('[+form_errors+]', $form_errors, $tpl);
	$contact = str_replace('[+form+]', $form, $tpl);
	echo $contact;
}

include 'includes/footer.php';
echo $footer;

?>