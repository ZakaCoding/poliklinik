<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- Error Handling php -->
    <h2 class="roboto-regular p-2">Edit Profile</h2>
    <div class="row p-4">
        <div class="col bg-white border-rounded-md  p-3">
            <h4 class="form-title">Update Your Name or Email</h4>
            <hr>
            <!-- spacer -->
            <div class="p-2"></div>
            <form action="<?= BASE_URL ?>" method="post">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control border-softblue <?= $invalid_name ?>" name="name" id="inputName" value="<?= $admin['name'] ?>">
                        <div class="invalid-feedback">
                            <?= $message; ?>
                        </div>
                    </div>
                </div>
                <!-- spacer -->
                <div class="p-2"></div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control border-softblue" aria-describedby="emailHelp" name="email" id="inputEmail" value="<?= $admin['email'] ?>">
                        <small id="emailHelp" class="form-text text-muted">    
                            * Change with your active email and dont forget to verification.
                        </small>

                        <!-- Alert if user has change their email -->
                        <?php
                            if($_SESSION['admin']['email'] != $admin['email']) :
                        ?>
                            <div class="p-1"></div>
                            <div class="alert alert-primary">
                                Your email has change. Please confirm your email so you can login again.
                            </div>
                        <?php
                            endif;
                        ?>

                    </div>
                </div>                    
                <!-- spacer -->
                <div class="p-2"></div>
                <div class="clearfix">
                    <button type="submit" class="btn btn-outline-success float-right">Save Changes</button>
                </div>
            </form>
        </div>
        <div class="p-2"></div>
        <div class="col bg-white border-rounded-md  p-3">
            <h4 class="form-title">Manage Your Social Login</h4>
            <hr>
            <!-- spacer -->
            <div class="p-2"></div>
            <p>Enable or disable login to Admin page from your social login.</p>
            <div class="p-2"></div>
            <div class="clearfix">
                <div class="float-left">
                    <div class="media">
                        <img src="<?= BASE_URL ?>asset/img/google.png" class="mr-3 logo-small" alt="...">
                        <div class="media-body p-1 align-middle">
                            Connect Google Account
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="" class="btn btn-outline-primary">Connect</a>
                </div>
            </div>
            <div class="p-2"></div>
            <div class="clearfix">
                <div class="float-left">
                    <div class="media">
                        <img src="<?= BASE_URL ?>asset/img/facebook.png" class="mr-3 logo-small" alt="...">
                        <div class="media-body p-1 align-middle">
                            Connect Facebook Account
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="" class="btn btn-outline-primary">Connect</a>
                </div>
            </div>
        </div>
        <div class="w-100 p-2"></div>
        <div class="col bg-white border-rounded-md  p-3">
            <h4 class="form-title">Update Your Password</h4>
            <hr>
            <!-- spacer -->
            <div class="p-2"></div>
            <form action="<?= BASE_URL ?>" method="post">
                <div class="form-group row">
                    <label for="inputCurr" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control border-softblue <?= $invalid_current ?>" name="currpass" id="inputCurr">
                        <div class="invalid-feedback">
                            <?= $message; ?>
                        </div>
                    </div>
                </div>
                <!-- spacer -->
                <div class="p-2"></div>
                <div class="form-group row">
                    <label for="pwdInput" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control border-softblue <?= $invalid_password ?>" aria-describedby="passwordlHelp" name="password" id="pwdInput">
                        <div class="invalid-feedback">
                            <?= $message; ?>
                        </div>
                        <small id="passwordlHelp" class="form-text text-muted">
                        Make sure it's <span id="min-length">at least 8 characters</span>
                        <span id="validate-number"> including a number</span> and a <span id="lowcase">lowercase letter.</span>
                        </small>
                    </div>
                </div>
                <!-- spacer -->
                <div class="p-2"></div>
                <div class="form-group row">
                    <label for="pwdConfirm" class="col-sm-2 col-form-label">Retype New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control border-softblue <?= $invalid_repass ?>" id="pwdConfirm" name="password2">
                        <div class="invalid-feedback">
                            <?= empty($message) ? "Your confirm password do not match" : $message; ?>
                        </div>
                    </div>
                </div>
                <!-- spacer -->
                <div class="p-2"></div>
                <div class="clearfix">
                    <button id="button" type="submit" class="btn btn-outline-success float-right">Save Changes</button>
                </div>
            </form>
        </div>
        <div class="p-2"></div>
        <div class="col bg-white border-rounded-md  p-3">Column</div>
    </div>
</div>