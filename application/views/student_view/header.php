<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('student-register' ) ?>">Registration
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('add-branch' ) ?>">Add Branch
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
      <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('add-department' ) ?>">Add Department
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
      <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('register_list' ) ?>">Listing
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Listing Records</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('branch_list'); ?>">Branch Records</a>
            <a class="dropdown-item" href="<?= base_url('department_list'); ?>">Department Records</a>
            
          </div>
        </li>
      </ul>
      <form class="d-flex">

      


      </form>
    </div>
  </div>
</nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>









