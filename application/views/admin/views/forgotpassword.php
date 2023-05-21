    <?php include(APPPATH . 'views/admin/common/header.php'); ?>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="account-page">
                <div class="container">
                    <h3 class="account-title">Management Login</h3>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <div class="account-logo">
                                <a href="index.html"><img src="assets/img/logo2.png" alt="Focus Technologies"></a>
                            </div>
                            <form>
                                <div class="form-group form-focus">
                                    <label class="control-label">Username or Email</label>
                                    <input class="form-control floating" type="text">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block account-btn" type="submit">Reset Password</button>
                                </div>
                                <div class="text-center">
                                    <a href="login">Back to Login</a>
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