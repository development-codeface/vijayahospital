<?php if($type == 'contact') { ?>
        <title>Contact Request</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        </head>
        <body style="margin: 0px;padding: 0px;">
        <div style="background-color: #d2d2d2;margin: 0px;padding: 30px 0;width: 100%;font-family: Montserrat, sans-serif;font-size: 14px;">
                <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                        <tbody>
                                <tr>
                                        <th style="width: 150px;padding: 15px 25px;text-align: left;">
                                                <img src="<?=base_url()?>assets/web/images/tsc-hospital-logo.png" style="width:100px;height:50px;">
                                        </th>
                                </tr>
                        </tbody>
                </table>
                <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #e9e9e9; color: #000;padding: 80px 0;">
                        <tbody>
                                <tr>
                <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Name : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['name']?></p>
                </td>
                </tr>
                <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Email : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['email']?></p>
                </td>
                </tr>

                 <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Mobile : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['mobile']?></p>
                </td>
                </tr>

                <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Subject : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['subject']?></p>
                </td>
                </tr>
                <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Message : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['message']?></p>
                </td>
                </tr>
                
                        </tbody>
                </table>
                <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                        <tbody>
                                <tr>
                                    <td style="padding: 30px 40px 30px;font-size: 13px;">&copy; <?=date('Y')?> by <?=SITE_NAME?>.</td>
                                </tr>
                        </tbody>
                </table>
        </div>
<?php } else if($type == 'booking') { ?>
        <title>Contact Request</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        </head>
        <body style="margin: 0px;padding: 0px;">
        <div style="background-color: #d2d2d2;margin: 0px;padding: 30px 0;width: 100%;font-family: Montserrat, sans-serif;font-size: 14px;">
                <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                        <tbody>
                                <tr>
                                        <th style="width: 150px;padding: 15px 25px;text-align: left;">
                                                <img src="<?=base_url()?>assets/web/images/tsc-hospital-logo.png" style="width:100px;height:50px;">
                                        </th>
                                </tr>
                        </tbody>
                </table>
                <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #e9e9e9; color: #000;padding: 80px 0;">
                        <tbody>
                                <tr>
                <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Name : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['name']?></p>
                </td>
                </tr>
                <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Phone Number : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['mobile']?></p>
                </td>
                </tr>
                <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Email : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['email']?></p>
                </td>
                </tr>
                 <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Department : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['department']?></p>
                </td>
                </tr>
               
                <tr>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Appointment Date : </p>
                </td><td  width="10"></td>
                <td style="padding-left:10px">
                        <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post_data['appointment_date']?></p>
                </td>
                </tr>
              
                </tbody>
                </table>
                <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                        <tbody>
                                <tr>
                                    <td style="padding: 30px 40px 30px;font-size: 13px;">&copy; <?=date('Y')?> by <?=SITE_NAME?>.</td>
                                </tr>
                        </tbody>
                </table>
        </div>

<?php } else if($type == 'customer_message') { ?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking Process</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body style="margin: 0px;padding: 0px;">
	<div style="background-color: #d2d2d2;margin: 0px;padding: 30px 0;width: 100%;font-family: 'Montserrat', sans-serif;font-size: 14px;">
		<table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
			<tbody>
				<tr>
					<th style="width: 150px;padding: 15px 25px;text-align: left;">
						<img src="<?=base_url()?>assets/web/images/tsc-hospital-logo.png">
					</th>
				</tr>
			</tbody>
		</table>
		<table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #e9e9e9; color: #000;padding: 40px 0;">
			<tbody>
				<tr>
					<td style="padding: 0px 40px 0;line-height: 24px;">Dear <?=ucwords(strtolower($post_data['name']))?>,</td>
				</tr>
				<tr>
					<td style="padding: 5px 40px 5px;line-height: 24px;">Your Booking is Under Process with the below Information.</td>
				</tr>
				<tr>
					<td style="padding: 5px 40px 5px;line-height: 24px;">
						<table style="max-width: 600px;width:100%;text-align: left;">
							<tr>
								<th>Name :</th>
								<td><?=$post_data['name']?></td>
							</tr>
							<tr>
								<th>Phone Number :</th>
								<td><?=$post_data['mobile']?></td>
							</tr>
							<tr>
								<th>Email :</th>
								<td><?=$post_data['email']?></td>
							</tr>
							<tr>
								<th>Department :</th>
								<td><?=$post_data['department']?></td>
							</tr>
							<tr>
								<th>Appointment Date :</th>
								<td><?=$post_data['appointment_date']?></td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		<table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
			<tbody>
				<tr>
					<td style="padding: 30px 40px 30px;font-size: 13px;"><b>Disclaimer: This is an automated mail, your booking will be confirmed by call from Vijaya Hospital</b><br><br>&copy; <?=date('Y')?> by <?=SITE_NAME?>.</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>
<?php } ?>
