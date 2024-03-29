// $Id: phone.hu.inc,v 1.8 2008/12/04 01:48:45 thierrygd Exp $

/**
 * Verifies that $phonenumber is a valid nine-digit Hungarian phone number
 *
 * @param string $phonenumber
 * @return boolean Returns boolean FALSE if the phone number is not valid. 
 */
function valid_hu_phone_number($phonenumber) {

  //$phonenumber = trim($phonenumber);

  // define regular expression
  $regex = "/
    \D*           # optional separator 
	(?:\+?36|06)? # country code
    (\d\d?)       # area code
    \D*           # optional separator
    (\d{3})       # second group
    \D*           # optional separator
    (\d{2})       # third group
    \D*           # optional separator
    (\d{2})       # fourth group
    \D*           # ignore trailing non-digits
    $/x";
  // return true if valid, false otherwise
  return (bool) preg_match($regex, $phonenumber); 
} 

/**
 * Convert a valid Hungarian phone number into standard (+36) ..... format
 * 
 * @param $phonenumber must be a valid nine-digit number (with optional international prefix)
 * 
 */
function format_hu_phone_number($phonenumber) {

  // define regular expression   
  $regex = "/
    \D*           # optional separator 
	(?:\+?36|06)? # country code
    (\d\d?)       # area code
    \D*           # optional separator
    (\d{3})       # second group
    \D*           # optional separator
    (\d{2})       # third group
    \D*           # optional separator
    (\d{2})       # fourth group
    \D*           # ignore trailing non-digits
    $/x"; 
    
  // get digits of phone number
  preg_match($regex, $phonenumber, $matches);
  
  // construct ten-digit phone number
  $phonenumber = '+36 ' . $matches[1] . ' ' . $matches[2] . ' ' . $matches[3] . ' ' . $matches[4];
  
  return $phonenumber;
}
