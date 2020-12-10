
<?php

$sql = "select area, latitude, longitude, enabled from humans WHERE id = '".$_SESSION['id']."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
        $area=$row['area'];
        $latitude=$row['latitude'];
        $longitude=$row['longitude'];
        $enabled=$row['enabled'];
}

// Add Hidden Fancy Profile

echo " <div style='display: none;' id='profile'>";

  echo "<center>";
  echo "<p><b><font color='darkblue' size=4>Welcome ".$_SESSION['username']."</font></b></p>";
  $avatar = "https://cdn.discordapp.com/avatars/".$_SESSION['id']. "/".$_SESSION['avatar'].".png";
  echo "<img src='$avatar' style='border-radius: 50%; width:50px;'><br><br>";


  // Add Button to enable/disable Alarms

  echo "<table><tr>\n";
  echo "<td>$enabled_color</td>\n";
  echo "<td>Alarms</td>\n";
  echo "<td>\n";
  if ( $enabled == "1") {
    echo "<a href='./form_action.php?action=disable'><button class='button_disable'>Disable</button></a><br>\n";
  } else {
    echo "<a href='./form_action.php?action=enable'><button class='button_enable'>Enable</button></a><br>\n";
  }
  echo "</td>\n";
  echo "</tr><tr>\n";
  echo "<td>$all_mon_cleaned_color</td>\n";
  echo "<td>\n";
  echo "<div class='tooltip'><i class='fa fa-question-circle' style='color:darkgreen;'></i><span class='tooltiptext'>".$tt_clean_pkmn."</span></div>&nbsp;\n";
  echo "All Monsters Cleaning\n";
  echo "</td>\n";
  echo "<td>\n";
  if ( $all_mon_cleaned == "1") {
    echo "<a href='./form_action.php?action=disable_mon_clean' onclick='return confirm_mon_cleaning();'><button class='button_disable'>Disable</button></a><br>\n";
  } else {
    echo "<a href='./form_action.php?action=enable_mon_clean'><button class='button_enable'>Enable</button></a><br>\n";
  }
  echo "</td>\n";
  echo "</tr><tr>\n";
  echo "<td>$all_raid_cleaned_color</td>\n";
  echo "<td>\n";
  echo "<div class='tooltip'><i class='fa fa-question-circle' style='color:darkgreen;'></i><span class='tooltiptext'>".$tt_clean_raid."</span></div>&nbsp;\n";
  echo "All Raids/Eggs Cleaning\n";
  echo "</td>\n";
  echo "<td>\n";
  if ( $all_raid_cleaned == "1") {
    echo "<a href='./form_action.php?action=disable_raid_clean' onclick='return confirm_raid_cleaning();'><button class='button_disable'>Disable</button></a><br>\n";
  } else {
    echo "<a href='./form_action.php?action=enable_raid_clean'><button class='button_enable'>Enable</button></a><br>\n";
  }
  echo "</td>\n";
  echo "</tr><tr>\n";
  echo "</tr></table>\n";

  if ( $latitude == "0.0000000000" && $longitude == "0.0000000000" ) {
          echo "<font color='darkred'><b>Your Location is not set and cannot be set here.<br>\n";
          echo "Please set it in discord using <code>/location</code> command</font></b><br><br>\n";
  } else if ( isset($mapURL) && $mapURL <> ""  ) {
          echo "<br>Your Location is set to ".round($latitude,4).", ".round($longitude,4)."<br><br>\n";
          $mapURL=str_replace('#LAT#', $latitude, $mapURL);
          $mapURL=str_replace('#LON#', $longitude, $mapURL);
          echo "<img src='$mapURL' width=300><br><br>\n";
  }
  echo "</center>";

echo "</div>";

?>
