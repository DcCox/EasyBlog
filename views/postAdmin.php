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
        </div>
        <div class="container">
            <div class="postContent">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                    <label>
                        <h6>Titel</h6>
                        <input type="text" name="title" value="<?=$post['title']?>" class="form-item" autofocus required>
                    </label>
                    <label>
                        <h6>Date</h6>
                        <input type="date" name="date" value="<?=$post['date']?>"  class="form-item" required>
                    </label>
                    <label>
                        <h6>Text</h6>
                        <textarea class="form-item" name="text" required id="textpost"><?=$post['text']?></textarea>
                    </label>
                    <br>
                    <input type="submit" value="Post!" class="btn">
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