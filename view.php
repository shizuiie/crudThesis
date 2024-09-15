<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Thesis Details</title>
    <style>
        .thesis-details{
            background-color: #f5f5f5;
            padding:50px;
            border: 1px solid;
            box-shadow: 5px 10px 8px 10px #888888;
        }
        .btn{
            background-color:#800000;
        }
        .top{
            font-family: fantasy;
        }
    </style>
</head>
<body>
    <div class="container">
    <header class = "d-flex justify-content-between my-4">
            <h1 class = "top" >Thesis Details</h1>
            <div>
                <a href="index.php" class = "btn btn-secondary">Back</a>
            </div>
        </header>
        <div class="thesis-details my-4">
            <?php
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    include("includes/connect.php");
                    $sql = "SELECT * FROM thesis WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                   ?> 
                    <h3>Title:</h3>
                    <p href="index.php"><?php echo $row["title"]; ?></p> <hr>
                    <h3>Author:</h3>
                    <p><?php echo $row["author"]; ?></p> <hr>
                    <h3>Course:</h3>
                    <p><?php echo $row["course"]; ?></p> <hr>
                    <h2>Date Publish</h2>
                    <p><?php echo $row["year"]; ?></p> <hr>
                    <h3>Adviser</h3>
                    <p><?php echo $row["adviser"]; ?></p> <hr>
                    <h3>Abstract</h3>
                    <p><?php echo $row["abstract"]; ?></p> <hr>
                    <h3>Document</h3>
                    <p><?php echo $row["file"]; ?></p> 
                   <?php
                }
            ?>
        </div>
    </div>
</body>
</html>