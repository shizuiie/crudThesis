<?php
include 'html/navBar.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add New Thesis</title>
    <style>
        .btn{
            padding: 10px;
            box-shadow: 0px 0px 10px 1px #888888;
        }
        .top{
            font-family: fantasy;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1 class = "top">Add New Thesis</h1>
            <div>
                <a href="index.php" class="btn btn-dark my-2" >Back</a>
            </div>
        </header>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <div class="form-element my-4">
                <label for="title"><b>Thesis Title:</b></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Thesis Title" required>
            </div>
            <div class="form-element my-4">
                <label for="author"><b>Author/s Name:</b></label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Author/s Name" required>
            </div>
            <div class="form-element my-4">
                <label for="course"><b>Select Course:</b></label>
                <select name="course" class="form-control" id="course" required>
                    <option value="">Select Course</option>
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    <option value="Bachelor of Science Hospitality Management">Bachelor of Science Hospitality Management</option>
                    <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                    <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
                    <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                    <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>
                    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                    <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                </select>
            </div>
            <div class="form-element my-4">
                <label for="year"><b>Select Publish Year:</b></label>
                <select name="year" class="form-control" id="year" required>
                    <option value="">Select Publish Year</option>
                    <?php
                    for ($year = 2000; $year <= 2024; $year++) {
                        echo "<option value='$year'>$year</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-element my-4">
                <label for="adviser"><b>Adviser Name:</b></label>
                <input type="text" class="form-control" id="adviser" name="adviser" placeholder="Adviser Name" required>
            </div>
            <div class="form-element my-4">
                <label for="abstract"><b>Thesis Abstract:</b></label>
                <input type="text" class="form-control" id="abstract" name="abstract" placeholder="Thesis Abstract" required>
            </div>
            <div class="form-element my-4">
                <label for="file"><b>Upload File:</b></label><br>
                <input type="file" class="
                " id="file" name="file" required>
            </div>
            <div class="form-element">
                <input type="submit" class="btn btn-secondary" name="create" value="Add Thesis">
            </div>
        </form>
    </div>
</body>
</html>