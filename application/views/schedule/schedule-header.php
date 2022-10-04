<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&amp;display=swap">
    <link rel="stylesheet" href="<?= base_url('/assets/css/home-page.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('/assets/img/others/Logo.ico') ?>">

    <!-- DI NAGANA TO - Schedule External CSS -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/schedule_style.css') ?>"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS PARA SA SCHEDULE -->
    <style>
        .schedule {
            background: #D2D2D2;
            padding-top: 20px;
        }

        .sched-header {
            margin: 15px 0;
            padding: 0 20px;
        }

        .sched-header h1 {
            text-align: left;
        }

        .sched-header #btn-addSched {
            display: block;
            margin-left: auto;
            margin-right: 0;
            background: #01BB8E;
            color: #fff;
            border: none;
            border-radius: 5px;
            height: 35px;
            padding-left: 10px;
            padding-right: 10px;
        }

        /* POPUP FORM */
        .popup {
            display: none;
            position: fixed;
            top: 43%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 420px;
            padding: 20px 30px;
            background: #fff;
            box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            z-index: 9;
        }

        .popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
            background: #888;
            color: #eee;
            text-align: center;
            line-height: 12px;
            border-radius: 15px;
            cursor: pointer;
        }

        .popup .form h2 {
            text-align: center;
            color: #222;
            margin: 10px 0 20px;
            font-size: 25px;
        }

        .popup .form .form-element {
            margin: 15px 0;
        }

        .popup .form .form-element label {
            font-size: 15x;
            color: #222;
        }

        .end-time {
            margin-left: 85px;
        }

        .days {
            display: inline-block !important;
            width: 60px !important;
        }

        .popup .form .form-element input[type="text"],
        .popup .form .form-element input[type="time"] {
            margin-bottom: 10px;
            display: block;
            width: 100%;
            padding: 10px;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        .popup .form .form-element input[type="time"] {
            display: inline-block !important;
            width: 49% !important;
            margin: 0 auto !important;
        }

        .popup .form .form-element input[type="button"] {
            width: 47px !important;
            height: 35px !important;
            background: #D8D8D8 !important;
            color: #222 !important;
            text-align: center;
            padding: 0 !important;
        }

        .popup .form .form-element input[type="button"]:hover {
            background: #2F66B8 !important;
            color: #D8D8D8 !important;
        }

        .popup .form .form-element button, .popup .form .form-element input[type="button"]  {
            width: 100%;
            height: 40px;
            border: none;
            outline: none;
            font-size: 15px;
            background: #01BB8E;
            color: #f5f5f5;
            border-radius: 10px;
            cursor: pointer;
        }

        .popup .form .form-element a {
            display: block;
            text-align: center;
            font-size: 15px;
            color: #222;
            text-decoration: none;
            font-weight: 500;
        }
        /* END POPUP FORM */

        .sched-body {
            display: flex;
            background-color: #FFFFFF;
            width: 95%;
            padding: 30px;
            margin: 10px;
            border-radius: 15px;
        }

        .col-lg-3 {
            /* border: 1px black solid; */
            margin-top: 40px;
            padding-top: 10px;
            position: relative;
            height: inherit;
        }

        .label-doctors {
            background-color: #abc1cc;
            text-align: left;
            /* border: 1px black solid; */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: absolute;
            padding: 0 20px 0 15px;
        }
        
    </style>
</head>