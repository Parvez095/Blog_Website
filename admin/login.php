<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin | Blog Site</title>

    <?php include('./header.php'); ?>
    <?php
    session_start();
    if (isset($_SESSION['login_id'])) header("location:index.php?page=home");
    ?>

</head>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: skyblue;
    }

    main#main {
        background: white;
        /* max-width: 800px; */
		width: 30vw;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #login-right {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        height: 100%;
		width: 30vw;
    }

	#login-right .card {
    margin: 0; 
    border: none;
    box-shadow: none;
	}

	#login-form {
    padding: 10px;
	}


    #login-form .form-group {
        margin-bottom: 20px;
    }

    #login-form label {
        font-weight: bold;
    }

    #login-form input.form-control {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    #login-form button {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
    }

    #login-form button:hover {
        background-color: #0056b3;
    }
</style>

<body>

    <main id="main" class="alert-info">

        <div id="login-right">
            <div class="card col-md-8">
                <div class="card-body">
                    <form id="login-form">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>
<script>
    $('#login-form').submit(function (e) {
        e.preventDefault()
        $('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
        if ($(this).find('.alert-danger').length > 0)
            $(this).find('.alert-danger').remove();
        $.ajax({
            url: 'ajax.php?action=login',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err)
                $('#login-form button[type="button"]').removeAttr('disabled').html('Login');

            },
            success: function (resp) {
                if (resp == 1) {
                    location.reload('index.php?page=home');
                } else {
                    $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
                    $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
                }
            }
        })
    })
</script>

</html>
