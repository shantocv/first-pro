<?php
//setting header permissions
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Max-Age: 86400');

if(!function_exists('generatePassword')) {
	function generatePassword($length = 7) {
		$password = "";
		$possible = "0123456789bcdfghjkmnpqrstvwxyz"; //no vowels
		$i = 0;
		
		while ($i < $length) {
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			
			if (!strstr($password, $char)) {
				$password .= $char;
				$i++;
			}
		}
		return $password;
	}
}

if(!function_exists('get_http_response_code')) {
function get_http_response_code($theURL) {
    $headers = get_headers($theURL);
    return substr($headers[0], 9, 3);
}
}

// Password and salt generation
if(!function_exists('passwordHash')) {
	function passwordHash($password, $salt = null)
	{
		if ($salt === null)     {
			$salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
		}
		else     {
			$salt = substr($salt, 0, SALT_LENGTH);
		}
		return $salt . sha1($password . $salt);
	}
}

if(!function_exists('checkPassword')) {
	function checkPassword($x,$y)
	{
		if(empty($x) || empty($y) ) {
			return false;
		}
		if (strlen($x) < 4 || strlen($y) < 4) {
			return false;
		}

		if (strcmp($x,$y) != 0) {
			return false;
		}
		return true;
	}
}

if(!function_exists('customdate')) {
function customdate($x) {
/*
2012-06-11  <-- input
june 11, 2012  <--return

*/
$yt = explode(' ', $x);
$y = explode('-', $yt[0]);
$month = monthname($y['1']);
$ret = $month.' '.$y[2].', '.$y[0];
return $ret;
}
}

if(!function_exists('preparemessage')) {
function preparemessage($type,$post_type,$gender)
  {
            
       switch ($type)
			    {
					case "like": $msg = 'like your';
							   break;
					case "comment": $msg = 'commented on your';
								  break;
					case "follow": $msg = 'has started following you';
								 break;
					case "usercomment": $msg = 'commented on ';
					                    if($gender == "female")
					                    {
							       $msg = $msg.'her';
							    }
						            else
						            {
							       $msg = $msg.'his';
							     }
							     $msg = $msg.' picture that you commented on : ';
							     $post_type = 's';
							    break;
					case "favourite": $msg = 'added your picture to his favourites :';
					                  break;		    
					case "approve": $msg = 'is approved';
								  break;
					case "disapprove": $msg = 'is rejected';
									 break;				 
					default: 
							break;
				}
				
			    switch ($post_type)
					{
					case 'photos': if($type != 'favourite')
					                  {                
					                    $msg = $msg.' photo : ';
					                  }
							   break;
					case 'comment': $msg = $msg.' comment : ';
							   break;
					default: 
							break;
				}
				return $msg;
  }
}

if(!function_exists('getStatusMsg')) {
	function getStatusMsg($status) {

		if($status == "follow")
		{
			$msg = " started to ";
		}else if($status == "project")
		{
		       $msg = " created a ";
		}else if($status == "testimonial")
		{
		       $msg = " got a ";
		}else if($status == "equipment")
		{
		       $msg = " added an ";
		}else
		{
		       $msg = " added a ";
		}
			
		return $msg;

	}
}

