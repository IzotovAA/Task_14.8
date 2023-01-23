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

    <div class="d-flex justify-content-center " id="site-name">
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
      <h1>Ipsum</h1>
      <p>
        Labore quod dolores accusantium rerum omnis exercitationem, nam
        veritatis? Nesciunt porro tempore fugiat laborum accusantium fuga
        repudiandae rerum cum voluptatum, consectetur veritatis autem nobis.
        Excepturi dolores fuga unde fugit voluptatem magnam ab ad quaerat
        recusandae dolorum! Cumque ex odit sint aut ea veniam hic. Hic ullam
        magnam omnis corporis minus? Explicabo repudiandae non optio vel at
        voluptas, ipsa repellendus dolorem beatae blanditiis assumenda.
      </p>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="../img/3.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Distinctio</h5>
              <p class="card-text">
                Nisi at distinctio alias vel adipisci? Voluptatibus, nesciunt?
                Obcaecati nesciunt natus aperiam sint magni commodi doloribus
                voluptatem enim porro fuga laudantium neque optio, totam qui
                explicabo dolorem praesentium quam maxime. Natus recusandae
                minus itaque vel animi adipisci at neque eius. Repellendus
                incidunt quod magni voluptates quidem nobis officiis odio,
                tempora ipsa iusto rerum, nam tenetur pariatur! Expedita,
                tempora? Voluptatum veniam harum distinctio?
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
        <div class="col">
          <div class="card h-100">
            <img src="../img/8.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Doloremque</h5>
              <p class="card-text">
                Doloremque laboriosam harum reiciendis molestiae aliquid a
                incidunt, excepturi autem voluptas iure at velit. Incidunt
                modi hic perspiciatis temporibus quos sapiente tempora magnam.
                Esse odit adipisci molestiae deserunt, harum quae autem quam
                impedit minima quibusdam quia maxime neque quos! Commodi autem
                earum amet architecto odit, consequuntur provident rem?
                Dolorum hic ullam officia repellat porro?
              </p>
            </div>

            <div class="card-footer">
              <small class="text-muted">Цена: <del>3000 &#8381;</del>
                <span class="price-discount">
                  <?php
                  echo getDiscound(3100);
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