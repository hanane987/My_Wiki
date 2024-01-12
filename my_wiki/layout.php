<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="View/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets\styles.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-l5f4ATxshWw4zsEi7cZHNLp5eeIop2z+nyLSbgOmIB8ThM66LszZfem6w1j3UwFwTG5llScY8qZz86lXg+4ppA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Mywiki</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
     <?php
     require_once "view\sideNav.php";
     ?>
  
        <div id="page-content-wrapper">
            <div class="container-fluid px-4">
           
            <?php
    //  require_once "view\lo.php";
     ?>
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Dashboard</h3>
                    <div class="col">
                    <?php 
                    echo $content;
                    ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

  
</body>

</html>
