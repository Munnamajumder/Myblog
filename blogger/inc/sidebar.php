		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>

					<?php

					$getAllCat = $cat->getAllCategoryPost();
					if ($getAllCat) {
						while ($result = $getAllCat->fetch_assoc()) {
				

					?>

						<li><a href="posts.php?category=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>


						<?php }} ?>					
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				

						<?php

					$getAllNew = $post->getAllLatestPost();
					if ($getAllNew) {
						while ($result = $getAllNew->fetch_assoc()) {
				

					?>
	            <div class="popular clear">
						<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
						<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/uploads/<?php echo $result['image']; ?>" alt="post image"/></a>
						<p>
					    <?php echo $fm->textShorten($result['body'], 125); ?>
			            </p>

						

					</div>

					<?php }} ?>	
					
				
	
			</div>
			
		</div>