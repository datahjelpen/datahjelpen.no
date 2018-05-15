<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Kontaktskjema melding - Datahjelpen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #f0f0f0">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 10px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; width:600px; max-width:100%; min-width: 350px;">
					<tr>
						<td align="center" bgcolor="<?= $data['branding-color'] ?>" style="width: 100%; height: 200px; color: #ffffff; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif; background-image: url('https://datahjelpen.org/images/graphics/email/header_bg.png'); background-repeat: no-repeat; background-size: 600px 200px; ">
							Ny melding
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 25px 25px 25px 25px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: <?= $data['branding-color'] ?>; font-family: Roboto, Arial, sans-serif; font-size: 24px; text-align: left;">
										<b><?= $data['name']; ?></b>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 5px> 0; color: #1e1e1e; font-family: Roboto, Arial, sans-serif; font-size: 16px; text-align: left; line-height: 20px;">
										<br/>
										<?= $data['email']; ?>
										<br/>
										<?= nl2br($data['message']); ?>
										<br/>
										<br/>
									</td>
								</tr>
								<tr>
									<td style="font-size: 0.8em;">
										<b><i>Med vennlig hilsen,</i></b>
										<br/>
										<b><i>Datahjelpen.org</i></b> 
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="<?= $data['branding-color'] ?>" style="padding: 25px 25px 25px 25px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #ffffff; font-family: Roboto, Arial, sans-serif; font-size: 14px;" width="30%">
										&copy; Datahjelpen <?= date('Y') ?><br/>
									</td>
									<td align="right" width="25%">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td style="font-family: Roboto, Arial, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="http://www.facebook.com/datahjelpen.org" style="color: #ffffff;">
														<img src="https://datahjelpen.org/images/icons/facebook.png" alt="Facebook" width="38" height="38" style="display: block;" border="0">
													</a>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
												<td style="font-family: Roboto, Arial, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="http://www.twitter.com/datahjelpen_org" style="color: #ffffff;">
														<img src="https://datahjelpen.org/images/icons/twitter.png" alt="Twitter" width="38" height="38" style="display: block;" border="0">
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
