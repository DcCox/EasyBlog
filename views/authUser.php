<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../style.css">
		<link rel="stylesheet" type="text/css" href="../pbar/nprogress.css">
		<script src="../pbar/nprogress.js"></script>
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
			<a href="index.php?action=reg">Join me!</a>
        </div>
		<div class="container">
            <div class="postContent">
                <h1>LogIn</h1>
                <form method="post" action="index.php?action=<?=$_GET['action']?>">
                    <label>
                        <br>
                        <h6>LogIn</h6>
                        <input type="text" name="login" value="" class="form-item" placeholder="LogIn"  autofocus required id="login" onBlur="checkAvailability()"><br><span id="user-availability-status"></span>
                    </label>
                    <label>
                        <h6>Pass</h6>
                        <input type="password" name="password" value=""  class="form-item" placeholder="pass" required>
                    </label>
					<br>
					<!--
					<label>
                        <h6>No attach IP</h6>
                        <input type="checkbox" name="not_attach_ip">
                    </label>
-->
                    <br>
                    <br>
                    <input type="submit" id="submitButton" value="Let me in!" class="btn">
                </form>
            </div>
        </div>
		<footer>
                <p><br>My First Blog Copyright &copy; 2017</p>
        </footer>
		<script>
            NProgress.done();
        </script>
    </body>
</html>