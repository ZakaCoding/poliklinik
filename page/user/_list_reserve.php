<?php
    // Set default time zone
    // Agar php server sama dengan punya user untuk waktunya
    date_default_timezone_set('Asia/Jakarta');
    $sql = $mysqli->query("SELECT * FROM tbl_reservasi WHERE user_id IN (SELECT user_id FROM users WHERE remember_token = '". $_SESSION['user']['token'] . "')");
    // Check data
    if($sql->num_rows > 0) :
        $mod = 1;
        while($data = $sql->fetch_assoc()):
?>
            <span class="p-2"><?= $data['created_at'] ?></span>
            <div class="p-1"></div>
            <div class="reservation-table ">
                <div class="bg-white border-rounded-md p-3">
                    <div class="clearfix">
                        <div class="float-left">        
                            <h5>Reservation ID <br><strong><?= $data['reservation_id'] ?></strong></h5>
                        </div>
                        <div class="float-right">
                            <div class="btn btn-outline-primary disabled"><?= $data['status'] ?></div>
                            <button type="button" data-toggle="modal" data-target="#modal<?= $mod ?>" class="btn btn-outline-info">Edit</button>
                            <a href="<?= BASE_URL ?>page/printPDF.php?rid=<?= $data['reservation_id'] ?>" class="btn btn-outline-success">Print</a>
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
        echo "<h1> Data not found </h1>";
    endif;
?>