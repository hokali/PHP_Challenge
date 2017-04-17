<?php

#Troy Bradshaw PHP Challenge

#Start the script timer
$rustart = getrusage();

#Bring in JSON from URL. Type php JSONParser.php in terminal
$url = 'http://swapi.co/api/people/1/?format=json';
$json = file_get_contents($url);
$data = json_decode($json,true);

#Check to see if valid

#Is NOT valid
if (is_null($data)) 
{
   die("This isn't valid JSON");
}

#Is valid
else 
{
	#Convert to stdClass Object
    $data = json_decode($json);

    #output converted JSON Arrays
	var_dump($data);

	#Write to File
	$var_str = var_export($data, true);
	$var = "<?php\n\n\$data = $var_str;\n\n?>";
	file_put_contents('forJohn.php', $var);
}

#End the timer for the Script
// Script end
function rutime($ru, $rus, $index) {
    return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
     -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
}

$ru = getrusage();
echo "This process used " . rutime($ru, $rustart, "utime") .
    " ms for its computations\n";
echo "It spent " . rutime($ru, $rustart, "stime") .
    " ms in system calls\n";
/*
# my last attempt using cURL instead of file_get_contents

#create the object
$info = new StdClass;

#Get the data
$url = 'http://swapi.co/api/people/1/?format=json';

#start the session
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

#set the JSON
$data = curl_exec($ch);

#Check to see if valid
$data = json_decode($json_string);
if (is_null($data)) {
   die("This isn't valid JSON");
}

else {

#close the session
curl_close($ch);

#output JSON for testing purposes
echo $data;
}

*/

?>





