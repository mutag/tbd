File; .htaccess
# .htaccess file.

ErrorDocument 404 /error-msg.php
ErrorDocument 500 /error-msg.php
ErrorDocument 400 /error-msg.php
ErrorDocument 401 /error-msg.php
ErrorDocument 403 /error-msg.php
# End of file.

File; error-msg.php
<?php
  $HttpStatus = $_SERVER["REDIRECT_STATUS"] ;
  if($HttpStatus==200) {print "Document has been processed and sent to you.";}
  if($HttpStatus==400) {print "Bad HTTP request ";}
  if($HttpStatus==401) {print "Unauthorized - Iinvalid password";}
  if($HttpStatus==403) {print "Forbidden";}
  if($HttpStatus==500) {print "Internal Server Error";}
  if($HttpStatus==418) {print "I'm a teapot! - This is a real value, defined in 1998";}

?>