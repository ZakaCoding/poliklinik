<?php 
    include_once("../config/config.php");
    session_start();
    // check user has login or nah
    if(isset($_SESSION['user']))
    {   
        // First check status is login on session data
        if($_SESSION['user']['login']) //if true
        {
            // Then check all data session is match
            // die($_SESSION['user']['email']);
            $query = $mysqli->query("SELECT * FROM `users` WHERE remember_token = '". $_SESSION['user']['token'] ."' LIMIT 1");
            if($query->num_rows == 0)
            {
                // Remove session login
                unset($_SESSION['user']);
                session_destroy();
                // Redirect to login page
                header("location: ".BASE_URL.'page/auth/login.php');
                exit(1);
            }
        }
        else
        {
            // Redirect to login page
            // die("this 2");
            header("location: ".BASE_URL.'page/auth/login.php');
            exit(1);
        }
    }
    else
    {
        // Redirect to login page
        // die("This 3");
        header("location: ".BASE_URL.'page/auth/login.php');
        exit(1);
    }
    
    // Data disini bray >>
    // get data from database
    $user = $mysqli->query("SELECT * FROM users WHERE remember_token = '". $_SESSION['user']['token'] . "'");
    if($user->num_rows > 0)
    {
        // Fetch to array data
        $user = $user->fetch_assoc();
        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
    }
    /**
     * System Error handling
     */
    // get error data if any
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : NULL;
    // die(var_dump($error));
    $invalid_name = '';
    $invalid_current = '';
    $invalid_password = '';
    $invalid_repass = '';
    if($error != NULL)
    {
        // has error on form input
        $message = $error['message'];
        switch ($error['errorCode']) {
            case 'ERR_EMPTY_NAME':
                # code...
                $invalid_name = 'is-invalid';
                break;
                case 'ERR_INVALID_NAME':
                    # code...
                    $invalid_name = 'is-invalid';
                    break;
            case 'ERR_EMPTY_CURR':
                # code...
                $invalid_current = 'is-invalid';
                break;
            case 'ERR_EMPTY_PASSWORD':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_EMPTY_REPASS':
                # code...
                $invalid_repass = 'is-invalid';
                break;
            case 'WARNING_PASSWORD_LIMIT':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_WRONG_PASSWORD':
                # code...
                $invalid_password = 'is-invalid';
                break;
            case 'ERR_INVALID_CURR':
                # code...
                $invalid_current = 'is-invalid';
                break;
            case 'ERR_PASSWORD_MISMATCH':
                # code...
                $invalid_repass = 'is-invalid';
                break;
            default:
                # code...
                break;
        }
    }
    $data = $mysqli->query("SELECT * FROM tbl_reservasi WHERE user_id IN (SELECT user_id FROM users WHERE remember_token = '". $_SESSION['user']['token'] . "')");
    if($data->num_rows > 0)
    {
        // Fetch to array data
        $data = $data->fetch_assoc();
        // How to use this data
        // like this example.
        // you want data email then code is
        // $user['email'] --> output program "zakanoor@outlook.co.id"
        // For numbering
        $i++;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poliklinik | user</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">
    <!-- Vendor css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/node_modules/animate.css/animate.min.css">
    <!-- Sweet alert -->
    <link rel="stylesheet" href="<?= BASE_URL ?>vendor/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- Sweet alert 2 -->
   <script src="<?= BASE_URL ?>vendor/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</head>
<body class="roboto-regular" onload="printShow()">
    <div class="p-4"></div>
    <div class="container">
        <?php
        $rid = $_GET['rid'];

        if(!isset($rid))
        {
            // redirect to user page
            header("location:".BASE_URL."page/user");
            exit();
        }
        
        if(empty($rid))
        {
            // redirect to user page
            header("location:".BASE_URL."page/user");
            exit();
        }
        // Set default time zone
        // Agar php server sama dengan punya user untuk waktunya
        date_default_timezone_set('Asia/Jakarta');
        $sql = $mysqli->query("SELECT * FROM tbl_reservasi WHERE reservation_id = '$rid'");
        // Check data
        if($sql->num_rows > 0) :
            $mod = 1;
            while($data = $sql->fetch_assoc()):
        ?>
                    <span class="p-2"><?= $data['created_at'] ?></span>
                    <div class="p-1"></div>
                    <div class="reservation-table">
                        <div class="bg-smoke border-rounded-md p-3">
                            <div class="clearfix">
                                <div class="float-left">        
                                    <h5>Reservation ID <br><strong><?= $data['reservation_id'] ?></strong></h5>
                                </div>
                                <div class="float-right">
                                    <div class="btn btn-outline-primary disabled"><?= $data['status'] ?></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row p-2">
                                <div class="col col-md3">
                                    <strong><?= date('l', strtotime($data['reservased_at'])) ?></strong>
                                    <br> 
                                    <h4 class="date-reservation"><?= date('d D', strtotime($data['reservased_at'])) ?></h4><br><?= date('Y', strtotime($data['reservased_at'])) ?>
                                </div>
                                <div class="border-right"></div>
                                <div class="col col-md3">
                                    <strong>Poli Category</strong>
                                    <br> 
                                    <h4 class="date-reservation"><?= $data['poli_category'] ?></h4>
                                </div>
                                <div class="border-right"></div>
                                <div class="col col-md3">
                                    <strong>Queue Number</strong>
                                    <br> 
                                    <h4 class="date-reservation"><?= $data['queue'] ?></h4>
                                </div>
                                <div class="border-right"></div>
                                <div class="col col-md3">
                                    <strong>Your Ticket</strong>
                                    <br> 
                                    <h3 class="">
                                        <strong><?= $data['ticket'] ?></strong>
                                    </h3>
                                </div>
                            </div>
                            <hr>
                            <div class="p-2"></div>
                            <div class="complaint-msg p-2">
                                <strong>Your complaint : </strong><br>
                                <p>"<?= $data['complaint'] ?>"</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2"></div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?= $mod ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header p-4">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit your reservation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="p-2"></div>
                            <div class="modal-body">
                                <form action="<?= BASE_URL ?>function/f_update_reserve.php" method="post">
                                    <div class="form-group row">
                                        <label for="inputID" class="col-sm-2 col-form-label">Reservation ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control border-softblue <?= $invalid_name ?>" name="reserveID" id="inputID" value="<?= $data['reservation_id'] ?>" readonly>
                                            <div class="invalid-feedback">
                                                <?= $message; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- spacer -->
                                    <div class="p-2"></div>
                                    <div class="form-group row">
                                        <label for="inputDate" class="col-sm-2 col-form-label">Checkup date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control border-softblue <?= $invalid_name ?>" name="dateReserve" id="inputDate" value="<?= $data['reservased_at'] ?>" min="<?= date('Y-m-d') ?>">
                                            <div class="invalid-feedback">
                                                <?= $message; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- spacer -->
                                    <div class="p-2"></div>
                                    <div class="form-group row">
                                        <label for="inputPoli" class="col-sm-2 col-form-label">Poli Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control border-softblue <?= $invalid_name ?>" name="poliCategory" id="inputPoli">
                                                <option value="Poli Umum">Poli Umum</option>
                                                <option value="Poli Gigi">Poli Gigi</option>
                                                <option value="Poli Ibu dan Anak">Poli Ibu dan Anak</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $message; ?>
                                            </div>
                                        </div>
                                    </div>           
                                    <!-- spacer -->
                                    <div class="p-2"></div>
                                    <div class="form-group row">
                                        <label for="inputComplaint" class="col-sm-2 col-form-label">Complaint</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control border-softblue <?= $invalid_name ?>" style="height: 120px;" name="complaint" id="inputComplaint"><?= $data['complaint'] ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $message; ?>
                                            </div>
                                        </div>
                                    </div>           
                                    <!-- spacer -->
                                    <div class="p-2"></div>
                                    <div class="clearfix">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-outline-success float-right">Save Changes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="modal-footer">
                            </div> -->
                            <div class="p-2"></div>
                        </div>
                    </div>
                    </div>
        <?php
                    $mod++;
                endwhile;
            else:
                // redirect to user page
                header("location:".BASE_URL."page/user");
                exit();
            endif;
        ?>
    </div>

   <!-- Javascript Vendor-->
    <script src="<?= BASE_URL ?>vendor/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/js/bootstrap.min.js"></script>
    <!-- Javascript here -->
    <script src="<?= BASE_URL ?>js/register_validation.js"></script>
    <script>
        window.print();
    </script>
</body>
</html>
<?php
    // Destroy session flash Message
    unset($_SESSION['flashMessage']);
    unset($_SESSION['error']);
?>