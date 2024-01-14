<?php

// ob_start();
// error_reporting(E_ALL); //1

function setMySQL_Mode() {
  global $db; // If $db is defined outside this function

  // Fetch current SQL mode
  // $result = mysqli_query($db, "SELECT @@sql_mode as sql_mode");
  // $row = mysqli_fetch_assoc($result);
  // $current_mode = $row['sql_mode'];

  // Remove strict modes
  // $non_strict_mode = str_replace(['STRICT_TRANS_TABLES', 'STRICT_ALL_TABLES'], '', $current_mode);

  // Set the modified SQL mode for the session
   //SET GLOBAL sql_mode = 'STRICT_ALL_TABLES'; //SET GLOBAL sql_mode = '$non_strict_mode'
  $query = "SET GLOBAL sql_mode = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'"; //ONLY_FULL_GROUP_BY, STRICT_ALL_TABLES
  $result = mysqli_query($db, $query);

  if (!$result) {
    // Handle error
    $error_message = mysqli_error($db);
    // You can log the error, show a user-friendly message, etc.
    echo $error_message;
  }

}

function dbVerbindung ()
{

$db = mysqli_connect("database_hhp", "root", "", "hhp");

if (mysqli_connect_errno()) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}
//Damit Default gleich utf8mb4 wie von XAMPP ist.....
$db->set_charset("utf8mb4");
//printf("Initial character set: %s\n", $db->character_set_name());

return $db;

}

