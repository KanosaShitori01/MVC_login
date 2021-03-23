<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Signup Form</title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .war{
        color: red;
    }
</style>
<!-- <style>

.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .form form .form-control{
    height: 40px;
    font-size: 15px;
}
.container .form form .button{
    background: #0984e3;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.container .form form .button:hover{
    background: #5757d1;
}
.container .form form .link{
    padding: 5px 0;
}
.container .form form .link a{
    color: #6665ee;
}
.container .login-form form p{
    font-size: 14px;
}
.container .row .alert{
    font-size: 14px;
}</style> -->
<body class="signup_body">
    <div class="signup">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="index.php?home=signactive" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" v value="">
                    </div>
                    <?php
                        echo " <div class='form-group war'>
                            <p>{$errorTextUser}</p>
                        </div>";
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="manv" placeholder="Membership Code" v value="">
                    </div>
                    <?php
                        echo " <div class='form-group war'>
                            <p>{$errorTextCode}</p>
                        </div>";
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="jobvt" placeholder="Job Position" v>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" v>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" v>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup_submit" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? 
                      <a href="index.php?home=noactive">Login here</a>
                  </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
