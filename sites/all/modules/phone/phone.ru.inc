<?php
// $Id: phone.ru.inc,v 1.13 2008/12/04 01:48:45 thierrygd Exp $

/**
 * Verifies that $phonenumber is a valid ten-digit Russian phone number
 *
 * @param string $phonenumber
 * @return boolean Returns boolean FALSE if the phone number is not valid. 
 */

function valid_ru_phone_number($phonenumber) {

  //$phonenumber = trim($phonenumber);

  // define regular expression
  $regex = "/
    \D*           # ignore non-digits
    [78]?         # an optional 78
    \D*           # optional separator 
    \d{3,5}       # area code 3-5 digit
    \D*           # optional separator
    \d{1,3}       # 3-digit prefix
    \D*           # optional separator
    \d{2}         # 2-digit line number
    \D*           # optional separator
    \d{2}         # 2-digit line number
    \D*           # ignore trailing non-digits
    /x";
  // return true if valid, false otherwise
  return (bool) preg_match($regex, $phonenumber); 
} 

/**
 * Convert a valid Russian phone number into standard +7 (495) 567-53-09 or +7 (444xx) 67-53-09 or mobile 8 910 414-56-90 format
 * 
 * @param $phonenumber must be a valid ten-digit number (with optional extension)
 * 
 */
function format_ru_phone_number($phonenumber) {

  // define regular expression   
  $regex = "/
    ^\D*          # ignore non-digits 
    ([78])?       # an optional 78
    \D*           # optional separator 
    (\d{3,5})  	  # area code 3-5 digit
    \D*           # optional separator
    (\d{1,3})  	  # capture 3-digit prefix
    \D*           # optional separator
    (\d{2})       # 2-digit line number
    \D*           # optional separator
    (\d{2})       # 2-digit line number
    \D*           # ignore trailing non-digits
  /x"; 

  // get digits of phone number
  preg_match($regex, $phonenumber, $matches);

  // construct ten-digit phone number
  $phonenumber = $matches[1] . ' (' . $matches[2] . ') ' . $matches[3] . ' - ' . $matches[4] . ' - ' . $matches[5];

  return $phonenumber;
}
