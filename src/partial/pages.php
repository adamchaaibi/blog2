<article class="pages">
<?php if($_GET['page'] > 1){ ?> 
<a href="/php-blog/blog-voorbeeld.php?page=<?php echo $_GET['page']-1; ?>"><</a><?php }else{ ?><p></p><?php } ?>
<?php while($numberPosts >= 0){ ?>
<a href="/php-blog/blog-voorbeeld.php?page=<?php echo $number ?>"><?php echo $number ?></a>
<?php $number++; $numberPosts-=$limit;} ?>
<?php if($_GET['page'] < $number-1){ ?> 
<a href="/php-blog/blog-voorbeeld.php?page=<?php echo $_GET['page']+1; ?>">></a><?php }else{ ?><p></p><?php } ?>
</article>