<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    
    <?php if(isLoggedIn()){
      echo '
          <a href="logout.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
          </a>
      ';
    } ?>
          
        
  </div>
</nav>