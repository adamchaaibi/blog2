<?php
require_once 'partial/header.php';
require_once 'backend/class/Product.php';
require_once 'backend/class/Rating.php';

$ratingIns = new Rating();

$productIns = new Product();

$product = $productIns->getProduct($_GET['id']);

if(isset($_POST['rate'])){
	$ratingIns->rateProduct($_POST['name'], $_POST['description'], $_POST['rating'], $_GET['id']);
}

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
    <main>
    	<section class="producten">
	        <div>
	            <h3>Name</h3>
	            <p><?= $product->name ?></p>
	        </div>
	        <div>
	            <h3>Description</h3>
	            <p><?= $product->description ?></p>
	        </div>
	        <div>
	            <h3>Price</h3>
	            <p><?= $product->price ?></p>
	        </div>
	        <div>
	            <h3>Rating</h3>
	            <p><?= $ratingIns->getAverageRating($_GET['id'])->productRating ?></p>
	        </div>
    	</section>
    	<section class="form">
    		<form method="post">
    			<label for="name">Name: </label>
    			<input type="text" name="name" required>
    			<label for="description">Description: </label><br>
    			<textarea name="description" rows="3" required></textarea><br><br>
	    		<div class="rating">
				    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
				    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
				    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
				    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
				    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
				</div><br><br>
				<input type="submit" name="rate" value="Rate">
	    	</form>
    	</section>
    		<?php foreach($ratingIns->getAllRatings($_GET['id']) as $rating){ ?>
		    	<section class="ratings">
		    		<h3><?= $rating->name ?></h3>
		    		<p><?= $rating->description ?></p>
		    		<p><?= $rating->rating ?></p>
		    	</section>
	    	<?php } ?>
    </main>


<?php
require_once 'partial/footer.php';
?>