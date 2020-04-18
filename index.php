<?php	
	//Import file connection.php
	require_once('connection.php');

	// // Lấy id bài viết
	// $query_id = "SELECT id FROM post where id=".$id;
	// $result_id = $connection->query($query_id);
	// $post_id = $result_id->fetch_assoc();
	// //Lấy id bài viết - end

	// In ra 6 bài viết Recent Post
	$query = "SELECT p.*, p.id as 'id_post', c.id as 'id', c.theme as 'theme' FROM posts p LEFT JOIN categories c ON p.category_id = c.id WHERE status = 1 and category_id = c.id ORDER BY created_at desc limit 6";
	//$query = "SELECT * FROM posts ORDER BY created_at desc limit 6;";
	//die($query);
	$result = $connection->query($query);
	$posts = array();
	while($row = $result->fetch_assoc()) {
		$posts[] = $row;
	}
	// In ra 6 bài viết Recent Post - end

	//In ra bài viết lớn 
	$query_2 = "SELECT p.*, p.id as 'id_post', c.id as 'id', c.theme as 'theme' FROM posts p LEFT JOIN categories c ON p.category_id = c.id WHERE status = 1 and category_id = c.id ORDER BY created_at desc limit 6,1;";
	$result_2 = $connection->query($query_2);
	$posts_2 = array();
	while($row = $result_2->fetch_assoc()) {
		$posts_2[] = $row;
	}
	//In ra bài viết lớn - end

	//In ra tiếp tục 6 bài sau bài viết lớn
	$query_3 = "SELECT p.*, p.id as 'id_post', c.id as 'id', c.theme as 'theme' FROM posts p LEFT JOIN categories c ON p.category_id = c.id WHERE status = 1 and category_id = c.id ORDER BY created_at desc limit 7,6;";
	$result_3 = $connection->query($query_3);
	$posts_3 = array();
	while($row = $result_3->fetch_assoc()) {
		$posts_3[] = $row;
	}
	//In ra tiếp tục 6 bài sau bài viết lớn - end

	// foreach ($posts as $cate) {
	// 	echo "<pre>";
	// 	print_r($cate);
	// 	echo "<pre>";
	// }
?>

<!DOCTYPE html>
<html lang="en">
	<!-- Head -->
	<?php require_once('head.php') ?>
	<!-- Head - end -->

	<body>
		<!-- Header -->
		<header id="header">
			<?php require_once('mainnav.php'); ?>
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>

					<?php
						foreach ($posts as $post) {
					?>
					<!-- post -->
					<div class="col-md-4" style="margin-bottom: 10px">
						<div class="post">
							<a class="post-img" href="blog-post.php?cate=<?php echo $post['id'];?>&id=<?php echo $post['id_post'];?>"><img src="<?php echo $post['image']; ?>" alt="" height="150px"></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-<?=$post['id'];?>" href="category.php?id=<?php echo $post['id'];?>"><?php echo $post['theme'];?></a>
									<span class="post-date"><?php echo $post['created_at']; ?></span>
								</div>
								<h3 class="post-title"><a class="title-index" href="blog-post.php?cate=<?php echo $post['id'];?>&id=<?php echo $post['id_post'];?>"><?php echo $post['title']; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					<?php } ?>

				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<?php 
								foreach ($posts_2 as $post2) {
							?>
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="blog-post.php?cate=<?php echo $post2['id'];?>&id=<?php echo $post2['id_post'];?>"><img src="<?php echo $post2['image']; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?=$post2['id'];?>" href="category.php?id=<?php echo $post2['id'];?>"><?php echo $post2['theme'];?></a>
											<span class="post-date"><?php echo $post2['created_at']; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?cate=<?php echo $post2['id'];?>&id=<?php echo $post2['id_post'];?>"><?php echo $post2['title']; ?></a></h3>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /post -->

							<?php 
								foreach ($posts_3 as $post3) {
							?>
							<!-- post -->
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.php?cate=<?php echo $post3['id'];?>&id=<?php echo $post3['id_post'];?>"><img src="<?php echo $post3['image']; ?>" alt="" height="150px"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?=$post3['id'];?>" href="category.php?id=<?php echo $post3['id'];?>"><?php echo $post3['theme'];?></a>
											<span class="post-date"><?php echo $post3['created_at']; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?cate=<?php echo $post3['id'];?>&id=<?php echo $post3['id_post'];?>"><?php echo $post3['title']; ?></a></h3>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /post -->

							
						</div>
					</div>

					<div class="col-md-4">
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php"><img src="./img/widget-1.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php"><img src="./img/widget-2.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php"><img src="./img/widget-3.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php"><img src="./img/widget-4.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>
						</div>
						<!-- /post widget -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.php"><img src="./img/post-2.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="category.html">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.php">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>

							<div class="post post-thumb">
								<a class="post-img" href="blog-post.php"><img src="./img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.php">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div>
						<!-- /post widget -->
						
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<?php require_once('footer.php'); ?>
		<!-- Footer - end -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
