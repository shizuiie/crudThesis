<?php
include 'html/navBar.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Thesis</title>
    <style>
        .top{
            font-family: fantasy;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class = "d-flex justify-content-between my-4">
            <h1 class = "top" >Edit Thesis</h1>
            <div>
                <a href="index.php" class = "btn btn-dark">Back</a>
            </div>
        </header>
        <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            include("includes/connect.php");
            $sql = "SELECT * FROM thesis WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            ?>
            <form action="process.php" method="post">
            <div class="from-element my-4">
                <label for="title"><b>Thesis Title:</b></label>
                <input type="text" class = "form-control" name = "title" value = "<?php echo $row["title"];?>" placeholder = "Thesis Title" >
            </div>
            <div class="from-element my-4">
                <label for="author"><b>Author/s Name:</b></label>
                <input type="text" class = "form-control" name = "author" value = "<?php echo $row["author"];?>" placeholder = "Author/s Name" >
            </div>
            <div class="from-element my-4">
                <label for="course"><b>Select Course:</b></label>
                <select name = "course" class = "form-control">
                    <option value="">Select Course</option>

                    <option value="Bachelor of Science in Nursing"
                    <?php if($row['course']=="Bachelor of Science in Nursing"){echo "selected";}
                    ?>>Bachelor of Science in Nursing</option>

                    <option value="Bachelor of Science in Accountancy"
                    <?php if($row['course']=="Bachelor of Science in Accountancy"){echo "selected";}
                    ?>>Bachelor of Science in Accountancy</option>

                    <option value="Bachelor of Science Hospitality Management" 
                    <?php if($row['course']=="Bachelor of Science Hospitality Management"){echo "selected";}
                    ?>>Bachelor of Science Hospitality Management</option>

                    <option value="Bachelor of Science in Tourism Management" 
                    <?php if($row['course']=="Bachelor of Science in Tourism Management"){echo "selected";}
                    ?>>Bachelor of Science in Tourism Management</option>

                    <option value="Bachelor of Science in Computer Science" <?php if($row['course']=="Bachelor of Science in Computer Science"){echo "selected";}
                    ?>>Bachelor of Science in Computer Science</option>

                    <option value="Bachelor of Arts in Psychology" 
                    <?php if($row['course']=="Bachelor of Arts in Psychology"){echo "selected";}
                    ?>>Bachelor of Arts in Psychology</option>
                    
                    <option value="Bachelor of Science in Computer Engineering" 
                    <?php if($row['course']=="Bachelor of Science in Computer Engineering"){echo "selected";}
                    ?>>Bachelor of Science in Computer Engineering</option>

                    <option value="Bachelor of Science in Business Administration"
                    <?php if($row['course']=="Bachelor of Science in Business Administration"){echo "selected";}
                    ?>>Bachelor of Science in Business Administration</option>

                    <option value="Bachelor of Elementary Education"
                    <?php if($row['course']=="Bachelor of Elementary Education"){echo "selected";}
                    ?>>Bachelor of Elementary Education</option>

                    <option value="Bachelor of Secondary Education"
                    <?php if($row['course']=="Bachelor of Secondary Education"){echo "selected";}
                    ?>>Bachelor of Secondary Education</option>
                </select>
            </div>
            <div class="from-element my-4">
                <label for="year"><b>Select Publish Year:</b></label>
                <select name = "year" class = "form-control">
                <?php
                    for ($year = 2000; $year <= 2024; $year++) {
                        echo "<option value='$year'>$year</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="from-element my-4">
                <label for="adviser"><b>Adviser Name:</b></label>
                <input type="text" class = "form-control" name = "adviser" value = "<?php echo $row["adviser"];?>" placeholder = "Adviser Name:" >
            </div>
            <div class="from-element my-4">
                <label for="abstract"><b>Thesis Abstract:</b></label>
                <input type="text" class = "form-control" name = "abstract" value = "<?php echo $row["abstract"];?>" placeholder = "Thesis Abstract:" >
            </div>
            <div class="from-element my-4">
                <label for="file"><b>Upload File:</b></label><br>
                <input type="file" class = "" name = "file" value = "<?php echo $row["file"];?>" >
            </div>
            <input type="hidden" name = "id" value = '<?php echo $row['id'];?>'>
            <div class="form-element">
                <input type="submit" class="btn btn-secondary" name = "edit" value = "Edit Thesis">
            </div>
        </form>
        <?php
        }
        ?>
       
    </div>
</body>
</html>