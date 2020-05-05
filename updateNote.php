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
    <?
        session_start();
    ?>
    <div class="layer">
    <?php
        $my_dir = './txtFiles/';

        //Getting files / directories function.
        function getDirs($path){
            $allContents = scandir($path);
            $contents = array_diff($allContents, array(".",".."));
            $dirs = array();
            foreach($contents as $content){
                if(!is_file($content)){
                    $dirs[] = $content;
                }
            }
            return $dirs;
        }

        //Getting content of a file.
        function getContent($title){
            $fileName = $title . '.txt';

            if ($fh = fopen("./txtFiles/$fileName", 'r')) {
                while (!feof($fh)) {
                    $fileContent = fgets($fh);
                    //echo $fileContent;
                }
                fclose($fh);
                return $fileContent;
            }
        }
    ?>
        <div id="content">
            <h1>Notepad - UPDATE</h1>
            <h2>Please select the note you want to UPDATE.</h2>
            <form method="post">
                <select name="toChange" class="select">
                    <?php foreach(getDirs($my_dir) as $dir){echo '<option class="'.$my_dir.'" value="' . $dir . '" >'. $dir . '</option>';}  ?>
                </select>
                <input class="button" type="submit" name="enter" value="Enter">
            </form>
            
            <form method="post">
                <input class="button" type="submit" name="back" value="Back">
            </form>
            <?php
            //Checking for buttons to execute update.
                if(isset($_POST['enter']) || isset($_POST['update'])){
                    if(!isset($_POST['update'])){
                        $_SESSION['noteToChange'] = $_POST['toChange'];
                        $noteTitle = str_replace(".txt", "", $_SESSION['noteToChange']);
                        $fileContent = getContent($noteTitle);

                        //Displaying data to be changed formated to field.
                        echo '
                        <form method="post">
                            <input type="text" name="title" size="32" value="' . $noteTitle . '" readonly><br>
                            <textarea cols="46" rows="15" name="note">'.$fileContent.'</textarea>
                            <input class="button" type="submit" name="update" value="Update">
                        </form>
                    ';
                    }
                    

                    //executing update.
                    if(isset($_POST['update'])){
                       update($_POST['title'],$_POST['note']);
                    }
                }

                //Back button.
                if(isset($_POST['back'])){
                    header('Location: index.php');
                }

                //Updating function.
                function update($title,$content){
                    $title = $title . ".txt";
                    $file_pointer = "./txtFiles/$title";

                    echo '<p style="color: green">Note Successfuly UPDATED</p>';

                    //Deleting file.
                    unlink($file_pointer);

                    //Creating new based on field contents.
                    $fp = fopen($file_pointer , 'a');
                    fwrite($fp, $content);
                    fclose($fp);
                }
            ?>
        </div>
    </div>
</body>
</html>
