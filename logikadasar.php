<?php
echo "Halo dengan echo <br>";
print("Halo dengan print <br>");

$nama = "Walady";
$umur = 19;
$beratbadan = 47.5;
$sehat = true;

echo "Nama Saya: ".$nama."<br>";
echo "Umur Saya: ".$umur."<br>";
echo "BB Saya: ".$beratbadan."<br>";
echo "Saya Sehat: ".($sehat ? "Ya" : "Tidak")."<br>";

var_dump($sehat);
var_dump($nama);
var_dump($umur);
var_dump($beratbadan);

if ($umur >= 19 && $nama == "Hylmi"){
    echo "<br> Umur diatas atau sama dengan 19 dan nama Hylmi";
} else if ($umur >= 19){
    echo "<br> Umur diatas atau sama dengan 19";
} else {
    echo "<br> di bawah umur 19";
}

for ($a = 0; $a <= $umur; $a++){
    echo "<br>".$a;
}
?>
