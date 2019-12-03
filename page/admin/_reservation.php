<!-- Call this on admin page -->
<div class="tab-pane fade" id="pills-reserve" role="tabpanel" aria-labelledby="pills-reserve-tab">
    <h2 class="roboto-regular p-2">Data users</h2>
    <div class="row p-4"></div>
    <div class="col bg-white border-rounded-md p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Users Name</th>
                <th scope="col">NIM</th>
                <th scope="col">Poli</th>
                <th scope="col">Dibuat Pada</th>
                <th scope="col">Diperbarui Pada</th>
                </tr>
            </thead>
            <tbody>
                <!-- Print all data from database -->
                <?php
                    $users = $mysqli->query("SELECT * FROM `tbl_reservasi` JOIN `users` ON tbl_reservasi.user_id = users.user_id");
                    // Check data not empty
                    if($users->num_rows > 0) :
                        // // fetch all data to associative array
                        // $num = 1;
                        while($userData = $users->fetch_assoc()):
                            
                    ?>
                            <tr>
                                <th scope="row"><?= $userData['queue'] ?></th>
                                <td><?= $userData['name'] ?></td>
                                <td><?= $userData['nim'] ?></td>
                                <td><?= $userData['poli_category'] ?></td>
                                <td><?= $userData['created_at'] ?></td>
                                <td><?= $userData['updated_at'] ?></td>
                            </tr>
                <?php
                            $num++;
                        endwhile;
                    else:
                        echo "<h1 class='text-center p-4'> Data not found </h1>";
                    endif;
                ?>
            </tbody>
        </table>
    </div>
</div>