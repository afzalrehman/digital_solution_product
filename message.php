<?php
    if (isset($_SESSION['success'])) {
        echo '<div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                    ' . $_SESSION['success'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        unset($_SESSION['success']);
    }
    // if (isset($_SESSION['error_updated_penalty'])) {
    //     echo '<div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
    //         ' . $_SESSION['error_updated_penalty'] . '
    //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //     </div>';
    //     unset($_SESSION['error_updated_penalty']);
    // }
    ?>