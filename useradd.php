<?php
include_once('config.php');
include_once('inc/function.php');
userAdd();
?>
<!-- partial:partials/_sidebar.html -->

<!-- partial -->
<?php 
include_once("inc/header.php");
include_once("inc/sidebar.php");
?>
<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">User</h6>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label  class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required  placeholder="Name">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required  placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" required placeholder="Age">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Upload Excel File</label>
                            <input type="file" class="form-control" name="products_file" accept=".xls,.xlsx"   placeholder="Upload Excel File">
                            <a href="products_sample.xlsx"  download="" class="btn btn-success me-2 mt-2" >Sample Excel File Format</a>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

    </div>


</div>

<?php
include_once('inc/footer.php');
?>