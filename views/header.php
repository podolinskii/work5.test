<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" >
    <link rel="stylesheet" href="/public/main/css/style.css">
    <link rel="stylesheet" href="/public/<?=$this->styles?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="<?=$this->scripts?>"></script>

    <title><?=$this->title?></title>
</head>

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">Главная</a></li>
            </ul>



            <div class="text-end">

                <? if(User::isLogin()):?>
                <a href="/login/logout"><button type="button" class="btn btn-outline-light me-2">Выйти</button></a>
                <? else: ?>
                <a href="/login"><button type="button" class="btn btn-outline-light me-2">Войти</button></a>
                <?php endif?>

            </div>
        </div>
    </div>
</header>

<body>


<div id="main_block">

