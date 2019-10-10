# NAME MY HEX

##installation
1. Create connect.php with :  
>* DSN
>* USER
>* PASSWORD
>>define('DSN', 'mysql:host=yourHost;dbname=yourDBName');
  define('USER', 'username');
  define('PASS', 'yourDBPassword');
  
2. Import script.sql :
>* mysql - u 'username' -p < script.sql