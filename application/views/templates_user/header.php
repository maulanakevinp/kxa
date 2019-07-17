<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="<?= base_url('') ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/Map-Clean.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/smoothproducts.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/Testimonials.css">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="icon" href="<?= base_url('') ?>assets/img/navbar/gambar-background-kayu-hd.jpg">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <div class="icons" style="position: fixed; bottom: 30px; right: 0; z-index: 1030">
        <a href="<?= $company['whatsapp'] ?>" target="_blank" style="width: 70px;height: 70px;"><img src="<?= base_url('') ?>assets/img/e-commerce/whatsapp.png" style="width: 70px;height: 70px;padding: 15px;"></a>
    </div>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top shadow-lg clean-navbar" style="background-image: url(&quot;<?= base_url('') ?>assets/img/navbar/gambar-background-kayu-hd.jpg&quot;);">
        <div class="container">
            <a class="navbar-brand logo d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
                <div class="navbar-brand-icon rotate-n-15">
                    <i class="fas fa-chair"></i>
                </div>
                <div class="navbar-brand-text mx-3">Xylo Furniture</div>
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#HubungiKami" onclick="scrollToBottom()">Hubungi kami</a></li>
                    <li class=" nav-item" role="presentation"><a class="nav-link" href="<?= base_url('home/about') ?>">About</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= base_url('home/client') ?>">Client</a></li>
                </ul>
            </div>
        </div>
    </nav>