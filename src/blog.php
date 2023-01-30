<?php
require_once 'partial/header.php';
require_once 'backend/class/Post.php';
require_once 'backend/class/User.php';

$postIns = new Post();
$userIns = new User();

?>

    <main>
    	<section class="producten">
			<table class="table table-hover">
		        <thead>
		            <tr>
		                <th>Title</th>
		                <th>Description</th>
		                <th>Author</th>
		            </tr>
                <?php foreach($postIns->getPosts() as $post){ ?>
                <tr>
                  <td><a href="post.php?postId=<?= $post->id ?>"><?= $post->title; ?></a></td>
                  <td><?= $post->description; ?></td>
                  <td><?= $userIns->getAuthorUsernameById($post->author)->username; ?></td>
                </tr>
                <?php } ?>
		        </thead>
		    </table>
    	</section>
    </main>

<?php
require_once 'partial/footer.php';
?>