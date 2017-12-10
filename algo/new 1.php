<!DOCTYPE html>
<html>
<body>

<?php
$matlab=array();
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
while(!feof($myfile)){
$n=fgetc($myfile);
echo $n;
if($n==0||$n==1)
array_push($matlab,$n);
}
fclose($myfile);
echo $matlab[0].$matlab[1].$matlab[2].$matlab[3].$matlab[4].$matlab[5].$matlab[6].$matlab[7].$matlab[8].$matlab[9];
?>

</body>
</html>