<?php

$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	curl_setopt($ch, CURLOPT_URL, $vm.steadfast.net/settings/hypervisor_zones.xml);
	curl_setopt($ch, CURLOPT_USERPWD, $USERNAME . ':' . $PASSWORD);
		$result = curl_exec($ch);
	curl_close($ch);
		$xml = simplexml_load_string($result);
  
  
  foreach ($xml->hypervisor as $obj) {
    $uptime = explode(', ', $obj->uptime);
    $days = explode('up ', $uptime[0]);
    $days = (int) $days[1];
    $hours = trim($uptime[1]);
  # echo "{$days} days, {$hours} hours\n";
    $uptime_ago = strtotime("{$days} days {$hours} hours ago");
    echo "{$uptime_ago}\n";
  }