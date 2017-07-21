<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="pbar/nprogress.css">
        <script src="pbar/nprogress.js"></script>
<!--		<script src="script/authpanel.js"></script>-->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script>
        <title>My blog</title>
    </head>
    <body>
        <script>
            NProgress.start();
        </script>
        <div class="panelmy">
            <h1><a href="/">My first blog</a></h1>
			<?= "$login"?>
			<a id="newP" href="index.php?action=add">Create post</a> |
            <a id="reg" hidden="true" href="reg/index.php?action=reg">Join me!</a> | 
			<a id="auth" hidden="true" href="reg/index.php?action=auth">Log in!</a>
		</div>
        <div class="container">
            <div class="postContent">
                <?php foreach ($posts as $a): ?>
                <div class="post">
                    <h3><a href="post.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
                    <em id = "date">create: <?=$a['date']?></em>
                    <p><?=posts_intro($a['text'])?></p>
					<h5><em id = "date">Author: <?=$a['author']?></em></h5>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <footer>
            <p><br>My First Blog Copyright &copy; 2017</p>
        </footer>
		<script>
			var nick = "<?=$login?>";
			if(nick.trim() == ''){
				$("#reg").removeAttr("hidden");
				$("#auth").removeAttr("hidden");
				$("#newP").removeAttr("hidden");
			}
        </script>
        <script>
               NProgress.done(); 
        </script>
    </body>
</html> 