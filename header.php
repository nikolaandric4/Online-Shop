<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Shop</title>
        <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="<?php echo base_url('css/public_style.css'); ?>" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="page" class="container">
            <div class="header clearfix">
                <div class="logo">Online Shop</div>
                <?php if (user_is_loggedin()):?>
                    <div class="header_login">
                        <?php echo  "<b>{$_SESSION['login']}</b> ({$_SESSION['first_name']} {$_SESSION['last_name']})"; ?><br>
                        <a href="<?php echo base_url('proizvodi/korpa'); ?>">korpa</a>: <?php echo !empty($_SESSION['korpa']) ? count($_SESSION['korpa']) : 0; ?> proizvoda<br>
                        <?php 
                        $totalPrice = 0;
                        if (!empty($_SESSION['korpa'])) { 
                            foreach($_SESSION['korpa'] as $item) {
                                $totalPrice += $item->price;
                            }
                        } ?>
                        <span class="price"><?php echo priceFormat($totalPrice); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <nav class="navbar navbar-expand-lg bg-light rounded">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link <?php echo uri_string() == '/' ? 'active' : ''; ?>" aria-current="page" href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle <?php echo uri_string() == 'proizvodi' ? 'active' : ''; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Proizvodi
                                </a>
                                <?php 
                                    $categoryModel = model('CategoryModel');
                                    $categories = $categoryModel->orderBy('name', 'ASC')->findAll();
                                ?>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach($categories as $category): ?>
                                        <li><a class="dropdown-item" href="<?php echo base_url("proizvodi/kategorija/{$category->category_id}/" . url_title($category->name, '-', true)); ?>"><?php echo "{$category->name} ({$category->number_of_items})"; ?></a></li>
                                    <?php endforeach; ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item  <?php echo uri_string() == 'proizvodi' ? 'active' : ''; ?>" href="<?php echo base_url('proizvodi'); ?>">Sve kategorije</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo uri_string() == 'kontakt' ? 'active' : ''; ?>" href="<?php echo base_url('kontakt'); ?>">Kontakt</a>
                            </li>
                            <li class="nav-item">
                                <?php if (user_is_loggedin()):?>
                                    <a class="nav-link" href="<?php echo base_url('korisnici/logout'); ?>">Logout</a>
                                <?php else: ?>
                                    <a class="nav-link <?php echo uri_string() == 'korisnici/login' ? 'active' : ''; ?>" href="<?php echo base_url('korisnici/login'); ?>">Login</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content py-3">