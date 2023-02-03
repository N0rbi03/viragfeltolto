<form method="post" enctype="multipart/form-data" >
            <input type="file" name="image" />
            <input type="submit" />
        </form>
        <a href="test.php"><input type="button" value="képek megtekintése"></a>
        
       <?php
       if ( isset($_FILES['image']['tmp_name']) ) {
            $servername="localhost";
            $username="root";
            $pass="";
            $db="images";
            $conn=new mysqli($servername,$username,$pass,$db);
        
            
            $binary = file_get_contents($_FILES['image']['tmp_name']);
            $finfo = new finfo(FILEINFO_MIME);
            $type = $finfo->file($_FILES['image']['tmp_name']);
            $mime = substr($type, 0, strpos($type, ';'));
        
            $query = "INSERT INTO `images` (`data`,`mime`,`name`) 
           VALUES('".$conn->real_escape_string($binary)."',
            '".$conn->real_escape_string($mime)."',
            '".$conn->real_escape_string($_FILES['image']['name'])."')";
            $conn->query($query);
            
       }
       ?>