//Expection for Datenbankabfrage
class customException extends Exception {
    public function errorMessage() {
        //error message
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
        .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}


function dbBefehl ($query)
{
  global $db;
  if (empty($_SESSION['ReloadFromDbBefehl'])) {
      $_SESSION['ReloadFromDbBefehl'] = 0;
  }
  if (empty($_SESSION['ReloadFromDbBefehlChecker'])) {
      $_SESSION['ReloadFromDbBefehlChecker'] = 0;
  }
  /*
  echo($_SESSION['ReloadFromDbBefehl'] . '|' . $_SESSION['ReloadFromDbBefehlChecker']);
  echo '<br>';
  */


  // Check if it's an UPDATE query
  if (stripos($query, 'UPDATE') !== false) {
    // Replace empty values after SET with NULL
    $query = preg_replace('/=\s*\'\'/', '= NULL', $query);
  }

  // Check if it's an INSERT query
  if (stripos($query, 'INSERT INTO') !== false) {
    // Replace empty values in VALUES clause with NULL
    $query = preg_replace('/\(\s*\'\'/', '(NULL', $query);
  }


  // For DELETE queries, we won't modify the query, 
  // but you can add specific checks if needed.

  try {
    //Mysqli Abfrage
    $Abfrage = mysqli_query($db,$query);
    //Falls abfrage nicht funktioniert
    if (!$Abfrage){
      throw new customException($error);
    }
  }catch(Exception $e) {
    echo "Konnte Abfrage ($query) nicht erfolgreich ausfuehren von DB: " . mysqli_error($db);
    exit;
  }
  return $Abfrage;
}

// Basic testing function
function assertEqual($expected, $actual, $message) {
  if ($expected === $actual) {
      echo "PASSED: $message\n";
  } else {
      echo "FAILED: $message\n";
      echo "Expected: $expected\n";
      echo "Got: $actual\n";
  }
}

// Let's write some tests
function runTests() {
  global $db;

  // Test 1: Check UPDATE query with empty values
  // Insert some initial data
  dbBefehl("INSERT INTO test_table (test_col1, test_col2) VALUES ('initial', 'initial')");
  $insertedId = mysqli_insert_id($db);  // Get the ID of the inserted row

  // Use dbBefehl to run an UPDATE query with an empty value
  dbBefehl("UPDATE test_table SET test_col1 = '', test_col2 = 'value' WHERE id = $insertedId");

  // Check the database to see if the update was successful
  $result = mysqli_query($db, "SELECT test_col1, test_col2 FROM test_table WHERE id = $insertedId");
  $row = mysqli_fetch_assoc($result);
  assertEqual(NULL, $row['test_col1'], "UPDATE test_col1 with empty values");
  assertEqual('value', $row['test_col2'], "UPDATE test_col2 with non-empty values");

  // Test 2: Check INSERT query with empty values
  // Use dbBefehl to run an INSERT query with an empty value
  dbBefehl("INSERT INTO test_table (test_col1, test_col2) VALUES ('', 'value')");

  // Check the database to see if the insert was successful
  $insertedId = mysqli_insert_id($db);  // Get the ID of the inserted row
  $result = mysqli_query($db, "SELECT test_col1, test_col2 FROM test_table WHERE id = $insertedId");
  $row = mysqli_fetch_assoc($result);
  assertEqual(NULL, $row['test_col1'], "INSERT test_col1 with empty values");
  assertEqual('value', $row['test_col2'], "INSERT test_col2 with non-empty values");

  // ... You can add more tests as needed ...
}

function dbBefehl_ohneFehler ($query)
{
    global $db;
    $Abfrage = mysqli_query($db,$query);
    return $Abfrage;
}

function dbTableDrop ($table)
{

    global $db, $DS;

    $query="DROP TABLE " . $table . "_" . $DS;

    $Abfrage = mysqli_query($db,$query);

    if (!$Abfrage) {
         echo "Konnte Table Drop ($query) nicht erfolgreich ausführen von DB: " . mysql_error();
         exit;
    }

}

function EinzeilerAbfrage ($query)
{
    global $db;

    $Abfrage = mysqli_query($db,$query);

    if (!$Abfrage) {
         echo "Konnte Abfrage ($query) nicht erfolgreich ausführen von DB: " . mysql_error();
         exit;
    }
    $result = mysqli_fetch_assoc($Abfrage);

    return $result;
}

function dbTest() {
  $conn = mysqli_connect("database_hhp", "root", "", "hhp");
  if (mysqli_connect_error()) {
      echo "<script> dbErsteller() </script>";
      exit();
  } else {
      $result = mysqli_query($conn, "SHOW TABLES");
      if(mysqli_num_rows($result) == 0) {
          // No tables in the database, drop and recreate it
          mysqli_query($conn, "DROP DATABASE hhp");
          echo "<script> dbErsteller() </script>";
          exit();
      }
  }
  mysqli_close($conn);
}

function loginCheck($stammdaten) {

if($stammdaten['passwort']!='')
         if($_SESSION['user']==0)
                 die('Bitte zuerst <a href="login.php">einloggen</a>');

}

function dbVerbindungOnline ()
{

  $host     = 'onlineportal.bvdg-online.de';
  $user     = 'wettkampfsoftware';
  $password = 'hantel123!';
  $db       = 'api_bvdg';
  $port     = 3306;
	//Da Online Db in utf-8 gespeichert ist
  $charset  = 'utf8';

  $db_Online = mysqli_init();
  //Define Timeouts:
  //specify the connection timeout
  $db_Online->options(MYSQLI_OPT_CONNECT_TIMEOUT, 20);
  //specify the read timeout
  if (!defined('MYSQLI_OPT_READ_TIMEOUT')) {
    $db_Online->options(MYSQLI_OPT_READ_TIMEOUT, 20);
  }


  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  try {
    // $db_Online = new mysqli($host, $user, $password, $db, $port);
    $db_Online->real_connect($host, $user, $password, $db, $port);
    $db_Online->set_charset($charset);
    $db_Online->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
  } catch (\mysqli_sql_exception $e) {
      throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
  }

  // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  // try {
	//    $db_Online = mysqli_connect($host, $user, $password, $db, $port);
  //    $db_Online->set_charset("utf8");
  //    $db_Online->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
  // } catch (\mysqli_sql_exception $e) {
  //     throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
  // }

	// if (mysqli_connect_errno()) {
	// 	printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	// 	exit();
	// }

	//Da Online Db in utf-8 gespeichert ist
	// $db_Online->set_charset("utf8");
	//printf("Initial character set: %s\n", $db_Online->character_set_name());

	return $db_Online;

}


function dbBefehlOnline ($query)
{

	global $db_Online;

  // // Perform query
  // if ($Abfrage = $db_Online -> query($query)) {
  //   // echo "Returned rows are: " . $Abfrage -> num_rows;
  //   // Free Abfrage set
  //   $Abfrage -> free_result();
  // }


  try{
    // $Abfrage = $db_Online -> query($query)
    $Abfrage = mysqli_query($db_Online,$query);
  } catch (\mysqli_sql_exception $e) {
      throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
  }

	// if (!$Abfrage) {
	// 	echo "Konnte Abfrage ($query) nicht erfolgreich ausführen von DB: " . mysqli_error($db_Online);
	// 	exit;
	// }
	return $Abfrage;

}

?>
