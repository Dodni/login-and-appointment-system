<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Profile | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

<?php
$workid=$_GET['workid'];
$query=mysqli_query($con,"select * from work where workid='$workid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['workid'];?>th work</h1>
                        <div class="card mb-4">

                            <div class="card-body">
                                <a href="edit-appointment.php?workid=<?php echo $result['workid'];?>">Edit</a>
                                <table class="table table-bordered">
                                   <tr>
                                     <th>Date of work</th>
                                       <td><?php echo $result['workdate'];?></td>
                                   </tr>
                                   <tr>
                                       <th>Working time starting</th>
                                       <td><?php echo $result['worktimestart'];?></td>
                                   </tr>
                                   <tr>
                                       <th>Appointment is free</th>
                                       <td colspan="3"><?php echo ($result["appointmentfree"] == 1) ? "Yes": "No";?></td>
                                   </tr>
                                   <tr>
                                       <th>Working hours</th>
                                       <td colspan="3"><?php echo $result['workinghour'];?></td>
                                   </tr>
                                    <tr>
                                       <th>Description</th>
                                       <td colspan="3"><?php echo ($result["description"] == NULL) ? "N/A": $result["description"]; echo $result['description'];?></td>
                                   </tr>
                                   <tr>
                                      <th>Payed ?</th>
                                      <td colspan="3"><?php echo ($result["payed"] == 1) ? "Yes": "No";?></td>
                                  </tr>
                                  <tr>
                                     <th>Student ID</th>
                                     <td colspan="3"><a href="user-profile.php?uid=<?php echo $result["studentid"] ?>"><?php echo ($result["studentid"] == NULL) ? "N/A": $result["studentid"];?></a></td>
                                 </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
<?php } ?>

                    </div>
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
