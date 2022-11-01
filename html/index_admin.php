<?php
error_reporting(0);
?>
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
        </span>

      </h3>
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
      <h2 class="dash-title">Admin Anasayfa</h2>

      <!--cards-->

      <?php
      require('../php/db.php');
      // Form gönderildiğinde, değerleri veritabanına ekleyin.
      if (isset($_REQUEST['gorev_id'])) {
        // ters eğik çizgileri kaldırır
        $gorev_id = stripslashes($_REQUEST['gorev_id']);
        //bir dizedeki özel karakterlerden kaçar
        $gorev_id = mysqli_real_escape_string($con, $gorev_id);

        $gorev = stripslashes($_REQUEST['gorev']);
        $gorev = mysqli_real_escape_string($con, $gorev);

        $personel = stripslashes($_REQUEST['personel']);
        $personel = mysqli_real_escape_string($con, $personel);


        $tarih = stripslashes($_REQUEST['tarih']);
        $tarih = mysqli_real_escape_string($con, $tarih);

        $query    = "INSERT into `gorev` (gorev_id, gorev, per_id, gorev_tarih)
                     VALUES ('" . $gorev_id . "', '" . $gorev . "','" . $personel . "','" . $tarih . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
          header("Location: ../html/index_admin.php");
        } else {
          echo "<div class='form'>
                  <h3>Gerekli Alanlar Eksik Tekar Dene.</h3><br/>
                  <p class='link'>Buraya Tıkla <a href='index_admin.php'>Tekrar Dene</a> .</p>
                  </div>";
        }
      } else {
      ?>


        <section class="recent">
          <div class="activity-grid">
            <div class="activity-card">
              <h3 style="text-align: center;">Görev Ekle</h3>
              <form action="" method="post" id="survey-form">


                <div id="form-group">
                  <label id="email-label" for="email">Görev ID: </label>
                  <input class="form-control" type="number" name="gorev_id" id="gorev_id" required placeholder="Görev İd giriniz">
                </div>

              <div id="form-group">
                <label id="email-label" for="password">Görev Giriniz: </label>
                <input class="form-control" type="text" name="gorev" id="gorev" required placeholder="Görevi Giriniz">
              </div>

              <div id="form-group">
                <label id="email-label" for="password">Personel ID: </label>
                <input class="form-control" type="number" name="personel" id="personel" required placeholder="Personel İd Giriniz">
              </div>

              <div id="form-group">
                <label id="email-label" for="password">Defolu Adeti: </label>
                <input class="form-control" type="date" name="tarih" id="tarih" required placeholder="Görev Tarihi Giriniz">
              </div>

                <div id="form-group">
                  <button id="submit" class="submit-button" type="submit" name="submit" value="Register">
                    Görev Ekle
                </div>

              </form>
            </div>
            <?php
            }
              ?>


            <?php
            require('../php/db.php');
            // Form gönderildiğinde, değerleri veritabanına ekleyin.
            if (isset($_REQUEST['gorevid'])) {
              $gorev_id = stripslashes($_REQUEST['gorevid']);
              $gorev_id = mysqli_real_escape_string($con, $gorev_id);


              $query    = "DELETE FROM gorev
        WHERE gorev.gorev_id = '" . $gorev_id . "';";
              $result   = mysqli_query($con, $query);
              if ($result) {
                header("Location: ../html/index_admin.php");
              } else {
                echo "<div class='form'>
                  <h3>Maalesef silinemedi.</h3><br/>
                  <p class='link'>Buraya Tıkla <a href='index_admin.php'>Tekrar Dene</a> </p>
                  </div>";
              }
            } else {
            ?> 
              <div class="activity-card">
                <h3 style="text-align: center;">Görev Sil</h3>
                <form action="" method="post" id="survey-form">

                  <div id="form-group">
                    <label id="email-label" for="email">Görev ID: </label>
                    <input class="form-control" type="number" name="gorevid" id="gorevid" required placeholder="Görev İd Giriniz">
                  </div>
                  <div id="form-group">
                    <button id="submit" class="submit-button" type="submit" name="submit" value="Register">
                      Görev Sil
                  </div>

                </form>
            
            <?php
          }
            ?>
              </div>
          </div>
          <div class="activity-grid">
            <div class="activity-card">
              <h3>Eklenen Görevler</h3>
              <table>
                <tr>
                  <th>Görev Adı</th>
                  <th>Görev ID</th>
                  <th>Personel Adı</th>
                  <th>Personelin Departmanı</th>
                  <th>Görev Tarihi</th>
                </tr>

                <?php
                include("../php/db.php");

                if ($con) {
                  $query = mysqli_query($con, "SELECT concat(personel.per_ad,' ',personel.per_soyad) as personel_ad_soyad , 
                gorev.gorev_id , gorev.gorev , departman.departman_adi , gorev.gorev_tarih
                FROM personel , gorev ,departman
                WHERE gorev.per_id = personel.per_id AND personel.departman_id = departman.departman_id;");
                  if (mysqli_num_rows($query) > 0) {
                    while ($rows = mysqli_fetch_array($query)) { ?>
                      <tr bgcolor='#ffffff'>
                        <td><?php echo $rows['gorev'] ?></td>
                        <td><?php echo $rows['gorev_id'] ?></td>
                        <td><?php echo $rows['personel_ad_soyad'] ?></td>
                        <td><?php echo $rows['departman_adi'] ?></td>
                        <td><?php echo $rows['gorev_tarih'] ?></td>

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
              <h3>Silinen Görevler</h3>
              <table>
                <tr>
                  <th>Silinen Görev Adı</th>
                  <th>Silinen Görev ID</th>
                  <th>Personelin İd si</th>
                  <th>Görev Tarihi</th>
                  <th>Silinme tarihi</th>

                </tr>

                <?php
                include("../php/db.php");

                if ($con) {
                  $query = mysqli_query($con, "SELECT silinen_gorev_kaydi.gorev_id , 
                silinen_gorev_kaydi.gorev  , silinen_gorev_kaydi.per_id , silinen_gorev_kaydi.gorev_tarih , silinen_gorev_kaydi.silinme_tarih
                FROM silinen_gorev_kaydi
                order by silinen_gorev_kaydi.gorev_id desc limit 11
                ;");
                  if (mysqli_num_rows($query) > 0) {
                    while ($rows = mysqli_fetch_array($query)) { ?>
                      <tr bgcolor='#ffffff'>
                        <td><?php echo $rows['gorev'] ?></td>
                        <td><?php echo $rows['gorev_id'] ?></td>
                        <td><?php echo $rows['per_id'] ?></td>
                        <td><?php echo $rows['gorev_tarih'] ?></td>
                        <td><?php echo $rows['silinme_tarih'] ?></td>

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