<?php
include 'html/navBar.html';
include 'includes/header.php';
?>

<body>
    <div id="no-results" style="display: none;"></div>
    <div class="container ">
        <header class = "d-flex justify-content-between my-4">
            <h1 class = "top" >Thesis List</h1>
            <!-- *******FOR SEARCH************** -->
            <div class="search-box">
                <i class="material-icons">&#xE8B6;</i>
                <input type="text" id="search-input" class="form-control" placeholder="Search&hellip;">
            </div>

            <div>
                <a href="create.php" class = "btn btn-dark">Add New Thesis</a>
            </div>
        </header>
        <?php
        // session_start();
        if(isset($_SESSION["create"])){
            ?>
            <div class="alert alert-success">
                <?php
                 echo $_SESSION["create"];
                 unset($_SESSION["create"]);
                ?>
            </div>
            <?php
        }
        ?>

        <?php
       
        if(isset($_SESSION["edit"])){
            ?>
            <div class="alert alert-success">
                <?php
                 echo $_SESSION["edit"];
                 unset($_SESSION["edit"]);
                ?>
            </div>
            <?php
        }
        ?>

        <?php
        if(isset($_SESSION["delete"])){
            ?>
            <div class="alert alert-success">
                <?php
                 echo $_SESSION["delete"];
                 unset($_SESSION["delete"]);
                ?>
            </div>
            <?php
        }
        ?>

        <table id="thesis-table" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title<i class="fa fa-sort"></i></th>
                    <th>Author</th>
                    <th>Course</th>
                    <th>Year<i class="fa fa-sort"></i></th>
                    <th>Adviser</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("includes/connect.php");
                $sql =  "SELECT * FROM thesis";
                $result = mysqli_query($conn, $sql);
               
                while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["title"];?></td>
                            <td><?php echo $row["author"];?></td>
                            <td><?php echo $row["course"];?></td>
                            <td><?php echo $row["year"];?></td>
                            <td><?php echo $row["adviser"];?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row["id"]; ?>" class="view" title="View More"><i class="material-icons">&#xE417;</i></a>
                                <a href="edit.php?id=<?php echo $row["id"]; ?>" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                <a href="delete.php?id=<?php echo $row["id"]; ?>" class="delete" title="Delete"><i class="material-icons">&#xE872;</i></a>
                                <a href="download.php?id=<?php echo $row["id"]; ?>" class="download" title="Download"><i class="material-icons">&#xE2C4;</i></a>

                            </td>
                        </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- *********************************FOR MODAL************************************************* -->   
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
             Are you sure you want to delete this records?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="delete-btn">Delete</button>
            </div>
             </div>
        </div>
    </div>
    <script src="./js/noResultFound.js"></script>
    <script src="./js/deleteConfirmModal.js"></script>
    <script src="./js/sort.js"></script>
</body>
</html>