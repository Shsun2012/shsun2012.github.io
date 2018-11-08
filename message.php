<?php

$messagefile = fopen("message.txt", "w") or die ("Unable to send message!");
$txt = "Name";
fwrite($messagefile, $txt);
fclose($messagefile);

 ?>
