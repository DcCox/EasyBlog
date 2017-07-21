<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" type="text/css" href="../pbar/nprogress.css">
        <script src="../pbar/nprogress.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <a href="index.php?action=add">Create post</a>
            <div class="postContent">
                <table class="table">
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
						<th>Author</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($posts as $a): ?>
                    <tr>
                        <td><?=$a['date']?></td>
                        <td><?=$a['title']?></td>
						<td><?=$a['author']?></td>
                        <td><a href="index.php?action=edit&id=<?=$a['id']?>">Edit</a> </td>
                        <td><a onclick = "return confirm('Вы уверены?')" href="index.php?action=del&id=<?=$a['id']?>">Del</a> </td>
                    </tr>
                    <?php endforeach ?>
                </table>
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