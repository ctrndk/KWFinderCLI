<?php
system("clear");
error_reporting(0);
echo "
  @@@@@@@       @@@   @@@@@@@@   @@@@@@@@   @@@@@@@   @@@@@@@   @@@@@@@@  @@@  @@@
 @@@@@@@@      @@@@   @@@@@@@@  @@@@@@@@@@  @@@@@@@@  @@@@@@@@  @@@@@@@@  @@@  @@@
 !@@          @@!@!        @@!  @@!    @@@  @@!  @@@  @@!  @@@  @@!       @@!  @@@
 !@!         !@!!@!       !@!   !@! @!@!!@  !@!  @!@  !@!  @!@  !@!       !@!  @!@
 !@!        @!! @!!      @!!    @!@ !@@!@!  @!@  !@!  @!@  !@!  @!!!:!    @!@  !@!
 !!!       !!!  !@!     !!!     !@! @@!@!!  !@!  !!!  !@!  !!!  !!!!!:    !@!  !!!
 :!!       :!!:!:!!:   !!:      !!:  !:!!   !!:  !!!  !!:  !!!  !!:       :!:  !!:
 :!:       !:::!!:::  :!:       :!:         :!:  !:!  :!:  !:!  :!:        ::!!:! 
  ::: :::       :::    ::       ::::::::::   :::: ::   :::: ::   :: ::::    ::::  
  :: :: :       :::   : :        : : :: :   :: :  :   :: :  :   : :: ::      :    \n";

echo "================================================================================\n";
echo "       Coded by [@ctrndk](github.com/ctrndk) | Temanggung, Jawa Tengah 56253  \n";
echo "                     Limit Information 5 Searching / Day  \n";
echo "================================================================================\n";

echo "Masukkan Keyword (ex:Facebook) : ";
$kunci = trim(fgets(STDIN));
$q = preg_replace('/\s+/', '+', $kunci);

$url="https://api.mangools.com/v2/kwfinder/related-keywords?kw=".$q."&language_id=1025&location_id=2360";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$logs = curl_exec($ch);
$json = json_decode($logs, true);

if($json['error']['type'] == 'RateLimit'){
	echo "\n [0]System Message => Not enough limits\n";
}else{
	$kawasan = $json['location_label'];
echo "\n================================================================================\n";
echo "               [*]Lokasi => ".$kawasan."   Result Limit : 25\n";  
echo "================================================================================\n";
for ($i=0; $i<25; $i++){
	$kw = $json['keywords'][$i]['kw'];
	$sv = $json['keywords'][$i]['sv'];
	echo "[+] Keyword => ".$kw." | Jumlah Pencarian => ".$sv."\n";
	}
}

curl_close($ch);
?>
