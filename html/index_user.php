<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/5c2368ed16.js" crossorigin="anonymous"></script>
  <title>Best To Do</title>
  <link rel="stylesheet" href="../css/style.css" />
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
      <h2 class="dash-title">Anasayfa</h2>

      <!--cards-->

      <section class="recent">
        <div class="activity-grid">
          <div class="activity-card">
            <h3>Personel Görev Dağılımı</h3>

            <table>
              <tr>
                <th>Personel Ad Soyad</th>
                <th>Görev ID</th>
                <th>Görev Adı</th>
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
                      <td><?php echo $rows['personel_ad_soyad'] ?></td>
                      <td><?php echo $rows['gorev_id'] ?></td>
                      <td><?php echo $rows['gorev'] ?></td>
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
            <h3>Tamamlanmış Görevler</h3>
            <table>
                <tr>
                  <th>Silinen Görev ID</th>
                  <th>Silinen Görev Adı</th>
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
                order by silinen_gorev_kaydi.gorev_id desc 
                limit 8
                ;");
                  if (mysqli_num_rows($query) > 0) {
                    while ($rows = mysqli_fetch_array($query)) { ?>
                      <tr bgcolor='#ffffff'>
                        <td><?php echo $rows['gorev_id'] ?></td>
                        <td><?php echo $rows['gorev'] ?></td>
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