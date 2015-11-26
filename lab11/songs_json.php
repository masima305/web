<?php

$songList = "songs.txt";
$randomSong = "songs_shuffled.txt";

if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}
$top = "";
if (isset($_REQUEST["top"])) {
	$top = preg_replace("/[^0-9]*/", "", $_REQUEST["top"]);
}
if (!file_exists($songList)) {
	header("HTTP/1.1 500 Server Error");
	die("ERROR 500: Server error - Unable to read input file: $songList");
}

header("Content-type: application/json");

print "{\n  \"songs\": [\n";


// write a code to : 
// 1. read the "songs.txt" (or "songs_shuffled.txt" for extra mark!)
// 2. search all the songs that are under the given top rank 
// 3. generate the result in JSON data format 



// $lines = file($songList);
// for ($i = 0; $i < count($lines); $i++) {
// 	list($title, $artist, $rank, $genre, $time) = explode("|", trim($lines[$i]));
// 	if ($rank <= $top) {
// 		print "{\"rank\": \"$rank\", ";
// 		print "\"title\": \"$title\", ";
// 		print "\"artist\": \"$artist\", ";
// 		print "\"genre\": \"$genre\", ";
// 		print "\"time\": \"$time\"}";		
// 		if($rank < $top){
// 			print ",\n";
// 		}
// 		else{
// 			print "\n";
// 		}
// 	}
// }


$lines = file($randomSong);
for($i=0;$i<$top;$i++){
	for ($j = 0; $j < count($lines); $j++) {
		list($title, $artist, $rank, $genre, $time) = explode("|", trim($lines[$j]));
		if ($rank == $i+1) {
			print "{\"rank\": \"$rank\", ";
			print "\"title\": \"$title\", ";
			print "\"artist\": \"$artist\", ";
			print "\"genre\": \"$genre\", ";
			print "\"time\": \"$time\"}";		
			if($rank < $top){
				print ",\n";
			}
			else{
				print "\n";
			}
		}
	}
}

print "  ]\n}\n";
?>