<?php
$agent_sql = $pdo->prepare("SELECT * FROM agents");
$agent_sql->execute();

$agents = $agent_sql->fetchAll(PDO::FETCH_ASSOC);

$number_agents = sizeof($agents);


$geo_sql=$pdo->prepare("SELECT * FROM agents_location_change");
$geo_sql->execute();

$geo = $geo_sql->fetchAll(PDO::FETCH_ASSOC);
$location_change = sizeof($geo);

$status_sql = $pdo->prepare("SELECT * FROM login WHERE LOGIN_RANK = 'agent' AND LOGIN_STATUS=1");
$status_sql->execute();
$logins = $status_sql->fetchAll(PDO::FETCH_ASSOC);
$no_logins = sizeof($logins);


?>