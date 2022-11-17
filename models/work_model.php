<?php

/*
 * Model class for communicate with the database.
 */
class Work
{

  function __construct()
  {

  }

  function getWorkData()
  {
    require_once('../includes/config.php');
    $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $result = $mysqli->query("SELECT * FROM work ORDER BY workdate ASC");

    $rows = $result->fetch_all(MYSQLI_ASSOC);

    //var_dump($rows);

    return $rows;
  }

  function getFreeAppointments()
  {
    require_once('includes/config.php');
    $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $result = $mysqli->query("SELECT * FROM WORK where workdate >= CURDATE() and appointmentfree = 1 ORDER BY workdate ASC");

    $rows = $result->fetch_all(MYSQLI_ASSOC);

    //var_dump($rows);
    $freeAppointmentDates = [];


    foreach ($rows as $key => $value) {
      array_push($freeAppointmentDates, $rows[$key]['workdate']);
    }

    //var_dump($freeAppointmentDates);
    return $freeAppointmentDates;
  }


  /*
   * It chechs the DB free days. If min one is avilable it gives back date.
   */
  function getFreeDay($freeForToday)
  {
    require_once('includes/config.php');
    $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $result = $mysqli->query("SELECT * FROM WORK where workdate LIKE '$freeForToday' and workdate > CURRENT_DATE and appointmentfree = 1 LIMIT 1");
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    return (!$rows) ? $rows : $rows[0]["workdate"];
  }

  function deleteWork($workId)
  {
    require_once('includes/config.php');
    $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $result = $mysqli->query("DELETE FROM work WHERE `work`.`workid` = '$workId' ");
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    return 0;
  }
}


?>
