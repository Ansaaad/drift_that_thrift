<nav class="navbar navbar-expand-md">
      <div class="container-fluid">
        <img src="../assests/logo.png" alt="logo">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
        <?php
                  if(isset($_SESSION["aid"])){							
                  ?>
                  <a class="nav-link" href="./logout.php">Logout</a>
                  <?php
                  }
                  else{
                    ?>
          <a class="nav-link" href="./admin_login.php">Signup/Login</a>
        </li>
        <?php
        }
        ?>
            
          </ul>
        </div>
      </div>
    </nav>