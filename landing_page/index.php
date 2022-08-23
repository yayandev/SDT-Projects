<?php
require '../admin/sistem/query.php';

$allmember = query("SELECT * FROM multi_user");
$allproject = query("SELECT * FROM postingan LIMIT 0, 3");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
  <title>SDT Projects</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="css/responsive.css">
  <!-- <link rel="stylesheet" href="css/animasi.css"> -->
  <!-- Swiper JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body id="induk">
  <!-- start header -->
  <header style="height: 100vh;">
    <div class="container-fluid fixed-top navBar">
      <div class="row">
        <div class="container p-0 col-lg-11">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid mt-2 col-12">
              <a class="navbar-brand logo" href="#"><span class="fw-bold">SDT</span> Project</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end canvasResponContainer" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <a class="navbar-brand offcanvas-title logo" href="#" id="offcanvasNavbarLabel"><span class="fw-bold">STD</span> Project</a>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-2">
                      <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item me-2">
                      <a class="nav-link" href="#">Project</a>
                    </li>
                    <li class="nav-item me-2">
                      <a class="nav-link" href="#">Team</a>
                    </li>
                    <li class="nav-item me-2">
                      <a class="nav-link" href="#">Kontak</a>
                    </li>
                  </ul>
                  <div style="display: flex;">
                    <div class="d-flex justify-content-center align-items-center me-2">
                      <a href="../login.php" class="btn text-white fw-semibold" style="border: none !important;
                      font-size: 1.2vmax !important;
                      border-radius: .5em !important;
                      background: var(--blue) !important;">Login</a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center ms-4">
                      <div class="toggle">
                        <div class="circle"></div>
                        <div class="toggle-moon"><i class="fa-solid fa-moon"></i></div>
                        <div class="toggle-sun"><i class="fa-solid fa-sun"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- end header -->

    <!-- intro -->
    <!-- animate__animated animate__fadeInLeft -->
    <div class="container-fluid" style="height: 100vh;">
      <div class="row background">
        <div class="container col-10  p-0 d-flex align-items-center responsiveIntro" style="height: 100vh;">
          <!-- <div class="row "> -->
          <div class="col-6 d-flex align-items-center childResponIntro">
            <div class="intro">
              <h1>Membangun pengalaman bekerja secara team.</h1>
              <p>Ada kekuatan yang sangat besar ketika sekelompok orang dengan minat yang sama berkumpul untuk bekerja menuju tujuan yang sama.</p>
              <div>
                <button class="btn buttonJoin">Gabung sekarang <i class="fa-solid fa-arrow-right"></i></button>
              </div>
            </div>
          </div>
          <div class="col-6 position-relative childResponIntro2">
            <div class="d-flex justify-content-center imageIntro">
              <img src="assest/gambar/team.png">
            </div>
            <div class="canvasIntro">
              <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="rgb(240,242,245)" d="M29.1,-41.5C41.1,-43.4,56.6,-42.5,66.4,-35.2C76.2,-27.8,80.1,-13.9,73.4,-3.9C66.7,6.2,49.4,12.3,42.9,25.4C36.4,38.4,40.8,58.4,35.5,63.3C30.1,68.2,15.1,58.1,3,52.9C-9.1,47.8,-18.2,47.5,-28.6,45.5C-38.9,43.5,-50.6,39.7,-58,31.9C-65.3,24,-68.4,12,-67.7,0.4C-66.9,-11.2,-62.5,-22.3,-55,-30C-47.5,-37.6,-36.9,-41.6,-27.3,-41.1C-17.6,-40.5,-8.8,-35.4,-0.1,-35.1C8.5,-34.9,17,-39.5,29.1,-41.5Z" transform="translate(68 95)" />
              </svg>
            </div>
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </header>
  <!-- end intro -->
  <!-- Main -->
  <main>
    <!-- <div class="container-fluid"> -->
    <!-- <div class="container"> -->
    <div class="container-fluid containerNotification">
      <div class="container">
        <article class="d-flex flex-column align-items-center article1 justify-content-evenly" style="height: 100%;">
          <div class="text-center notificationAbout">
            <h1 class="mb-0 fw-bold">Team Work</h1>
            <p class="mb-0 m-auto">Kerja tim adalah cara orang biasa untuk mencapai tujuan yang luar biasa.</p>
          </div>
          <div class="d-flex justify-content-center">
            <div class="bgCardMain">
              <div class="d-flex justify-content-center mb-4">
                <i class="fa-solid fa-pen-ruler"></i>
              </div>
              <div class="p-0">
                <h5 class="text-center">UI/UX Desain</h5>
              </div>
            </div>
            <div class="bgCardMain">
              <div class="d-flex justify-content-center mb-4">
                <i class="fa-solid fa-laptop-code"></i>
              </div>
              <div class="p-0">
                <h5 class="text-center">Development</h5>
              </div>
            </div>
            <div class="bgCardMain">
              <div class="d-flex justify-content-center mb-4">
                <i class="fa-brands fa-github-alt"></i>
              </div>
              <div class="p-0">
                <h5 class="text-center">Open Source</h5>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
    <!-- Bagian About -->
    <div class="container-fluid containerAbout">
      <div class="container p-0">
        <article class="row  about">
          <div class="col-6 aboutCol">
            <div class="rounded aboutImg">
              <img src="assest/gambar/team3.jpeg" class="rounded" style="width: 100%;">
            </div>
          </div>
          <div class="col-6 aboutConText">
            <div class="aboutText">
              <h1>About</h1>
              <span class="aboutSpan"></span>
            </div>
            <div class="aboutParaf">
              <p>Kerja tim adalah kemampuan untuk bekerja sama menuju visi bersama. Kemampuan untuk mengarahkan pencapaian individu ke arah tujuan organisasi. Ini adalah bahan bakar yang memungkinkan orang biasa untuk mencapai hasil yang tidak biasa</p>
            </div>
          </div>
        </article>
      </div>
    </div>
    <!-- Akhir About -->
    <!-- Awal Project -->
    <article class="container-fluid p-2 project">
      <div class="container p-0">
        <div class="projectJudul position-relative">
          <h1>Team Project</h1>
          <a href="../blog/index.php" class="btn btn-primary opacity-50 btn-sm">Selengkapnya</a>
        </div>
        <div class="row justify-content-between container m-auto p-0 mt-5 text-center conProject">
          <?php foreach ($allproject as $project) : ?>
            <div class="card col-2 mb-3 p-0 rounded-0 cardProject">
              <img src="assest/gambar/team5.jpg" class="card-img-top rounded-0" alt="...">
              <div class="card-body">
                <h5 class="card-title m-auto"><?= $project['title']; ?></h5>
                <a href="../blog/index.php" class="btn btn-primary opacity-50 mt-3">Lihat</a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      </div>
    </article>
    <!-- Akhir Project -->
    <!-- Awal Team -->
    <article class="container-fluid d-flex align-items-center containerTeam">
      <div class="container p-0">
        <div class="teamJudul position-relative">
          <h1>Team</h1>
          <span></span>
        </div>
        <div class="swiper mySwiper mt-5 containerSwiperTeam" style="height: 22em;">
          <div class="swiper-wrapper">
            <?php foreach ($allmember as $member) : ?>
              <div class="swiper-slide d-flex justify-content-start cardTeam1" style="background: transparent !important;">
                <div class="card border-0" style="background: transparent !important;">
                  <figure class="teamImage">
                    <img src="../admin/images-post/<?= $member['img']; ?>" class="card-img-top" alt="..." height="300px">
                  </figure>
                  <div class="card-body p-0 cardTeam">
                    <h5 class="card-title"><?= $member['username']; ?></h5>
                    <p class="">Programmer</p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </article>
    <!-- Akhir Team -->
    <!-- Awal Kontak -->
    <article class="container-fluid d-flex align-items-center kontak">
      <div class="container p-0">
        <div class="kontakH1 position-relative">
          <h1>Kontak</h1>
          <span></span>
        </div>
        <div class="row d-flex justify-content-center align-items-center mt-4 formKontak" style="height: 100%;">
          <form class="col-6 position-relative">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="fa-solid fa-circle-check me-1"></i>
              <strong>Success!</strong> Data berhasil dikirim!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show dangerKontak" role="alert">
              <i class="fa-solid fa-triangle-exclamation me-1"></i>
              <strong>Gagal!</strong> Data tidak berhasil dikirim!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="mb-4 mt-3 position-relative name">
              <input type="text" class="form-control nameKontak" id="name" name="name" required>
              <label for="name" class="">Nama</label>
              <div class="iconNama">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-xmark"></i>
              </div>
              <div class="cekNama">
                <span>Min 3 huruf</span>
              </div>
            </div>
            <div class="mb-4 position-relative email">
              <input type="text" class="form-control emailKontak" id="email" name='email' required>
              <label for="email" class="">Email</label>
              <div class="iconEmail">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-xmark"></i>
              </div>
              <div class="cekEmail">
                <span>Email Salah!</span>
              </div>
            </div>
            <div class="mb-4 position-relative textarea">
              <textarea type="text" class="form-control" id="komentar" name='komentar' required></textarea>
              <label for="komentar" class="form-label">Keterangan</label>
            </div>
            <button type="submit" class="btn text-white mt-3 ms-0 buttonSend button1">Submit</button>
            <button class="btn text-white mt-3 ms-0 buttonSend button2" type="submit" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
            </button>
          </form>
          <div class="col-5 m-auto pengantarKontak">
            <p class="fs-3 text-center fst-italic">Hubungi kami untuk proses pembuatan akun.</p>
          </div>
        </div>
      </div>
    </article>
    <!-- Akhir Kontak -->
  </main>
  <footer>
    <div class="container text-center d-flex justify-content-center">
      <p class="m-auto">ImronMan &copy; SDT Project</p>
    </div>
  </footer>
  <!-- Akhir Main -->
  <script src="../js/bootstrap.bundle.min.js"></script>
  <!-- Jquery -->
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <!-- Index JS -->
  <script src="js/index.js"></script>
</body>

</html>