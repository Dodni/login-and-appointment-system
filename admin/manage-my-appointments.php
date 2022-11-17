<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['workid']))
{
$adminid=$_GET['workid'];
echo $adminid;
$msg=mysqli_query($con,"delete from work where `work`.`workid` ='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}

// for set payed
if(isset($_GET['payed']))
{
$adminid=$_GET['payed'];
echo $adminid;
$msg=mysqli_query($con,"UPDATE `work` SET `payed` = '1' WHERE `work`.`workid` = '$adminid'");
if($msg)
{
echo "<script>alert('Method changed for payed');</script>";
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
        <title>Manage My Appointments | Registration and Login System</title>
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
                        <h1 class="mt-4">Manage My Appointments</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage my appointments</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registered Appointments
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                          <th>WorkID</th>
                                          <th>Work Date</th>
                                          <th>Work Time Start</th>
                                          <th>Appointment Free</th>
                                          <th>Working Hours</th>
                                          <th>Description</th>
                                          <th>Payed?</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>WorkID</th>
                                          <th>Work Date</th>
                                          <th>Work Time Start</th>
                                          <th>Appointment Free</th>
                                          <th>Working Hours</th>
                                          <th>Description</th>
                                          <th>Payed?</th>
                                          <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                              <?php
                              require_once('../models/work_model.php');
                              $workModel = new Work();
                              $result = $workModel->getWorkData();
                              foreach ($result as $key => $value) {
                              ?>
                              <tr>
                                  <td><?php echo $value["workid"];?></td>
                                  <td><?php echo $value["workdate"];?></td>
                                  <td><?php echo $value["worktimestart"];?></td>
                                  <td><?php echo ($value["appointmentfree"] == 1) ? "Yes": "No";?></td>
                                  <td><?php echo $value["workinghour"];?></td>
                                  <td><?php echo $value['description'];?></td>
                                  <td>
                                    <?php echo ($value["payed"] == 1) ? "Yes": "No";?>
                                  </td>
                                  <td>
                                     <a href="user-profile.php?uid=<?php echo $row['id'];?>"><i class="fas fa-edit"></i></a>
                                     <a href="manage-my-appointments.php?payed=<?php echo $value['workid'];?>" onClick="return confirm('Do you really want to set payed?');"><i class="fas fa-thumbs-up" aria-hidden="true"></i></a>
                                     <a href="manage-my-appointments.php?workid=<?php echo $value['workid'];?>" onClick="return confirm('Do you really want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </td>
                              </tr>
                              <?php
                                  }
                               ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
  <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
