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
      <h1>Dolor</h1>
      <p>
        Inventore optio repudiandae corrupti cum necessitatibus vero minima
        cupiditate explicabo consequuntur vel doloremque voluptatibus ex
        maxime dolorem nobis accusamus sequi harum nesciunt pariatur similique
        eveniet, temporibus, quod quaerat. Ipsam eius nostrum similique
        labore, harum excepturi voluptatibus autem vitae ratione optio! Libero
        praesentium alias, perspiciatis, ab nam voluptates omnis earum facilis
        quidem maxime hic aut architecto dolorum soluta fugit ex itaque facere
        nobis quibusdam molestiae dolores autem dolorem. Quasi maiores sit
        quibusdam, quidem voluptates nisi deserunt, non quisquam nostrum error
        provident odit eveniet doloremque delectus vero, harum perferendis
        voluptatem expedita inventore ipsa. Totam ad provident eaque culpa
        harum, dolorem quas id consequatur commodi accusantium omnis veniam
        odio fuga, aut ea itaque recusandae, expedita deleniti reprehenderit
        atque!
      </p>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="../img/10.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Neque hic</h5>
              <p class="card-text">
                Ad ipsum neque hic repellat maxime sequi sed dignissimos
                sapiente eos inventore quos, laborum dolore voluptatibus
                fugiat odio provident ab atque pariatur animi! Aut numquam
                facilis optio eius, laborum totam recusandae cupiditate
                asperiores? Dolore impedit ducimus sequi, recusandae quibusdam
                quidem quos tempore numquam sint laboriosam? Praesentium
                officia accusantium vel et alias laborum atque sint temporibus
                ex accusamus, dolores suscipit!
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
            <img src="../img/16.jpg" class="card-img-top" alt="pic" />
            <div class="card-body">
              <h5 class="card-title">Esse officia</h5>
              <p class="card-text">
                Esse officia quis alias quisquam soluta et laborum corporis
                ratione debitis. Error ullam cumque suscipit soluta iusto
                ipsam impedit culpa. Maxime sit placeat exercitationem
                suscipit cupiditate, quidem modi repellendus, illo non, eaque
                nihil. Numquam eos nam fugiat, hic delectus alias temporibus
                iste ducimus, impedit enim nisi omnis dolore nulla sed! Est
                natus nostrum labore suscipit quam illo mollitia fuga dolorum
                tempora, dolores accusamus totam! Amet repudiandae veritatis
                modi impedit natus doloribus alias voluptates, ut mollitia
                necessitatibus, pariatur minima dignissimos! Dolorum ipsum
                modi, eum deserunt praesentium facere minima unde, fugit cum
                libero molestias?
              </p>
            </div>

            <div class="card-footer">
              <small class="text-muted">Цена: <del>2700 &#8381;</del>
                <span class="price-discount">
                  <?php
                  echo getDiscound(2700);
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