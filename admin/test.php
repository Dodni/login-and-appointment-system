<?php

$currentDay = "2022-11-14";
echo "Current given day " . $currentDay;
echo "<br>";
echo "Given free day " . $todayIsFree = "2022-11-14";
echo "<br>";

function _showToday()
{
  $today = date('Y-m-d');
  //echo $today;
  return $today;
}
echo "Today: " . _showToday();
echo "<br>";



echo ($currentDay == _showToday() ? "true" : ($currentDay == $todayIsFree ? "Free" : "false"));


//||
?>
