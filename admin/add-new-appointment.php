<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

//Code for Updation
if(isset($_POST['post']))
{
    $workdate=$_POST['workdate'];
    $worktimestart=$_POST['worktimestart'];
    $appointmentfree=$_POST['appointmentfree'];
    $workinghour=$_POST['workinghour'];
    $description=$_POST['description'];
    $payed=$_POST['payed'];
    $studentid=$_POST['studentid'];

    $studentid = !empty($studentid) ? "'$studentid'" : "NULL";


    $msg=mysqli_query($con,"INSERT INTO work (`workdate`, `worktimestart`, `appointmentfree`, `workinghour`, `description`, `payed`, `studentid`) VALUES ('$workdate','$worktimestart','$appointmentfree','$workinghour','$description','$payed',$studentid)");

if($msg)
{
  echo "<script>alert('The appointment updated successfully');</script>";
  echo "<script type='text/javascript'> document.location = 'manage-my-appointments.php'; </script>";
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


                        <h1 class="mt-4">Add new free appointment</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Date of work</th>
                                       <td><input class="form-control" id="workdate" name="workdate" type="date" value="" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Work time starts </th>
                                       <td><input class="form-control" id="worktimestart" name="worktimestart" type="time" value=""  required /></td>
                                   </tr>
                                         <tr>
                                       <th>Appointment is free</th>
                                       <td colspan="3">
                                         <select name="appointmentfree" id="appointmentfree">
                                           <option value="1">Yes</option>
                                           <option value="0">No</option>
                                        </select>
                                   </tr>
                                   <tr>
                                       <th>Working hours</th>
                                       <td colspan="3"><input class="form-control" id="workinghour" name="workinghour" type="number" value="1" required/></td>
                                   </tr>
                                   <tr>
                                       <th>Description</th>
                                       <td colspan="3"><input class="form-control" id="description" name="description" type="text" value=""/></td>
                                   </tr>
                                   <tr>
                                       <th>Payed ?</th>
                                       <td colspan="3">
                                         <select name="payed" id="payed">
                                           <option value="0">No</option>
                                           <option value="1">Yes</option>
                                        </select>
                                       </td>
                                   </tr>
                                   <tr>
                                       <th>Student ID</th>
                                       <td colspan="3"><input class="form-control" id="studentid" name="studentid" type="" value=""/></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="post">Create</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
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
