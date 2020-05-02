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
        <div class="newNote">
            <div id="mainDiv">
                <h1>Notepad</h1>
                <form method="post">
                    <input type="text" name="title" size="32" value="Enter Note Title" onfocus="clearField(this);"><br>
                    <textarea cols="46" rows="15" name="note" onfocus="clearField(this);">Write your note here.</textarea>
                    <input class="button" type="submit" name="submit" value="New Note">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $note = $_POST['note'];
                        
                        if($title == "Enter Note Title" || $note == "Write your note here."){
                            echo "<html><h1 style='margin-top: 20%;text-align: center; color:RED;'>Sorry, you need to input both areas to create your file!<br>Redirecting you in 4 seconds</h1></html>";
                            header('Refresh: 4; index.php');
                        }else{
                            if(isset($note)){
                                $data = $note;
                                $title = $title . '.txt'; 
                                $fp = fopen("./txtFiles/$title", 'a');
                                fwrite($fp, $data);
                                fclose($fp);
                                echo 'Note Successfully added! Redirecting you to the main page.';
                                header('Refresh: 2; index.php');
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
