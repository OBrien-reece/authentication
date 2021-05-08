<!-- hiii ni file ya database nai create apa ndo ni avoid repetation kila saa ka venye nmeona kwa code yako
nkitaka kuiita na include hii file using php mara once pekeee angalia login na register.php -->

<?php
$connect = mysqli_connect("localhost","root","","users");
if(!$connect){
	echo "Unable to establish connection...please try again";
}
?>