<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!isset($_SESSION['user_data'])) {
    redirect(base_url());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!------ tittle of the browser ---------->
    <title>Result Entry</title>
    <!-- shot icon left top corner of browser -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/prime_logo.png">

    <!--Bootsrap 4 CDN-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <!-- <h3>Search your final result</h3> -->
                    <h4>ADMIN DASHBOARD</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dropdown head">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- print admin name from session -->
                                <?php echo $this->session->userdata('user_data')['0']->admin_user_username; ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loading-img">
                    <img src="<?php echo base_url(); ?>/assets/img/loading.gif" alt="Please wait">
                </div>
                <div class="row card-body">
                    <div class="col-md-2">
                        <?php
                        $this->load->view('include/menubar.php');
                        ?>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Permanent Campus: 114/116 Mazar Road, Mirpur-1, Dhaka 1216, Bangladesh.
                    </div>
                    <div class="d-flex justify-content-center links"><span class="pAddress">(Previous Address: 2A/1, North East of Darussalam Road, Mirpur-1, Dhaka 1216, Bangladesh, since inception in 2002 to 31st January 2017) </span></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>