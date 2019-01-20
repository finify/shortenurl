<?php
class Shortener {
    

    
    public function makecode($url){
        $dbhost = 'localhost'; 
        $dbuser = 'root'; 
        $dbpass = ''; 
        $db ='shortenurl';
        $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;

        $url = trim($url);

        if(!filter_var($url, FILTER_VALIDATE_URL)){ //checks to see is url is valide
            return 'NOOO';
        }

        //write the code for string escape to protect against sql injection
        $url1 = mysqli_real_escape_string($con,$url);

        //check if url already exists
        $query = "SELECT * FROM `links` WHERE url='$url'" ;//
		$result = mysqli_query($con,$query);
		$rows = mysqli_num_rows($result);
			if($rows==1){
                $row = mysqli_fetch_array($result);
                return $row['code'];
			}else{
                //insert record without code
                $code = base_convert(time(), 10, 36);
                $created = date('Y-m-d H:i:s');
                $query1 = mysqli_query($con, "INSERT INTO links (url,code,created) VALUES ('$url','$code', '$created')") or mysqli_error(); 
                if($query)
                {
                    return $code;
                }
            }


    }

    public function geturl($code){
        $dbhost = 'localhost'; 
        $dbuser = 'root'; 
        $dbpass = ''; 
        $db ='shortenurl';
        $con=mysqli_connect($dbhost,$dbuser,$dbpass,$db) ;

        $code = mysqli_real_escape_string($con,$code);        
        $query2 = "SELECT url FROM `links` WHERE code='$code'" ;//
		$result2 = mysqli_query($con,$query2);
        $rows2 = mysqli_num_rows($result2);
        
			if($rows2==1){
                $row3 = mysqli_fetch_array($result2);
                return $row3['url'];
            }
    }
}

?>