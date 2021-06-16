<header>
    <div style="padding-bottom: 60px;">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand" href="#">
                    <h4>H O S P I T A L &nbsp; &nbsp; M A N A G E M E N T</h4>
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="navbar-nav">
                    <span class="nav-link" style="color : white;">Logged in as</span>
                    <a class="nav-link" style="color : white;" aria-current="page" href="">
                      <?php
                        if($_SESSION['user_types'] == 'super_admin')
                        {
                         	echo $_SESSION['name'];
                        }
                        elseif($_SESSION['user_types'] == 'admin')
                        {
                            echo $_SESSION['name'];
                        }
                        elseif($_SESSION['user_types'] == 'doctor')
                        {
                            echo $_SESSION['name'];
                        }
                        elseif($_SESSION['user_types'] == 'patient')
                        {
                            echo $_SESSION['name'];
                        }
                      ?>
                     </a>
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </div>
            </div>
          </div>
        </nav>
    </div>
</header>
