<?php
#hensuu sitei
#filename no sitei
$filename = 'dev65_applicationHost.config';

# site name
$word = '"exweb"';
# site name/ sitei
$word2 ='"exweb\/';

# kokokara syori
$setfile = @file($filename);
$count = count( file( $filename));

$headline = preg_grep("/(?=.*$word)(^(?!.*applicationPool).+$)/",$setfile);
$headline2 = preg_grep("/(?=.*$word2)(^(?!.*applicationPool).+$)/",$setfile);
$i = 0;
$l = 0;

foreach ($headline as $hkey => $line){
  $headkey[] = $hkey;
  $head = preg_split('/[\s]+/',$line,-1,PREG_SPLIT_NO_EMPTY);
  $end = substr_replace($head[0],'\/',1,0);
  $endword[] = "\\$end\>";
  $i = $i+1;
}

foreach ($headline2 as $hkey2 => $line2){
  $headkey2[] = $hkey2;
  $head2 = preg_split('/[\s]+/',$line2,-1,PREG_SPLIT_NO_EMPTY);
  $end2 = substr_replace($head2[0],'\/',1,0);
  $endword2nd[] = "\\$end2\>";
  $l = $l+1;
}


for ( $j=0; $j < $i; $j++){
echo $setfile[$headkey[$j]];
 for ( $k=$headkey[$j]+1; $k < $count ; $k++){
  echo $setfile[$k];
  $endword2 = $endword[$j];
  $endword3 = "/$endword2/";
    if (preg_match($endword3,$setfile[$k])){
      break;
     }
 }
}

for ( $m=0; $m < $l; $m++){
echo $setfile[$headkey2[$m]];
 for ( $n=$headkey2[$m]+1; $n < $count ; $n++){
  echo $setfile[$n];
  $endword2nd2 = $endword2nd[$m];
  $endword2nd3 = "/$endword2nd2/";
    if (preg_match($endword2nd3,$setfile[$n])){
      break;
     }
 }
}
?>
