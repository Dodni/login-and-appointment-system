<?php

/**
 * Model class for communicate with the database.
 */
class Work
{

  function __construct()
  {


  }

  function getWorkData()
  {
    require_once('includes/config.php');


    $result = $mysqli->query("SELECT * FROM work");

    $rows = $result->fetch_all(MYSQLI_ASSOC);

    //var_dump($rows);

    return $rows;
  }
}


?>
