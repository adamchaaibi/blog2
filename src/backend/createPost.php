<?php
require_once 'partial/header.php';
require_once 'class/Post.php';

$postIns = new Post();

if(isset($_POST['create'])){
	echo $postIns->create($_POST);
}

?>

    <main>
    	<section class="form">
	    	<form method="post">
	    		<label for="title">title: </label>
	    		<input type="text" name="title" required>
	    		<label for="description">Description: </label>
	    		<input type="text" name="description" required>
	    		<label for="body">Body: </label><br>
	    		<textarea name="body"></textarea><br>
	    		<label for="author">Author: </label>
	    		<input type="text" name="author" value="<?= $_SESSION['user_id'] ?>" required readonly>
	    		<input type="submit" name="create" value="Create post">
	    	</form>
    	</section>
    </main>


<?php
require_once 'partial/footer.php';
?>