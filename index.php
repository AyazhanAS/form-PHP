<?php
session_start();
require_once __DIR__."/incs/data.php";
require_once __DIR__."/incs/functions.php";

if(!empty($_POST)){
   
    $fields = load($fields);
 
    if($errors = validate($fields)){
        $res = ["answer"=>"error", "errors"=>$errors];
    }else{
        $res = ["answer"=>"ok", "data"=>$fields, "captcha"=>set_captcha()];
    }
    exit(json_encode($res));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" class="needs-validation mt-5 mb-5" novalidate id="form">
                    
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input name="name" type="text" class="form-control" id="name" required>
                            <div class="invalid-feedback">
                                please fill name
                            </div>

                            <label for="phone" class="form-label">phone</label>
                            <input name="phone" type="text" class="form-control" id="phone" required>
                            <div class="invalid-feedback">
                                please fill phone
                            </div>

                            <label for="address" class="form-label">address</label>
                            <input name="address" type="text" class="form-control" id="adrress" required>
                            <div class="invalid-feedback">
                                please fill address
                            </div>

                               
                            <label for="email" class="form-check-label">email</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">
                                please fill email
                            </div>

                            <label for="comment" class="form-label">comment</label>
                            <textarea name="comment" class="form-control" id="comment" required></textarea>
                            <div class="invalid-feedback">
                                please fill comment
                            </div>

                        
                            <label for="captcha" class="form-check-label"><?=set_captcha() ?></label>
                            <input id="label-captcha" name="captcha" type="text" class="form-control" id="captcha" required>
                            <div class="invalid-feedback">
                                please fill captcha
                            </div>

                            <label for="agree" class="form-check-label">Agree</label>
                            <input name="agree" type="checkbox" class="form-check-input" id="agree" required>
                            <div class="invalid-feedback">
                                please fill
                            </div>

                            
                            

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div class="mt-3" id="answer">

                            </div>
                            <div class="loader">
                                <img src="\incs\ajax-loading-icon-7.jpg" alt="">
                            </div>
                        </div>    
                </form>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="main.js"></script>
</body>
</html>