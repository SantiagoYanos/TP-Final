<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="..\Views\css\styleRegister.css">-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&display=swap" rel="stylesheet">
    <title>Guardian Register</title>
</head>

<body>
    <h1>Guardian Register</h1>
    <h2>Add your info: </h2><br>

    <form action="<?php echo FRONT_ROOT . "Auth/RegisterGuardian" ?>" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" placeholder="Name"></br>
        <label for="">Last Name: </label>
        <input type="text" name="last_name" placeholder="Last Name"></br>
        <label for="cuil">Cuil: </label>
        <input type="text" name="cuil" placeholder="CUIL"></br>
        <label for="">Email: </label>
        <input type="email" name="email" placeholder="Email"></br>
        <label for="">Password: </label>
        <input type="password" name="password" placeholder="Password"></br>
        <label for="">Adress: </label>
        <input type="text" name="adress" placeholder="Adress"></br>
        <label for="">Phone: </label>
        <input type="phone" name="phone" placeholder="Phone"></br>

        <label for="prefered_size">Pet Size Preference: </label>
        <select name="prefered_size" id="prefered_size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="big">Big</option>
        </select></br>

        <label for="birthdate">Birthdate: </label>
        <input type="date" name="birth_date"></br>

        <!--<input type="checkbox" name="terms_conditions" value="terms_conditions" required> </input>-->
        <!--<a href="./images/rick-roll.gif">I agree to the terms and conditions</a></br>-->

        <button type="submit">Register</button>
    </form>
</body>

</html>