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
        <div id="content">
            <h1>Notepad</h1>
            <form method="post">
                <input type="text" name="title" size="32" value="Enter Note Title" onfocus="clearField(this);"><br>
                <input type="submit" name="submit" value="New Note">
            </form>
            <?php
                // if(isset($_POST['submit'])){
                //     $title = $_POST['title'];
                    
                //     if($title == "Enter Note Title" || $title == ""){
                //         echo "<html><h1 style='margin-top: 20%;text-align: center; color:RED;'>Sorry, you need to input both areas to create your file!<br>Redirecting you in 4 seconds</h1></html>";
                //         header('Refresh: 4; index.php');
                //     }else{
                //         // $fp = fopen("./txtFiles/$title", 'a');
                //         // fread($fp);
                //         if(file_exists(`./txtFiles/$title`)){
                //             echo "It exists";
                //         }else{
                //             echo "sorry dude, not working.";
                //         }
                //     }
                // }

                $dir = "./txtFiles/";

                // Open a directory, and read its contents
                if (is_dir($dir)){
                if ($dh = opendir($dir)){
                    while (($file = readdir($dh)) !== false){
                    echo `  <select>
                            <option value="$file">$file</option> 
                            </select>
                        `;
                    //filename:" .$file ."<br>
                    }
                    closedir($dh);
                }
                }
            ?>
        </div>
    </div>
</body>
</html>
