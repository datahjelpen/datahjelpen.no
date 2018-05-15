<?php
	if (empty($_POST['melding']) || empty($_POST['epost'])) {
		$msg_error = 'E-post eller melding kan ikke være tom.';
		require_once('../kontakt-feil.php');
		die();
	} else {
		if (!empty($_POST['navn'])) {
			$name  = htmlspecialchars($_POST['navn']);
		} else {
			$name = 'Navn ble ikke oppgitt';
		}

		$email = htmlspecialchars($_POST['epost']);
		$message = htmlspecialchars($_POST['melding']);
		$data = [
			'name' => $name,
			'email' => $email,
			'message' => $message,
			'branding-color' => '#f25b6c'
		];

		require '../vendor/PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Mailer = 'smtp';
		$mail->Host = 'mail.smtp2go.com';
		$mail->Port = '2525';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Username = 'post@bearhagen.com';
		$mail->Password = 'HdaHEDUuGv8Q884A';
		$mail->CharSet = 'UTF-8';
		$mail->From = 'post@datahjelpen.org';
		$mail->FromName = 'Datahjelpen AS';
		$mail->AddAddress('post@datahjelpen.org', 'Datahjelpen AS');
		$mail->AddReplyTo($email, $name);
		$mail->Subject = $name . ' - Sendte en melding - Datahjelpen.org';
		$mail->WordWrap = 50;
		$mail->isHTML(true);

		function get_include_contents($filename, $variablesToMakeLocal) {
			$data = $variablesToMakeLocal;
			
			if (is_file($filename)) {
				ob_start();
				include $filename;
				return ob_get_clean();
			}

			return false;
		}

		$mail->Body = get_include_contents('./email-contact.php', $data);
		$mail->AltBody = 'Fra:' . $name . ' // E-post:' . $email . ' // Melding: ' . $message . ' //';

		if(!$mail->send()) {
			$msg_error = $mail->ErrorInfo;
			require_once('../kontakt-feil.php');
		} else {
			require_once('../kontakt-suksess.php');
		}
	}