<?php
session_start();
$auth = $_SESSION['auth'] ?? null;

include($_SERVER['DOCUMENT_ROOT'] . "/pages/functions.php");

if (!$auth) {
    header('Location: ../index.php');
} else $user_name = $_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPA-салон "КОМФОРТ"</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/styles.css" />
</head>

<body>
    <header>
        <div class="d-flex justify-content-center" id="site-name">
            <a href="../index.php">
                <h1>SPA-салон "КОМФОРТ"</h1>
            </a>
        </div>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php"><img src="../img/SPA.svg" alt="logo" width="80" height="50" class="d-inline-block align-text-center" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="lorem.php">Lorem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ipsum.php">Ipsum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dolor.php">Dolor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="elit.php">Elit</a>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-end ">
                        <div class="d-flex justify-content-center" id="username">
                            <?php
                            echo $user_name;
                            ?>
                        </div>
                        <form action="clear-session.php" method="POST">
                            <input type="submit" value="Выйти" />
                        </form>
                    </div>

                </div>
            </div>
        </nav>

    </header>

    <main>
        <div class="container">
            <h3>Личный кабинет </h3>
            <h5>Добро пожаловать

                <?php
                echo $user_name . '.' . "\n";
                getUserBirthday();
                ?>

            </h5>
            <h5 class="discount">
                <?php
                getPromotionTime();
                ?>
            </h5>

        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Dolor consequatur</h5>
                            <p class="card-text">
                                Dolor consequatur quo maxime unde nostrum. Tempora modi
                                corporis, ut et molestias culpa qui eum, soluta ad fuga
                                corrupti? Cupiditate, nemo sunt! Vero corrupti totam nisi nam
                                sint architecto harum atque, sed nulla veniam quis error quod
                                asperiores corporis nihil pariatur, quas cupiditate
                                reprehenderit consectetur dolores eum exercitationem molestiae
                                eaque illum!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Voluptatibus illum</h5>
                            <p class="card-text">
                                Voluptatibus illum, asperiores alias ab repudiandae omnis ut
                                error sequi reprehenderit, nobis labore perspiciatis quisquam
                                earum minus totam! Aut accusantium distinctio, corrupti enim
                                eius maiores. Odit excepturi iste ea laudantium neque magni
                                aut maiores obcaecati! Non officiis consequuntur, excepturi
                                nisi repellendus officia repellat cumque quod veritatis
                                molestias facilis maiores quasi odio illum, pariatur, vitae
                                odit beatae!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Voluptatum</h5>
                            <p class="card-text">
                                Voluptatum voluptas officia omnis molestias repudiandae
                                excepturi amet, maxime veniam saepe necessitatibus explicabo
                                illum corrupti voluptate dolorum consequuntur unde. Aliquam
                                possimus optio consequuntur dolores reiciendis ipsam laborum
                                assumenda sit. Iure doloremque perferendis veniam consequatur
                                eos necessitatibus, numquam doloribus inventore nisi quos.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Perspiciatis</h5>
                            <p class="card-text">
                                Perspiciatis, eligendi assumenda quae doloremque est, esse
                                quaerat veniam ex commodi nulla tempore, libero unde
                                aspernatur minus amet adipisci aperiam sit non quibusdam
                                delectus quia iusto similique molestias? Nulla, obcaecati?
                                Eveniet dolore, vitae reiciendis minima rem assumenda omnis
                                sit magni est exercitationem fugiat possimus expedita magnam
                                laudantium unde non obcaecati impedit tempore!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="links">
            <a href="vacancies.php">Вакансии</a>
            <a href="contacts.php">Контакты</a>
            <a href="about.php">О нас</a>
        </div>

        <div class="copyright">Сopyright &copy; Spa-салон "КОМФОРТ" 2023</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>