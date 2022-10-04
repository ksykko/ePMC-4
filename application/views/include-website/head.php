<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- <title>SCHEDULE</title> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="<?= base_url('/assets/fonts/fontawesome-all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/home-page.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('/assets/img/others/Logo.ico') ?>">

    <!-- DI NAGANA TO - Schedule External CSS -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/schedule_style.css') ?>"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS PARA SA SCHEDULE -->
    <style>
        body {
            background-color: #adadad;
        }
        .container-fluid {
            display: flex;
            /* background-color: #FFFFF0; */
            background-color: #adadad;
            width: 100%;
            padding-left: 5px;
        }

        h1 {
            text-align: left;
            margin-left: 15px;
        }

        #btn-addSched {
            display: block;
            margin: 10px 20px 0 auto;
        }

        .col-lg-3 {
            border: 1px black solid;
            margin-top: 40px;
            padding-top: 10px;
            position: relative;
            height: 100%;
        }

        .label-doctors {
            background-color: #abc1cc;
            text-align: left;
            border: 1px black solid;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: absolute;
            padding: 0 20px 0 15px;
        }
    </style>
</head>