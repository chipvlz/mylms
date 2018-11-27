
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?></title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Jura'>
  <style>
    .logo-font { font-family: 'Jura', sans-serif; }
    html { height: 100%; }
    body { min-height: 100%; }
  </style>
</head>
<body>
  <nav class="navbar is-primary" role="navigation" aria-label="main-navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item is-size-4 has-text-weight-bold logo-font" href="#">
          <?php echo $site_name; ?>
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarLinks">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </nav>
