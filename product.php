<?php
include('config.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
<!-- partial:partials/_sidebar.html -->

<!-- partial -->

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="user.php">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product List</li> 
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Product List</h6>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>price</th>
                                    <th>User ID</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM products";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $no=1;
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?=  $row['product_name']; ?></td>
                                            <td><?=  $row['quantity']; ?></td>
                                            <td><?=  $row['price']; ?></td>
                                            <td><?=  $row['user_id']; ?></td>
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
@include('inc/footer.php');
?>