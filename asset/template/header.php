<?php include 'lib/config.php'; ?>
<?php include 'lib/connect.php'; ?>
<?php include 'lib/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo _URL; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thairoute</title>
    <meta id="viewport_meta" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="copyright" content="Thairoute" />
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="MobileOptimized" content="320">
    <meta name="keywords" content="Thairoute" />
    <meta name="description" content="Thairoute" />
    <meta name='language' content='TH'>

    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="Thairoute" />
    <meta property="og:site_name" content="Thairoute" />
    <meta property="og:image" content="" />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="format-detection" content="telephone=no">
    <meta name="Rating" content="general" />
    <meta name="ROBOTS" content="index, follow" />
    <meta name="GOOGLEBOT" content="index, follow" />
    <meta name="FAST-WebCrawler" content="index, follow" />
    <meta name="Scooter" content="index, follow" />
    <meta name="Slurp" content="index, follow" />
    <meta name="REVISIT-AFTER" content="7 days" />
    <meta name="distribution" content="global" />

    <!-- Core -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:200,300,400" />
    <link rel="stylesheet" type="text/css" href="<?php echo _URL; ?>asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo _URL; ?>asset/css/bootstrap-reboot.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo _URL; ?>asset/css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo _URL; ?>asset/css/animation.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MAIN -->
    <link rel="stylesheet" type="text/css" href="<?php echo _URL; ?>asset/css/main.css" />
    <link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
    <style>
        #searchform input {
            display: inline-block;
            width: 150px;
            border-radius: unset;
            border-top-left-radius: unset;
            border-bottom-left-radius: unset;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        #searchform button {
            display: inline-block;
            width: calc(100% - 150px);
            border-radius: unset;
            border-top-right-radius: unset;
            border-bottom-right-radius: unset;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .without_ampm::-webkit-datetime-edit-ampm-field {
            display: none;
        }

        input[type=time]::-webkit-clear-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            -o-appearance: none;
            -ms-appearance: none;
            appearance: none;
            margin: -10px;
        }
    </style>
</head>