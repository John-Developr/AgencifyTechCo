<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <table style="table-layout:fixed;padding:5px 10px" dir="ltr" width="100%" cellspacing="0" cellpadding="0" bgcolor="white">
        <tbody>
            <tr>
                <td style="min-width:420px" valign="top" align="center">
                    <table width="420" height="50" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                                <td style="padding:22px" align="left">
                                    <div style="display: flex; column-gap: 10px;font-family: -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue','Fira Sans',Ubuntu,Oxygen,'Oxygen Sans',Cantarell,'Droid Sans','Apple Color Emoji','Segoe UI Emoji','Segoe UI Emoji','Segoe UI Symbol','Lucida Grande',Helvetica,Arial,sans-serif;">
                                        <img style="width:100%;max-width: 190px;" src="<?php echo base_url() ?>/assets/img/main-logo.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="contain" style="color:black;width: 100%;padding: 10px 0 10px 0;">
                        <div class="congrats">

                            <?php if ($status == "Approved") : ?>
                                <h1>Hi <?= $name ?>, Good day!</h1>
                                <div class="text">
                                    <p>This is to inform you that your requested work shift has been approved. Details about your work shift are provided below.</p>


                                    <strong>Shift Type:</strong> <?= $shift_type ?> <br>
                                    <strong>Time:</strong> <?= date("h:i A", strtotime($start_time)) ?> - <?= date("h:i A", strtotime($end_time)) ?> <br>
                                    <strong>Start Date:</strong> <?= $start_date ?> <br>
                                    <strong>End Date:</strong> <?= $end_date ?><br>
                                    <strong>Location:</strong> <?= $service_location ?>
                                    </p>
                                </div>
                            <?php else : ?>
                                <h1>Hi <?= $name ?>, Good day!</h1>
                                <!-- <div class="image">
                                    <img style="width:100%;max-width: 190px;" src="</?php echo base_url() ?>/assets/img/decline.png">
                                </div> -->

                                <div class="text">
                                    <p>We regret to inform you that your work shift has been declined. <br>Here is a breakdown of your work shift:<br>
                                        <strong>Shift Type:</strong> <?= $shift_type ?> <br>
                                        <strong>Time:</strong> <?= date("h:i A", strtotime($start_time)) ?> - <?= date("h:i A", strtotime($end_time)) ?> <br>
                                        <strong>Start Date:</strong> <?= $start_date ?> <br>
                                        <strong>End Date:</strong> <?= $end_date ?><br>
                                        <strong>Location:</strong> <?= $service_location ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <table style="font-size:13px;line-height:20px;color:#000000;text-align:left" width="420" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                                <td style="padding-left:15px;color:#878c91;padding-top:30px">
                                    <div style="margin-bottom:3px;">
                                        <p style="font-family: -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue','Fira Sans',Ubuntu,Oxygen,'Oxygen Sans',Cantarell,'Droid Sans','Apple Color Emoji','Segoe UI Emoji','Segoe UI Emoji','Segoe UI Symbol','Lucida Grande',Helvetica,Arial,sans-serif;"> Please do not reply to this email. This is only a notication to you. To contact us, kindly contact us
                                            <a href="<?= $contact_us ?>" target="_blank">Here</a>.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>