<?php
// Fonction pour récupérer les données de la passerelle
function fetchData() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G09D");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

// Fonction pour découper les données en trames de 33 caractères
function splitDataIntoFrames($data) {
    return str_split($data, 33);
}

// Fonction pour décoder une trame
function decodeFrame($frame) {
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($frame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    return [
        'type' => $t,
        'origin' => $o,
        'request' => $r,
        'code' => $c,
        'number' => $n,
        'value' => $v,
        'additional' => $a,
        'checksum' => $x,
        'year' => $year,
        'month' => $month,
        'day' => $day,
        'hour' => $hour,
        'minute' => $min,
        'second' => $sec
    ];
}

// Fonction pour afficher les données décodées
function displayDecodedData($decodedData) {
    echo "<br />Type: {$decodedData['type']}, Origin: {$decodedData['origin']}, Request: {$decodedData['request']}, Code: {$decodedData['code']}, Number: {$decodedData['number']}, Value: {$decodedData['value']}, Additional: {$decodedData['additional']}, Checksum: {$decodedData['checksum']}, Year: {$decodedData['year']}, Month: {$decodedData['month']}, Day: {$decodedData['day']}, Hour: {$decodedData['hour']}, Minute: {$decodedData['minute']}, Second: {$decodedData['second']}<br />";
}

// Récupération des données
$data = fetchData();
echo "Raw Data:<br />";
echo "$data";

// Découpage des données en trames
$data_tab = splitDataIntoFrames($data);
echo "Tabular Data:<br />";
for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
    echo "Trame $i: $data_tab[$i]<br />";
}

// Décodage et affichage de la première trame (par exemple)
$frame = $data_tab[1];
$decodedFrame = decodeFrame($frame);
displayDecodedData($decodedFrame);
?>
