<?php

include_once("config.php");
include_once("inc/header.php");
include_once("./inc/sidebar.php");
?>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="product.php">Products List</a></li>
            <li class="breadcrumb-item active" aria-current="page">User List</li>
        </ol>
    </nav>

    <div class="row g-3 my-3">
        <div class="col-lg-12">
            <?php include('message.php') ?>
        </div>
        
       
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <a href="useradd.php" class="btn  px-4" style="background-color: #034EA2; color: white;"><i
                        class="bi bi-plus-lg me-2"></i>Add User</a>
            </div>
        </div>
    </div><!--end row-->


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">User List</h6>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">Data not Found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('inc/footer.php');
?>