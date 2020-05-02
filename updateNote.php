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
        
        $my_dir = "./txtFiles/";
    ?>
        <div id="content">
            <h1>Notepad</h1>
            <h2>Please select the note you want to update.</h2>
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
                if(isset($_POST['back'])){
                    header('Location: index.php');
                }

                if(isset($_POST['enter'])){
                    $lala = onEnter();
                }

                if(isset($_POST['update'])){
                    echo $lala;
                }

                function onEnter(){
                    $noteToChange = $_POST['toChange'];
                    $noteTitle = str_replace(".txt", "", $noteToChange);
                    
                    echo '
                            <form method="post">
                                <input type="text" name="title" size="32" value="' . $noteTitle . '" onfocus="clearField(this);"><br>
                                <textarea cols="46" rows="15" name="note" onfocus="clearField(this);">Write your note here.</textarea>
                                <input class="button" type="submit" name="update" value="Update">
                            </form>
                        ';
                    return $noteToChange;
                }
            ?>
        </div>
    </div>
</body>
</html>
