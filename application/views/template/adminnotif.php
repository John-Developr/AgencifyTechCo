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
                                        <img style="width:100%;max-width: 190px;" src="<?php echo base_url()?>/assets/img/main-logo.png">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="contain" style="color:black;width: 100%;padding: 10px 0 10px 0;">
                        <div class="congrats">
                        
						<?php if($status == 'Approved') :?>
                            <h1>Hi, Admin!</h1>
                            <div class="image">
								<img style="width:100%;max-width: 190px;" src="<?php echo base_url()?>/assets/img/approve.png">
                            </div>

							<div class="text">
                                <p>This work schedule of <?= $name?> <?= $surname?> has been approved <br>Here is a breakdown of the work schedule:<br>
								<strong>Start Date:</strong> <?= $start_date?> <br>
								<strong>End Date:</strong> <?= $end_date?><br>
								<strong>Location:</strong> <?= $service_location?>
                                </p>  
                            </div>
                            <div class="text-center">
                                <label for="name" style="font-weight: bold;">Approved by: </label><span><?= $fname?> <?= $lname?></span>
                            </div>
                            <p><strong style="font-weight: bold;">Note:</strong> If you wish to change the status of this work schedule, please contact the Staffing Coordinator that approved this work schedule.</p>
						<?php else : ?>
							<h1>Hi, Admin!</h1>
                            <div class="image">
								<img style="width:100%;max-width: 190px;" src="<?php echo base_url()?>/assets/img/decline.png">
                            </div>

							<div class="text">
                                <p>This work schedule of <?= $name?> <?= $surname?> has been declined.  <br>Here is a breakdown of the work schedule:<br>
								<strong>Start Date:</strong> <?= $start_date?> <br>
								<strong>End Date:</strong> <?= $end_date?><br>
								<strong>Location:</strong> <?= $service_location?>
                                </p>  
                            </div>
                            <div class="text-center">
                                <label for="name" style="font-weight: bold;">Declined by: </label><span><?= $fname?> <?= $lname?></span>
                            </div>
                            <p><strong style="font-weight: bold;">Note:</strong> If you wish to change the status of this work schedule, please contact the Staffing Coordinator that declined this work schedule.</p>
						<?php endif ; ?>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
