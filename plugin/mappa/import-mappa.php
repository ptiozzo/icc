<?php
echo "<h2>IMPORT MAPPA</h2>";
$row = 1;
$myFile = get_template_directory()."/plugin/mappa/export-mappa.csv";
echo $myFile;
if (!file_exists($myFile)) {
  print 'File not found';
}
if (($handle = fopen($myFile, "r")) !== FALSE) {
  echo "<table style='border: 1px solid grey;'>";
  while (($data = fgetcsv($handle, 100, ",",'"')) !== FALSE) {
    echo "<tr style='border: 1px solid grey;'>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    echo "<td style='border: 1px solid grey;'>".$row . "</td>\n";
    $row++;
    echo "<td style='border: 1px solid grey;'>".$data[0] . "</td>\n";
    echo "<td style='border: 1px solid grey;'>".$data[1] . "</td>\n";

    //Tipologia da splittare
    $var = explode(",",$data[2]);
    $varNum = count($var)-1;
    echo "<td style='border: 1px solid grey;'><ul>";
    for ($i=0; $i < $varNum; $i++) {
        echo "<li>".$var[$i]."</li>";
    }
    echo "</ul></td>";
    //echo "<td style='border: 1px solid grey;'>".$data[2] . "</td>\n";

    //regione/provincia da splittare
    $var = explode(",",$data[3]);
    $varNum = count($var)-1;
    echo "<td style='border: 1px solid grey;'><ul>";
    for ($i=0; $i < $varNum; $i++) {
        echo "<li>".$var[$i]."</li>";
    }
    echo "</ul></td>";
    //echo "<td style='border: 1px solid grey;'>".$data[3] . "</td>\n";

    //Indirizzo da unire
    $indirizzo = $data[4]." ".$data[5].", ".$data[6].", ".$data[7];
    echo "<td style='border: 1px solid grey;'>".$indirizzo. "</td>\n"; //via
    //echo "<td style='border: 1px solid grey;'>".$data[4] . "</td>\n"; //via
    //echo "<td style='border: 1px solid grey;'>".$data[5] . "</td>\n"; //civico
    //echo "<td style='border: 1px solid grey;'>".$data[6] . "</td>\n"; //CAP
    //echo "<td style='border: 1px solid grey;'>".$data[7] . "</td>\n"; //Città


    echo "<td style='border: 1px solid grey;'>".$data[8] . "</td>\n";//slug
    echo "<td style='border: 1px solid grey;'>".$data[9] . "</td>\n";//mail
    echo "<td style='border: 1px solid grey;'>".$data[10] . "</td>\n";//telfono
    echo "<td style='border: 1px solid grey;'>".$data[11] . "</td>\n";//sito
    echo "<td style='border: 1px solid grey;'>".$data[12] . "</td>\n";//FB
    echo "<td style='border: 1px solid grey;'>".$data[13] . "</td>\n";//Twitter

    //da splittare
    $var = explode(",",$data[14]);
    $varNum = count($var)-1;
    echo "<td style='border: 1px solid grey;'><ul>";
    for ($i=0; $i < $varNum; $i++) {
        echo "<li>".$var[$i]."</li>";
    }
    echo "</ul></td>";
    //echo "<td style='border: 1px solid grey;'>".$data[14] . "</td>\n";//Visto da noi/viaggio


    //echo "<td style='border: 1px solid grey;'>".$data[15] . "</td>\n";//BOH!!!
    echo "<td style='border: 1px solid grey;'>".$data[16] . "</td>\n";//Approfondisci

    $var = explode(",",$data[17]);
    $varNum = count($var)-1;
    echo "<td style='border: 1px solid grey;'><ul>";
    for ($i=0; $i < $varNum; $i++) {
        echo "<li>".$var[$i]."</li>";
    }
    echo "</ul></td>";
    //echo "<td style='border: 1px solid grey;'>".$data[17] . "</td>\n";//rete
    echo "<tr>";
  }
  echo "</table>";
  fclose($handle);
} else {
  echo "<p>Non riesco ad aprire il file!</p>";
}
 ?>
