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
        <h2 class="dash-title">Todo & Pomodoro </h2>

        <!--cards-->
        

        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Pomodoro Zamanlayıcısı</h3>
                    <div id="container">
                      <p id="work" class="label">Çalışma:</p><p id="break" class="label">Mola:</p><p id="cycles" class="label">Döngü:</p>
                      <!--Work Timer-->
                      <div id="work-timer" class="timer">
                          <p id="w_minutes">25</p><p class="semicolon">:</p><p id="w_seconds">00</p>
                      </div>
              
                      <!--Cycle Counter-->
                      <p id="counter" class="timer">0</p>
              
                      <!--Break Timer-->
                      <div id="break-timer" class="timer">
                          <p id="b_minutes">05</p><p class="semicolon">:</p><p id="b_seconds">00</p>
                      </div>
                      <button id="start" class="btn">Başla</button>
                      <button id="stop" class="btn">Durdur</button>
                      <button id="reset" class="btn">Sıfırla</button>
                  </div>
                </div>

                <div class="activity-card">
                  <h3 style="text-align: center;">To Do - Görev Takip</h3>
                  <div class="container">
                    <input id="inputField" type="text"><button id="addToDo">+</button>
                    <div class="to-dos" id="toDoContainer">
                    </div>
                </div>
                </div>
            </div>
          </div>
        </section>
      </main>
      
  </div>
  <script src="../js/todo.js"></script>
  <script src="../js/pomodoro.js"></script>
  </body>
</html>
