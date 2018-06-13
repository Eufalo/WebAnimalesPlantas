<?php
session_start();
?>
<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "Terrarios");

  // 1. Crear conexión con la BBDD
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("La conexión con la BBDD ha fallado: " .
         mysqli_connect_error() .
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<?php
function find_user_by_username($username, $password, $connection) {


		$safe_username = mysqli_real_escape_string($connection, $username);


		$query  = "SELECT password ";
		$query .= "FROM data_users ";
		$query .= "WHERE usuario = '$username'";
		$query .= "LIMIT 1";  //Como usename es primario no lo necesito
		echo "$query <br>";
		$user_set = mysqli_query($connection, $query);
		if (!$user_set) {
			die("Database query failed.");
		}

		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

function attempt_login($username, $password, $connection) {
		$user = find_user_by_username($username,$password, $connection);
		if ($user) {

			//user encontrado

			return $user;
    }

		 else {
			// user not found
			//echo "Usuario no encontrado";
			return false;
		}
	}



?>
<?php
echo "Esto es login.php";
if(isset($_POST['username']) && isset($_POST['password']) ) {
    // check if the username has been set
	$username = $_POST["username"];
	$password = $_POST["password"];

}
if(isset($_SESSION['username'])){
	echo "Sesion iniciada";
}
$found_user = attempt_login($username, $password, $connection);// comprobar Usuario

    if ($found_user) {// si esiste usuario
      // Success
			if(password_verify($password,$found_user["password"])){// comprobamos contraseña

                header("Location: " . "admin.php");
								// crear sesion
								$_SESSION['username']=$username;
								echo "<script>console.log( 'Sesion: " .$username."' );</script>";
            }
            else{
                header("Location: " . "login.php");
            }


    } else {
      // Failure
	  header("Location: " . "index.html");
    }


?>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>
