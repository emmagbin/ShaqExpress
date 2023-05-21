    <?php include(APPPATH . 'views/admin/common/header.php'); ?>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="account-page">
                <!-- <a href="dashboard" class="btn btn-primary apply-btn">dasbboard</a> -->
                <div class="container">
                    <h3 class="account-title"><?php echo $pagetitle ?></h3>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <div class="account-logo">
                                <a href="index.html"><img src="assets/img/logo2.png" alt="Focus Technologies"></a>
                            </div>
                            <form method="Post" action="verifying">
                                <div class="form-group form-focus">
                                    <label class="control-label">Username</label>
                                    <input class="form-control floating" name="username" type="text">
                                </div>
                                <div class="form-group form-focus">
                                    <label class="control-label">Password</label>
                                    <input class="form-control floating" name="password" type="password">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                                </div>
                                <div class="text-center">
                                    <a href="forgotpassword">Forgot your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include(APPPATH . 'views/admin/common/footer.php'); ?>
    </body>


    </html>