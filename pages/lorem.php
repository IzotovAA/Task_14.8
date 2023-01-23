<?php
session_start();
$auth = $_SESSION['auth'] ?? null;

include($_SERVER['DOCUMENT_ROOT'] . "/pages/functions.php");

if (!$auth) {
  header('Location: ../index.php');
} else $user_name = getCurrentUser();

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
    <div>
      <div class="d-flex justify-content-center" id="site-name">
        <a href="../index.php">
          <h1>SPA-салон "КОМФОРТ"</h1>
        </a>
      </div>
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

            <form action="My-account.php" method="POST">
              <input type="submit" value="Личный кабинет" />
            </form>

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
      <h1>Lorem</h1>
      <p>
        Architecto nostrum magni sunt nulla voluptate, soluta praesentium
        maiores atque, dolores veniam fuga ducimus, ex accusantium laborum
        rerum blanditiis error autem eum quod quae? Eius incidunt quidem
        quaerat fuga quia, voluptas totam, neque dolorum culpa dolores
        molestiae? Deleniti consequuntur vero inventore vitae, iste quibusdam.
      </p>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="../img/1.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Doloribus</h5>
              <p class="card-text">
                Ex, doloribus cum inventore, pariatur porro reprehenderit
                recusandae repellendus fugit maxime dolorum repudiandae
                reiciendis numquam! Quae, blanditiis facilis id doloribus
                culpa fugit ipsum provident magnam, et rerum commodi magni
                delectus ipsa velit omnis quaerat maxime autem pariatur dicta
                voluptatem. Distinctio, nulla, ratione perferendis id laborum
                minima.
              </p>
            </div>

            <div class="card-footer">
              <small class="text-muted">Цена: <del>2300 &#8381;</del>
                <span class="price-discount">
                  <?php
                  echo getDiscound(2300);
                  ?>
                  &#8381;</span>
              </small>
            </div>

          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../img/7.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Quidem eius</h5>
              <p class="card-text">
                Quidem eius voluptates aliquam! Nostrum et eligendi neque ab!
                Nesciunt accusamus ut voluptatibus natus harum amet quisquam
                deserunt vero nihil, reprehenderit dolore, temporibus ad totam
                itaque aliquam saepe hic? Eaque magni, impedit, rerum odit
                optio corporis dolorum, ipsam explicabo quaerat tempora ipsa
                molestias omnis quas dolorem tenetur? Sunt laudantium earum
                ullam, perferendis error commodi quas beatae doloribus autem
                dignissimos velit eum vel
              </p>
            </div>

            <div class="card-footer">
              <small class="text-muted">Цена: <del>3000 &#8381;</del>
                <span class="price-discount">
                  <?php
                  echo getDiscound(3000);
                  ?>
                  &#8381;</span>
              </small>
            </div>

          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../img/9.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Sequi</h5>
              <p class="card-text">
                Sequi magni possimus consequatur quibusdam at quod obcaecati
                itaque iure esse, nisi aut, nemo aspernatur molestiae nostrum
                ad beatae ex repellat quam? Obcaecati minima sed quos
                praesentium necessitatibus hic voluptas impedit suscipit
                sapiente mollitia incidunt a ipsum architecto inventore harum,
                ullam quisquam veniam, facere quo. Velit possimus rerum ullam
                quibusdam eum enim omnis fuga quo explicabo ad in quidem,
                impedit atque, deserunt animi. Itaque sit accusamus distinctio
                obcaecati odit aspernatur numquam ducimus adipisci iure cum
                corrupti minus!
              </p>
            </div>

            <div class="card-footer">
              <small class="text-muted">Цена: <del>3000 &#8381;</del>
                <span class="price-discount">
                  <?php
                  echo getDiscound(3000);
                  ?>
                  &#8381;</span>
              </small>
            </div>

          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="../img/6.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Doloribus beatae</h5>
              <p class="card-text">
                Doloribus beatae totam, voluptatibus illo assumenda numquam id
                voluptatem accusamus vitae ut sapiente ratione, perspiciatis
                illum maxime saepe repellendus facilis culpa. Ipsa corporis
                natus minus voluptate obcaecati aliquam corrupti consectetur
                quas eos ab a unde, dolor cumque reiciendis modi laboriosam
                ipsum possimus? Consequuntur, maxime dolor. placeat tempore
                illum est ducimus debitis sapiente!.
              </p>
            </div>

            <div class="card-footer">
              <small class="text-muted">Цена: <del>2500 &#8381;</del>
                <span class="price-discount">
                  <?php
                  echo getDiscound(2500);
                  ?>
                  &#8381;</span>
              </small>
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