<?php
require_once 'partial/header.php';
require_once 'backend/class/Post.php';
require_once 'backend/class/User.php';

$postIns = new Post();
$userIns = new User();

$post = $postIns->getPost($_GET['postId'])

?>

    <main>
    	<section class="producten">
			<table class="table table-hover">
		        <thead>
		            <tr>
		                <th>Title</th>
		                <th>Description</th>
                        <th>Body</th>
		                <th>Author</th>
		            </tr>
                <tr>
                  <td><?= $post->title; ?></td>
                  <td><?= $post->description; ?></td>
                  <td><?= $post->body; ?></td>
                  <td><?= $userIns->getAuthorUsernameById($post->author)->username; ?></td>
                </tr>
		        </thead>
		    </table>
    	</section>
    </main>

<?php
require_once 'partial/footer.php';
?>