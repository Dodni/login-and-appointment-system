<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

//Code for Updation
if(isset($_POST['update']))
{
    $workdate=$_POST['workdate'];
    $worktimestart=$_POST['worktimestart'];
    $appointmentfree=$_POST['appointmentfree'];
    $workinghour=$_POST['workinghour'];
    $description=$_POST['description'];
    $payed=$_POST['payed'];
    $studentid=$_POST['studentid'];

    $studentid = !empty($studentid) ? "'$studentid'" : "NULL";


$workid=$_GET['workid'];
    $msg=mysqli_query($con,"update work set workdate='$workdate',worktimestart='$worktimestart',appointmentfree='$appointmentfree', workinghour='$workinghour', description='$description', payed='$payed', studentid=$studentid where workid='$workid'");

    echo "<br>";
    echo $msg;
    var_dump($msg );

if($msg)
{
  //echo "<script>alert('Profile updated successfully');</script>";
  //echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
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
        <title>Edit Profile | Registration and Login System</title>
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
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Date of work</th>
                                       <td><input class="form-control" id="workdate" name="workdate" type="date" value="<?php echo $result['workdate'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Working time starting </th>
                                       <td><input class="form-control" id="worktimestart" name="worktimestart" type="time" value="<?php echo $result['worktimestart'];?>"  required /></td>
                                   </tr>
                                         <tr>
                                       <th>Appointment is free</th>
                                       <td colspan="3">
                                         <select name="appointmentfree" id="appointmentfree">
                                           <option value="<?php echo ($result["appointmentfree"] == 1) ? "1": "0";?>"><?php echo ($result["appointmentfree"] == 1) ? "Yes": "No";?></option>
                                           <option value="<?php echo ($result["appointmentfree"] == 0) ? "1": "0";?>"><?php echo ($result["appointmentfree"] == 0) ? "Yes": "No"; ?></option>
                                        </select>
                                   </tr>
                                   <tr>
                                       <th>Working hours</th>
                                       <td colspan="3"><input class="form-control" id="workinghour" name="workinghour" type="number" value="<?php echo $result['workinghour'];?>" required/></td>
                                   </tr>
                                   <tr>
                                       <th>Description</th>
                                       <td colspan="3"><input class="form-control" id="description" name="description" type="text" value="<?php echo $result['description'];?>"/></td>
                                   </tr>
                                   <tr>
                                       <th>Payed ?</th>
                                       <td colspan="3">
                                         <select name="payed" id="payed">
                                           <option value="<?php echo ($result["payed"] == 1) ? "1": "0";?>"><?php echo ($result["payed"] == 1) ? "Yes": "No";?></option>
                                           <option value="<?php echo ($result["payed"] == 0) ? "1": "0";?>"><?php echo ($result["payed"] == 0) ? "Yes": "No"; ?></option>
                                        </select>
                                       </td>
                                   </tr>
                                   <tr>
                                       <th>Student ID</th>
                                       <td colspan="3"><input class="form-control" id="studentid" name="studentid" type="" value="<?php echo $result['studentid'];?>"/></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
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
