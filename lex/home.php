<?php
	ob_start();
	session_start();

	if (!isset($_SESSION['id'])) {
		header("LOCATION: index.php?q=You must Login to see this page");
	    exit();
	}

	require 'connect.php';

	$id = $_SESSION['id'];

	$user = mysqli_query($con, "SELECT name, profile_pix FROM users WHERE id = '$id' ");

	$user = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome Home</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">		
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body data-bs-theme="dark">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">LexApp</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Profile</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<?php

	  	echo isset($_GET["q"]) ? 
	  		'<div class="alert alert-danger">'.$_GET["q"].'</div>' : "";

	  	echo isset($_GET["s"]) ? 
	  		'<div class="alert alert-success">'.$_GET["s"].'</div>' : "";
		?>
		
		<form method="post" action="post.php">
			
			<label>Start A POST </label> <br />
			<textarea name="post" placeholder="What on your mind!!"></textarea>
			<br />
			<button type="submit" class="btn btn-success">POST</button>
		</form>
		<hr />
		<?php

			$posts = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC ");
			if(mysqli_num_rows($posts) > 0) {

				while ($post = mysqli_fetch_assoc($posts)) {

					$userID = $post['user_id'];
					$postID = $post['id'];

					$userInf = mysqli_query($con, "SELECT name, profile_pix FROM users WHERE id = '$userID' ");

					$userInf = mysqli_fetch_assoc($userInf);

// check if we liked this post
$check = mysqli_query($con, "SELECT reaction FROM reactions WHERE user_id = '$id' AND 
	content_id = '$postID' AND 
	content_type = '1'");

if(mysqli_num_rows($check) > 0){
	$checkReaction = mysqli_fetch_assoc($check)['reaction'];
	if($checkReaction == 1){
		// this means the user liked the post
		$btnLikeStyle = "btn-outline-primary";
		$btnDisLikeStyle = "btn-primary";
	}else if($checkReaction == 2){
		// this means the user dislike the post
		$btnLikeStyle = "btn-primary";
		$btnDisLikeStyle = "btn-outline-primary";
	}else{
		// this means he did not liked or disliked
		$btnLikeStyle = "btn-primary";
		$btnDisLikeStyle = "btn-primary";
	}
}else{
	// the user has not liked
	$btnLikeStyle = "btn-primary";
	$btnDisLikeStyle = "btn-primary";
}

$countLikes = mysqli_query($con, "SELECT count(id) AS likes FROM reactions  WHERE reaction = '1' AND 
	content_id = '$postID' AND 
	content_type = '1'");

$countLikes = mysqli_fetch_assoc($countLikes)['likes'];

					echo '
						<div>
						<div class="d-flex flex-row mb-3">
								<img src="upload/avartar.png" class="img-thumbnail rounded-circle" style="width:60px; height:60px" />
								<div class="mx-2">
									<h4>'.$userInf['name'].'</h4>
									<small class="small">'.date("M j, Y", strtotime($post['created_at'])).'</small>
								</div>
						</div
							<p>'.str_replace(["\r\n", "\r", "\n"], "<br />", $post['post']).'</p>

	<a href="like.php?id='.$post['id'].'" class="btn '.$btnLikeStyle.' btn-sm ">Like 
		<i class="fa fa-thumbs-up"></i>
		<span class="badge rounded-pill bg-success"> ';

		echo $countLikes > 99 ? "99+": $countLikes ;
		echo '
  		</span>
	</a>

	<a class="btn '.$btnDisLikeStyle.' btn-sm">DisLike <i class="fa fa-thumbs-down"></i>
		<span class="badge rounded-pill bg-danger"> 99+
  		</span>
	</a>
						</div>
						<hr />
					';
				}
			}else{
				echo '
					<div>
						<p>
							You dont have any post yet
						</p>
					</div>
					<hr />
				';
			}
		?>
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>