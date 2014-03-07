<?php
        $xml = simplexml_load_file('hypervisors.xml');
        foreach ($xml->hypervisor as $obj) {
                $used_mem = $obj->total_memory - $obj->free_memory;
                echo "{$used_mem}<br />\n";
        }