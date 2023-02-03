<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Képek</title>
</head>
    <body>
    <a href="insertfile.php"><input type="button" value="Képek hozzáadása"></a>
        <?php
            $servername="localhost";
            $username="root";
            $pass="";
            $db="images";
            $conn=new mysqli($servername,$username,$pass,$db);
            $sql = "SELECT * FROM `images`;";
            $result=$conn->query($sql);
            if($result->num_rows>0)
            {
                while($row=$result->fetch_assoc())
                {
                    echo  '<img src="data:image/jpeg;base64,'.base64_encode( $row['data'] ).'"/>';
                    
                        
                    
                }
            }
           
            
        ?>    

    </body>
</html>