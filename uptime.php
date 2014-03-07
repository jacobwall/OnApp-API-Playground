<?php
  $xml = simplexml_load_file('hypervisors.xml');
  foreach ($xml->hypervisor as $obj) {
    $uptime = explode(', ', $obj->uptime);
    $days = explode('up ', $uptime[0]);
    $days = (int) $days[1];
    $hours = trim($uptime[1]);
  # echo "{$days} days, {$hours} hours\n";
    $uptime_ago = strtotime("{$days} days {$hours} hours ago");
    echo "{$uptime_ago}\n";
  }