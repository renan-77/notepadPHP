<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Notepad</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/bebas" type="text/css"/> 
    <script src='script.js'></script>
</head>
<body>
    <div class="layer">
        <div class="choose">
            <h1>Notepad</h1>
            <form method="post">
                <input class="button" type="submit" name="new" value="New Note">
                <input class="button" type="submit" name="update" value="Update Note">
                <input class="button" type="submit" name="delete" value="Delete Note">
            </form>
            <?php   
                if(isset($_POST['new'])){
                    header('Location: saveNote.php');
                }if(isset($_POST['update'])){
                    header('Location: updateNote.php');
                }if(isset($_POST['delete'])){
                    header('Location: deleteNote.php');
                }
            ?>
        </div>
    </div>
</body>
</html>