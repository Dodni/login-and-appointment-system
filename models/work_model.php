<?php

/**
 * Model class for communicate with the database.
 */
class Work_model
{

  function __construct()
  {


  }

  function getWorkData()
  {
    include_once('includes/config.php');
    $sql = "SELECT * FROM `work`";
    $result = mysqli_query($con,$sql);
    // Numeric array
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    // Associative array
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // printf ("%s (%s)\n", $row[0], $row[1]);
    //var_dump($row);
    return $row;
  }
}


?>
