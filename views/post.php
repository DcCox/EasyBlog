<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="pbar/nprogress.css" />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="pbar/nprogress.js"></script>
		<script src="../script/authpanel.js"></script>
        <title>My blog</title>
    </head>
    <body>
        <script>
            NProgress.start();
        </script>
        <div class="panelmy">
            <h1><a href="/">My first blog</a></h1>
			<?= "$login"?>
            <a id="reg" href="reg/index.php?action=reg">Join me!</a> | 
			<a id="auth" href="reg/index.php?action=auth">Log in!</a>
        </div>
        <div class="container">
            <div class="postContent">
                <div class="post">
                    <h3><?=$post['title']?></h3>
					<h5><em id = "author">Author: <?=$post['author']?></em></h5>
                    <em>create: <?=$post['date']?></em>
                    <p><?=$post['text']?></p>
                </div>
				<div id="comments">
					<h4>Comment on:</h4>
					<div class="comment">
						<form method="post" action="index.php?action=addcom&id=<?=$_GET['id']?>">
							<h5><em id = "author"><?=$login?></em></h5>
							<h6><?$dateCom = date("d.m.Y в G:i")?></h6>
							<h6><p><textarea class="form-itemCom" name="text" required id="textpost" placeholder="Your comment"></textarea></p></h6>
							<input type="submit" value="Comment it!" class="btn">
						</form>
					</div>
					<br>
					<?php foreach ($comments as $a): ?>
					<div class="comment">
						<h5><em id = "author"><?=$a['author']?></em></h5>
						<h6><?=$a['date']?></h6>
						<h6><?=$a['text']?></h6>
					</div>
					<br>
					<?php endforeach ?>
				</div>
            </div>
        </div>
        <footer>
            <p><br>My First Blog Copyright &copy; 2017</p>
        </footer>
		<script>
			var nick = "<?=$login?>";
			if(nick.trim() != ''){
			$("#reg").attr("hidden", true);
			$("#auth").attr("hidden", true);}
        </script>
        <script>
               NProgress.done(); 
        </script>
    </body>
</html> 