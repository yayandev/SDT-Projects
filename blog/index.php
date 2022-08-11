<?php
require '../admin/sistem/query.php';

$allpost = query("SELECT * FROM postingan");
$allkategori = query("SELECT * FROM kategori");

$news = query("SELECT * FROM postingan ORDER BY id DESC");
?>



<!DOCTYPE HTML>
<html>
<head>
  <title>SDT Projects | Blog</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale°1">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/arial.js"></script>
  <script type="text/javascript" src="js/cuf_run.js"></script>
</head>

<body>
  <!-- START PAGE SOURCE -->
  <div class="main">
    <div class="header">
      <div class="header_resize">
        <div class="logo">
          <h1><a href="index.html"><span>SDT</span>Projects <small>Blog</small></a></h1>
        </div>
        <div class="menu_nav">
          <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="../index.html">About Us</a></li>
            <li><a href="../login.php">Login</a></li>
            <li><a href="../register.php">Join</a></li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="hbg">&nbsp;</div>
    <div class="content">
      <div class="content_resize">
        <div class="mainbar">
          <?php foreach ($allpost as $post) ?>
          <div class="article">
            <h2><span><?= $post['title']; ?></span></h2>
            <div class="clr"></div>
            <p><span class="date"><?= $post['date']; ?></span> &nbsp;|&nbsp; Posted by <a href="#"><?= $post['author']; ?></a> &nbsp;|&nbsp; Kategori <a href="#"><?= $post['kategori']; ?></a>
              <img src="../admin/images-post/<?= $post['images']; ?>"  alt="" />
            <p><?= $post['deskripsi']; ?></p>
            <p class="spec"><a href="#" class="rm">Read more</a> &nbsp;|&nbsp; </p>
          </div>

        </div>
        <div class="sidebar">
          <div class="gadget">
            <h2 class="star"><span>Kategori</span></h2>
            <div class="clr"></div>
            <ul class="sb_menu">
              <?php foreach ($allkategori as $kategori) : ?>
                <li><a href="#"><?= $kategori['kategori']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="gadget">
            <h2 class="star"><span>Terbaru</span></h2>
            <div class="clr"></div>
            <ul class="ex_menu">
              <?php foreach ($news as $post) : ?>
                <li><a href="#"><?= $post['title']; ?></a><br />
                  <?= $post['author']; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="fbg">
      <div class="fbg_resize">
        <div class="col c1">
          <h2><span>About</span></h2>
          <img src="images/logo.png" width="56" height="56" alt="" />
          <p>SDT Projects ialah sebua team atau komunitas Programming web develovment <br> <a href="#">Learn more...</a></p>
        </div>
        <div class="col c2">
          <h2><span>Sosial media</span></h2>
          <ul class="sb_menu">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Github</a></li>
            <li><a href="#">Whatshapp</a></li>
          </ul>
        </div>
        <div class="col c3">
          <h2>Contact</h2>
          <p>SDT Adalah singakat dari student jadi SDT Projects adalah student projects</p>
          <p><a href="mailto:sdtprojects20@gmail.com">sdtprojects20@gmail.com</a></p>
          <p><a href="http:wa.me/6283873614764">+64 (838) 7361-4764</a></p>
          <p>Address: Indonesia</p>
        <div class="clr"></div>
      </div>
    </div>
    <div class="footer">
      <div class="footer_resize">
        <p class="lf">Copyright &copy; 2022 <a href="mailto:yayanfathurohma20@gmail.com">Yanz</a> - All Rights Reserved</p>
        <p class="rf"></p>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</body>

</html>