<!-- Call this on admin page -->
<div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
    <h2 class="roboto-regular p-2">Data users</h2>
    <div class="row p-4"></div>
    <div class="col bg-white border-rounded-md p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Users Name</th>
                <th scope="col">NIM</th>
                <th scope="col">Email</th>
                <th scope="col">Email Verified</th>
                <th scope="col">Users Password</th>
                </tr>
            </thead>
            <tbody>
                <!-- Print all data from database -->
                <?php
                    $users = $mysqli->query("SELECT `name`, `nim`, `email`,`email_verified_at`,`password` FROM `users`");
                    // Check data not empty
                    if($users->num_rows > 0) :
                        // fetch all data to associative array
                        $num = 1;
                        while($userData = $users->fetch_assoc()):
                            
                    ?>
                            <tr>
                                <th scope="row"><?= $num ?></th>
                                <td><?= $userData['name'] ?></td>
                                <td><?= $userData['nim'] ?></td>
                                <td><?= $userData['email'] ?></td>
                                <td><?= $userData['email_verified_at'] ?></td>
                                <td>Secret</td>
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