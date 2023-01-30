<?php
require_once 'partial/header.php';
require_once 'backend/class/User.php';

$user = new User();

if(isset($_POST['register'])){
	echo $user->create($_POST);
}

?>

    <main>
    	<section class="form">
	    	<form method="post">
	    		<label for="username" id="username">Gebruikersnaam: </label>
	    		<input type="text" name="username" required>
	    		<label for="password">Wachtwoord: </label>
	    		<input type="password" name="password" required>
	    		<label for="conf-password">Wachtwoord bevestiging: </label>
	    		<input type="password" name="conf-password" required>
	    		<input type="submit" name="register" value="Register">
	    	</form>
    	</section>
    </main>


<?php
require_once 'partial/footer.php';
?>