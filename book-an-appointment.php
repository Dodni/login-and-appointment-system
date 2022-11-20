<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

    //Code for Updation
    if(isset($_POST['post']))
    {
        $szallodaselect=$_POST['szallodaselect'];
        $msg=mysqli_query($con,"UPDATE work SET appointmentfree = 0 WHERE workid=$szallodaselect");

    if($msg)
    {
      echo "<script>alert('Congratulation!!!! You booked successfully!!!');</script>";
      echo "<script type='text/javascript'> document.location = 'book-an-appointment.php'; </script>";
    }
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Book an appointment</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/calendar.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/superfish.js"></script>
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Book an appointment</h1>
                        <hr />
                        <div class="" >
                            <div class="justify-content-center m-3">

                              <form class="" action="book-an-appointment.php" method="post">
                                <div id = 'informaciosdiv' class="card-body">
                                  <h3 class="text-center">Free appointments:</h3>
                                  <table class="table table-bordered">
                                    <tr>
                                      <td colspan="3" style="text-align: center; vertical-align: middle;">
                                        <label for='helysegcimke'>Free appointments:</label>
                                        <select class="form-select" id='helysegselect' name="helysegselect"></select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="4" style="text-align: center; vertical-align: middle;">
                                        <label for = 'szalloda'>Course starting time:</label>
                                        <select class="form-select" id='szallodaselect' name="szallodaselect"></select>
                                      </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align:center; vertical-align: middle;"><button type="submit" class="btn btn-primary btn-block" name="post">Book!</button></td>
                                    </tr>
                                  </table>
                                </div>
                              </form>
                              <div class="pb-5">
                                <?php
                                require_once('admin/calendar.php');

                                $calendar = new Calendar("logined");

                                echo $calendar->show();

                                ?>
                              </div>
                            </div>

                        </div>
                        </div>

                        </div>

                        </div>

                    </div>

                </main>
          <?php include('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