if(!function_exists('time_difference')) {
function time_difference($date)
{
/*
$date = "2010-07-16 17:45";
$result = time_difference($date); // 1 year ago

*/
    if(empty($date)) {
        return " ";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("59","59","23","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {   
        return " ";
    }
 
    // is it future date or past date
    if($now > $unix_date) {   
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "ago";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}
}

if(!function_exists('random_gen')) {
function random_gen($length)
{
  $random= "";
   srand((double)microtime()*1000000);
  $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $char_list .= "abcdefghijklmnopqrstuvwxyz";
  $char_list .= "1234567890";
  // Add the special characters to $char_list if needed

  for($i = 0; $i < $length; $i++)  
  {    
     $random .= substr($char_list,(rand()%(strlen($char_list))), 1);  
  }  
  return $random;
}
}




if(!function_exists('monthname')) {
function monthname($x) {
    switch ($x)
    {
	case 1: return "January"; break;
	case 2: return "February";break;
	case 3: return "March"; break;
	case 4: return "April"; break;
	case 5: return "May";  break;
	case 6: return "Jun"; break;
	case 7: return "July"; break;  
	case 8: return "August"; break;  
	case 9: return "September"; break;  
	case 10: return "October"; break;  
	case 11: return "November"; break;  
	case 12: return "December"; break;  
	default: echo ""; 
    }
  }
}




if(!function_exists('checkDateFormat')) {
function checkDateFormat($date) {
	$date_time1 = strtotime("1970-01-01 00:00:00");
	$date_time1 = date('Y-m-d H:i:s', $date_time1);

	
	$date_time3 = strtotime("1970-01-01 05:30:00");
	$date_time3 = date('Y-m-d H:i:s', $date_time3);

	$blndate = true;
	$date_time2 = strtotime("0000-00-00 00:00:00");
	$date_time2 = date('Y-m-d H:i:s', $date_time2);

	if($date == $date_time2 )
	{
  		$blndate = false;
	}
	if($date == $date_time1 )
	{
  		$blndate = false;
	}
	if($date == $date_time3 )
	{
  		$blndate = false;
	}

       return $blndate; 
   }
}

if(!function_exists('filter')) {
	function filter($data) {
		$data = trim(htmlentities(strip_tags($data)));
	
		if (get_magic_quotes_gpc())
			$data = stripslashes($data);
	
		$data = mysql_real_escape_string($data);
	
		return $data;
	}
}

if(!function_exists('GenerateKey')) {
	function GenerateKey($length = 7)
	{
		$password = "";
		$possible = "0123456789abcdefghijkmnopqrstuvwxyz";
		$i = 0;
		
		while ($i < $length) {
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			
			if (!strstr($password, $char)) {
				$password .= $char;
				$i++;
			}
		}
		return $password;
	}
}

if(!function_exists('PrintR')) {
	function PrintR($arr,$exit=false)
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		if($exit)
			exit;
	}
}

if(!function_exists('getIP')) {
	function getIP()
	{
		return $_SERVER['REMOTE_ADDR'];
	}
}
if(!function_exists('excerpt')) {
	function excerpt($string,$limit='')
	{
		if(!$limit)
			return $string;
		if($limit > 0 && $limit >= strlen($string))
			return $string;
		else
			return substr($string,0,$limit)."..";
			
	}
}

if(!function_exists('sort_array_by_field')) {
function sort_array_by_field($original,$field,$descending = false)
{
	$sortArr = array();
	
	foreach ( $original as $key => $value )
	{
		$sortArr[ $key ] = $value[ $field ];
	}

	if ( $descending )
	{
		arsort( $sortArr );
	}
	else
	{
		asort( $sortArr );
	}
	
	$resultArr = array();
	foreach ( $sortArr as $key => $value )
	{
		$resultArr[ $key ] = $original[ $key ];
	}

	return $resultArr;
}  
}

if(!function_exists('checkValues')) {
function checkValues($value)
{
	$value = trim($value);
	if (get_magic_quotes_gpc())
	{
		$value = stripslashes($value);
	}
	$value = strtr($value, array_flip(get_html_translation_table(HTML_ENTITIES)));
	$value = strip_tags($value);
	$value = htmlspecialchars($value);
	return $value;
}
}


if(!function_exists('extract_tags')) {
function extract_tags( $html, $tag, $selfclosing = null, $return_the_entire_tag = false, $charset = 'ISO-8859-1' ){
 
	if ( is_array($tag) ){
		$tag = implode('|', $tag);
	}
 
	//If the user didn't specify if $tag is a self-closing tag we try to auto-detect it
	//by checking against a list of known self-closing tags.
	$selfclosing_tags = array( 'area', 'base', 'basefont', 'br', 'hr', 'input', 'img', 'link', 'meta', 'col', 'param' );
	if ( is_null($selfclosing) ){
		$selfclosing = in_array( $tag, $selfclosing_tags );
	}
 
	//The regexp is different for normal and self-closing tags because I can't figure out 
	//how to make a sufficiently robust unified one.
	if ( $selfclosing ){
		$tag_pattern = 
			'@<(?P<tag>'.$tag.')			# <tag
			(?P<attributes>\s[^>]+)?		# attributes, if any
			\s*/?>					# /> or just >, being lenient here 
			@xsi';
	} else {
		$tag_pattern = 
			'@<(?P<tag>'.$tag.')			# <tag
			(?P<attributes>\s[^>]+)?		# attributes, if any
			\s*>					# >
			(?P<contents>.*?)			# tag contents
			</(?P=tag)>				# the closing </tag>
			@xsi';
	}
 
	$attribute_pattern = 
		'@
		(?P<name>\w+)							# attribute name
		\s*=\s*
		(
			(?P<quote>[\"\'])(?P<value_quoted>.*?)(?P=quote)	# a quoted value
			|							# or
			(?P<value_unquoted>[^\s"\']+?)(?:\s+|$)			# an unquoted value (terminated by whitespace or EOF) 
		)
		@xsi';
 
	//Find all tags 
	if ( !preg_match_all($tag_pattern, $html, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE ) ){
		//Return an empty array if we didn't find anything
		return array();
	}
 
	$tags = array();
	foreach ($matches as $match){
 
		//Parse tag attributes, if any
		$attributes = array();
		if ( !empty($match['attributes'][0]) ){ 
 
			if ( preg_match_all( $attribute_pattern, $match['attributes'][0], $attribute_data, PREG_SET_ORDER ) ){
				//Turn the attribute data into a name->value array
				foreach($attribute_data as $attr){
					if( !empty($attr['value_quoted']) ){
						$value = $attr['value_quoted'];
					} else if( !empty($attr['value_unquoted']) ){
						$value = $attr['value_unquoted'];
					} else {
						$value = '';
					}
 
					//Passing the value through html_entity_decode is handy when you want
					//to extract link URLs or something like that. You might want to remove
					//or modify this call if it doesn't fit your situation.
					$value = html_entity_decode( $value, ENT_QUOTES, $charset );
 
					$attributes[$attr['name']] = $value;
				}
			}
 
		}
 
		$tag = array(
			'tag_name' => $match['tag'][0],
			'offset' => $match[0][1], 
			'contents' => !empty($match['contents'])?$match['contents'][0]:'', //empty for self-closing tags
			'attributes' => $attributes, 
		);
		if ( $return_the_entire_tag ){
			$tag['full_tag'] = $match[0][0]; 			
		}
 
		$tags[] = $tag;
	}
 
	return $tags;
}
}
