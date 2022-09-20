<body>
    <header>
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
    </header>