<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Link CSS-->
    <link rel="stylesheet" href="./public/css/signIn.css">
    <title>meituhed</title>
</head>
<body>
    <div class="container">
        <section>
            <div class="mainFormSignIn">
                    <div class="signInform">
                            <h2>Sign in</h2>
                        <p class="small">Please input you information for login.</p>
                        <hr>
                        <form>
                                <div class="form-outline mb-3">
                                    <input style="font-size:small;" type="text" class="form-control" name="username" placeholder="username">
                                </div>
                                <div class="form-outline mb-3">
                                    <input style="font-size:small;" type="password" class="form-control" name="password" placeholder="password">
                                </div>
                            <div class="d-grid mt-3">
                                <input type="submit" class="btn btn-primary btn">
                            </div>
                        </form>
                        <div class="d-flex justify-content-sm-end">
                            <p class="text-xsmall">If you has't account can <a href="?route=#">Sign up</a></p>
                        </div>
                    </div>
                    <div class="picSignIn">
                        <img src="./public/images/signup-image.jpg" width="100%"alt="">
                    </div>
            </div>
        </section>
    </div>

</body>
</html>