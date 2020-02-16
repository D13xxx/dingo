<?php 
use yii\helpers\Url;
?>
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?= Url::to('/site/index') ?>"> <img src="/theme/img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to('/site/index') ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to('/site/about') ?>">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to('/site/food-menu') ?>">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to('/site/chefs') ?>">Chefs</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?= Url::to('/site/blog') ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    <a class="dropdown-item" href="elements.html">Elements</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to('/site/contact') ?>">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_btn">
                        <a href="#" class="btn_1 d-none d-sm-block">book a tabel</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>