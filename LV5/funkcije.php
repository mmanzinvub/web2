<?php	

//if (!function_exists('zbrojDvaBroja')) {
	function zbrojDvaBroja($var1, $var2){
	    return $var1 + $var2;
	}
//}

if (!function_exists('prikazCsv')) {
	function prikazCsv($file){
		$row = 1;
		$izlaz = "<table id=\"customers\">";
		if(file_exists($file)){
		   $handle = fopen($file, "r") or die("Ne mogu otvoriti datoteku! Molimo javite se službi za informatiku."); 
		   while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			  $izlaz .= "<tr>";
			  foreach ($data as $vrijednosti){
				 if ($row == 1){
					$izlaz .= "<th>$vrijednosti</th>";	   
				}else{
				   $izlaz .= "<td>$vrijednosti</td>";	   
				}
			  }
			  $row++;
			  $izlaz .= "</tr>";
			}
			$izlaz .= "</table>";
			fclose($handle);
		}else{
		   $izlaz = "Datoteka <b> $file </b> ne psotoji";
		}
	    return $izlaz; 	
	 }
}

 if (!function_exists('f_int2string')) {
	function f_int2string($i_model){
	   preg_match_all('!\d+!', $i_model, $matches);
	   $tmp = implode(' ', $matches[0]);
	   $model_int=$tmp+0;
	   return $tmp;
	} 
}

if (!function_exists('get_password')) {
	function get_password($username){
		$users = [
			"tadamovic"=>"zaporka",
			"sklisovic"=>"zaporka",
			"bmarulic"=>"zaporka",
			"asenoa" =>"zaporka"
		];
		return $users;
		foreach($users as $user => $password){
			if($user == $username){
				return $password;
				break;
			}
		}
	}
}

if (!function_exists('get_passwords')) {
	function get_passwords(){
		$users = [
			"tadamovic"=>"zaporka",
			"sklisovic"=>"zaporka",
			"bmarulic"=>"zaporka",
			"asenoa" =>"zaporka"
		];
		
		
	}
}
 
?>