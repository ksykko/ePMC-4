<body>
    <!-- <header>
    <!-- <header>
        <div class="container">
            <nav id="navigation">
                <a href="#" class="logo"><img src=" <?= base_url('/assets/img/others/Logo.png') ?>" width="74" height="74"></a>
                <a aria-label="mobile menu" class="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <ul class="menu-left">
                    <li><a href="<?= base_url('Web') ?>">Home</a></li>
                    <li><a href="<?= base_url('Web') ?>" id="#about">About</a></li>
                    <li><a href="<?= base_url('Web') ?>" id="#contact">Contact Us</a></li>
                    <li><a href="<?= base_url('Login/signin') ?>" class="btn-login">Login</a></li>
                </ul>
            </nav>
        </div>
    </header> -->
    <nav id="navbar" class="navbar navbar-light navbar-expand-md fixed-top bg-white">
        <div class="container-fluid"><a class="navbar-brand mx-3" href="#"><img src="<?= base_url('/assets/img/others/Logo.png') ?>" width="50" height="50" /></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon fs-6"></span></button>
            <div id="navcol-1" class="collapse navbar-collapse d-md-flex justify-content-md-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Web') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact-us">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="<?= base_url('Login/signin') ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>