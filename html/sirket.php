<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/5c2368ed16.js" crossorigin="anonymous"></script>
  <title>Best To Do</title>
  <link rel="stylesheet" href="../css/style.css" />
<style>
   /*Etkinlik*/
   .etkinlik-logo{
    width: 50px;
    height: 50px;
    border-radius:50%;
  }
  /*Etkinlik*/
</style>
</head>

<body>
  <input type="checkbox" id="sidebar-toggle" />
  <!--side bar-->
  <div class="sidebar">
    <!--sidebar-header-->
    <div class="sidebar-header">
      <h3 class="brand">
        <span>
          <img class="logosal" src="../img/logo.png" alt="logo" style="width: 70%;margin-left: 20px;">
        </span></h3>
      <label for="sidebar-toggle" style="cursor: pointer">
        <i class="fa fa-bars"> </i>
      </label>
    </div>

    <!--sidebar-menu-->
    <div class="sidebar-menu">
      <ul>
        <li>
          <a href="../html/index_admin.php">
            <span>
              <i class="fas fa-home fa-lg"> </i>
            </span>
            <span>Anasayfa</span>
          </a>
        </li>
        
        <li>
          <a href="../html/todo.php">
            <span>
              <i class="fas fa-check-square fa-lg"> </i>
            </span>
            <span>To Do</span>
          </a>
        </li>
        <li>
          <a href="../html/sirket.php">
            <span>
              <i class="fas fa-building fa-lg"> </i>
            </span>
            <span>Şirket</span>
          </a>
        </li>

        <li class="sign-out">
          <a href="../php/logout.php">
            <span>
              <i class="fas fa-sign-out-alt fa-lg"> </i>
            </span>
            <span>Çıkış Yap</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!--Main-content-->
  <div class="main-content">
    <!--header-->
    <header>
      <div class="search-wrapper">
        <span>
          <i class="fas fa-search"> </i>
        </span>
        <input id="searchtext" type="text" name="search" placeholder="Search" />
      </div>

      <div class="social-icons">
        <span>
          <i class="far fa-bell"> </i>
        </span>
        <span>
          <i class="far fa-newspaper"> </i>
        </span>
        <div><img src="../img/foto.jpg" alt="" style="width:90%;border-radius: 50%;"> </div>
      </div>
    </header>
    <!--Header Finished-->

    <!--main-->
    <main>
      <h2 style ="color:white;"class="dash-title">Şirket Bilgileri</h2>

      <!--cards-->

      <section class="recent">
        <div class="activity-grid">
          <div class="activity-card">
            <h3 style="text-align: center;"><i class="fas fa-hotel"></i> Otel Sahipleri</h3>
            <table>
              <tr>
                <th>İsim Soyisim</th>


              </tr>

              <?php
              include("../php/db.php");

              if ($con) {
                $query = mysqli_query($con, "SELECT concat(personel.per_ad,' ',personel.per_soyad) as personel_ad_soyad 
                FROM personel , departman 
                WHERE departman.departman_id = 6 AND personel.departman_id = departman.departman_id;");
                if (mysqli_num_rows($query) > 0) {
                  while ($rows = mysqli_fetch_array($query)) { ?>
                    <tr bgcolor='#ffffff'>
                      <td style="text-align: center;"><i class="fas fa-user-tie"> </i> <?php echo $rows['personel_ad_soyad'] ?></td>

                    </tr>


              <?php

                  }
                } else {
                  echo "<h1>Veri Bulunamadı</h1>";
                }
              } else {
                echo "<h1>Bağlantı Başarısız</h1>";
              }
              ?>
            </table>
          </div>

          <div class="activity-card">
            <h3 style="text-align: center;"><i class="fas fa-concierge-bell"></i> Müdüriyet</h3>
            <table>
              <tr>
                <th>İsim Soyisim</th>


              </tr>

              <?php
              include("../php/db.php");

              if ($con) {
                $query = mysqli_query($con, "SELECT concat(personel.per_ad,' ',personel.per_soyad) as personel_ad_soyad 
                FROM personel , departman 
                WHERE departman.departman_id = 10 AND personel.departman_id = departman.departman_id;");
                if (mysqli_num_rows($query) > 0) {
                  while ($rows = mysqli_fetch_array($query)) { ?>
                    <tr bgcolor='#ffffff'>
                      <td style="text-align: center;"><?php echo $rows['personel_ad_soyad'] ?></td>

                    </tr>


              <?php

                  }
                } else {
                  echo "<h1>Veri Bulunamadı</h1>";
                }
              } else {
                echo "<h1>Bağlantı Başarısız</h1>";
              }
              ?>
            </table>
          </div>
        </div>
        <div class="activity-grid">
          <div class="activity-card">
            <h3 style="text-align: center;"><i class="fas fa-people-arrows"></i> Çalışan Personel Bilgileri</h3>
            <table>
              <tr>
                <th>Personel ID</th>
                <th>Personel Adı ve Soyadı</th>
                <th>Personel Doğum Tarihi</th>
                <th>Personel Departmanı</th>
                <th>Personel Maaşı</th>
              </tr>

              <?php
              include("../php/db.php");

              if ($con) {
                $query = mysqli_query($con, "SELECT personel.per_id , concat(personel.per_ad,' ',personel.per_soyad) as personel_ad_soyad ,personel.p_dg_tarih ,departman.departman_adi , maas.maas_miktar 
                FROM personel , maas , departman 
                WHERE personel.maas_id = maas.maas_id AND departman.departman_id=personel.departman_id
                GROUP BY personel.per_id;");
                if (mysqli_num_rows($query) > 0) {
                  while ($rows = mysqli_fetch_array($query)) { ?>
                    <tr bgcolor='#ffffff'>
                      <td><?php echo $rows['per_id'] ?></td>
                      <td><?php echo $rows['personel_ad_soyad'] ?></td>
                      <td><?php echo $rows['p_dg_tarih'] ?></td>
                      <td><?php echo $rows['departman_adi'] ?></td>
                      <td><?php echo $rows['maas_miktar'] ?></td>
                    </tr>


              <?php

                  }
                } else {
                  echo "<h1>Veri Bulunamadı</h1>";
                }
              } else {
                echo "<h1>Bağlantı Başarısız</h1>";
              }
              ?>
            </table>
          </div>
          <div class="activity-card">
            <h3 style="text-align: center;"><i class="fas fa-hiking"></i> Etkinlik Bilgileri</h3>
            <table>
              <tr>
                <th>Etkinlik Logosu</th>
                <th>Etkinlik ID</th>
                <th>Etkinlik Adı</th>
                <th>Etkinlik Yeri</th>
                <th>Etkinlik Tarihi</th>
                
              </tr>

              <?php
              include("../php/db.php");

              if ($con) {
                $query = mysqli_query($con, "SELECT etkinlikler.etkinlik_id , etkinlikler.etkinlik_adi , etkinlikler.etkinlik_yeri , etkinlikler.etkinlik_tarihi , etkinlikler.logo 
                FROM etkinlikler;");
                if (mysqli_num_rows($query) > 0) {
                  while ($rows = mysqli_fetch_array($query)) { ?>
                    <tr bgcolor='#ffffff'>
                      <td><img class="etkinlik-logo" src="<?php echo $rows['logo'] ?>"></td>
                      <td><?php echo $rows['etkinlik_id'] ?></td>
                      <td><?php echo $rows['etkinlik_adi'] ?></td>
                      <td><?php echo $rows['etkinlik_yeri'] ?></td>
                      <td><?php echo $rows['etkinlik_tarihi'] ?></td>
                    </tr>


              <?php

                  }
                } else {
                  echo "<h1>Veri Bulunamadı</h1>";
                }
              } else {
                echo "<h1>Bağlantı Başarısız</h1>";
              }
              ?>
            </table>
          </div>
        </div>
      </section>
    </main>

  </div>
</body>

</html>