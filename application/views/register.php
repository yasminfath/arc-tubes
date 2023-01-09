<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/logreg.css">
</head>

<style>
.container {
    width: 30%;
    margin-top: 9%;
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
    padding: 30px;
}

button {
    width: 45%;
}
</style>

<body>
    <div class="container">
        <h2 class="text-center"> REGISTER </h2>
        <form action="<?= base_url('submitRegister') ?>" name="registration" method="post">
            <div class="col-md-12 mb-3">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="col-md-12 mb-3">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Password">
            </div>
            <div class="col-md-12 text-center mb-3">
                <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Get Started For Free</button>
                <button type="reset" class=" btn btn-block mybtn btn-danger tx-tfm">Reset</button>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <p class="text-center"><a href="login.html" id="signin">Already have an account?</a></p>
                </div>
            </div>
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>