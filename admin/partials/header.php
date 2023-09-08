<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="../index.php">Stock - Administration</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Tableau de bord</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Gestion des produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="members.php">Gestion des membres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Gestion des messages</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['login'] ?>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../index.php">Retour au site</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="dashboard.php?deco=ok">Déconnexion</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

