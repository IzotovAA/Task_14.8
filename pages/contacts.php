<?php
session_start();
$auth = $_SESSION['auth'] ?? null;

include($_SERVER['DOCUMENT_ROOT'] . "/pages/functions.php");

if ($auth) {
  $user_name = getCurrentUser();
}

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

          <?php
          if (!$auth) { // если пользователь не авторизован доступна только главная страница, вход и регистрация
          ?>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Главная</a>
              </li>
            </ul>

            <div class="d-flex justify-content-end">
              <form action="registration.php" method="POST">
                <input type="submit" value="Зарегестрироваться" />
              </form>
              <form action="login.php" method="POST">
                <input type="submit" value="Войти" />
              </form>
            </div>

          <?php
          } ?>

          <?php
          if ($auth) { // если пользователь авторизован доступны и другие страницы
            $user_name = getCurrentUser();
          ?>

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

              <form action="My-account.php" method="POST">
                <input type="submit" value="Личный кабинет" />
              </form>

              <form action="clear-session.php" method="POST">
                <input type="submit" value="Выйти" />
              </form>
            </div>

          <?php
          } ?>

        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container">
      <h1>Контакты</h1>

      <div class="container contact">
        <img src="../img/17.jpg" alt="pic" class="contact" />
      </div>

      <p>
        Quo ex laborum maxime ab blanditiis eligendi soluta reiciendis fuga,
        suscipit alias explicabo autem atque natus earum numquam officiis
        debitis voluptatum. Laudantium adipisci laboriosam assumenda,
        recusandae nostrum minus vero. Dolores molestias, voluptatum officia,
        veniam quidem neque esse fuga suscipit ullam eum aliquid repudiandae.
      </p>
      <p>
        Контактный телефон: 8-999-999-99-99 <br />
        Факс: 8-999-999-99-88 <br />
        WhatsUp: 8-960-999-77-88 <br />
        E-mail: example@comfort.ru
      </p>
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