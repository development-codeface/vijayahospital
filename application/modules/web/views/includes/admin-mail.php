<?php if(isset($career) && $career==true) { ?>
<title>Career Request</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body style="margin: 0px;padding: 0px;">
    <div style="background-color: #d2d2d2;margin: 0px;padding: 30px 0;width: 100%;font-family: Montserrat, sans-serif;font-size: 14px;">
            <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                    <tbody>
                            <tr>
                                    <th style="width: 150px;padding: 15px 25px;text-align: left;">
                                        <img src=<?=base_url()?>assets/web/images/logo.png>
                                    </th>
                            </tr>
                    </tbody>
            </table>
            <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #e9e9e9; color: #000;padding: 80px 0;">
                    <tbody>
                           <tr>
            <td style="padding-left:10px">
            <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">First Name : </p>
            </td><td  width="10"></td>
            <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['first_name']?></p>
            </td>
            </tr>
            <tr>
            <td style="padding-left:10px">
            <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Last Name : </p>
            </td><td  width="10"></td>
            <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['last_name']?></p>
            </td>
            </tr>
           <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Email : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['email']?></p>
               </td>
              </tr>
              <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Phone Number : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['mobile_number']?></p>
               </td>
              </tr>
              <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Location : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['location']?></p>
               </td>
              </tr>
               <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Position : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['position']?></p>
               </td>
              </tr>
                    </tbody>
            </table>
            <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                    <tbody>
                            <tr>
                                    <td style="padding: 30px 40px 30px;font-size: 13px;">&copy; <?=date('Y')?> by MURALYA.</td>
                            </tr>
                    </tbody>
            </table>
    </div>
<?php } ?>
<?php if(isset($contact) && $contact==true) { ?>
<title>Contact Request</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body style="margin: 0px;padding: 0px;">
    <div style="background-color: #d2d2d2;margin: 0px;padding: 30px 0;width: 100%;font-family: Montserrat, sans-serif;font-size: 14px;">
            <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                    <tbody>
                            <tr>
                                    <th style="width: 150px;padding: 15px 25px;text-align: left;">
                                        <img src=<?=base_url()?>assets/web/images/logo-light.png>
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
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['name']?></p>
            </td>
            </tr>
           <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Email : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['email']?></p>
               </td>
              </tr>
              <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Mobile : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['mobile']?></p>
               </td></tr>
              <tr>
                <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Message : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['message']?></p>
               </td>
              </tr>

                    </tbody>
            </table>
            <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                    <tbody>
                            <tr>
                                    <td style="padding: 30px 40px 30px;font-size: 13px;">&copy; 2018 by NTV.</td>
                            </tr>
                    </tbody>
            </table>
    </div>
<?php } ?>
<?php if(isset($insurance) && $insurance==true) { ?>
<title>Insurance Enquiry</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body style="margin: 0px;padding: 0px;">
    <div style="background-color: #d2d2d2;margin: 0px;padding: 30px 0;width: 100%;font-family: Montserrat, sans-serif;font-size: 14px;">
            <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                    <tbody>
                            <tr>
                                    <th style="width: 150px;padding: 15px 25px;text-align: left;">
                                        <img src=<?=base_url()?>assets/web/images/ntv-logo.png>
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
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['name']?></p>
            </td>
            </tr>
           <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Email : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['email']?></p>
               </td>
              </tr>
              <tr>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Mobile : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['mobile_no']?></p>
               </td></tr>
              <tr>
                <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;">Enquiry for : </p>
               </td><td  width="10"></td>
               <td style="padding-left:10px">
                <p style="margin-top:0;font-family:Helvetica Neue,Arial,Helvetica,Verdana,sans-serif;color:#333333;font-size:15px;line-height:25px;"><?=$post['ins_company']?></p>
               </td>
              </tr>

                    </tbody>
            </table>
            <table style="margin: 0px auto;width: 100%;max-width: 600px;background-color: #fff;">
                    <tbody>
                            <tr>
                                    <td style="padding: 30px 40px 30px;font-size: 13px;">&copy; 2018 by NTV.</td>
                            </tr>
                    </tbody>
            </table>
    </div>
<?php } ?>