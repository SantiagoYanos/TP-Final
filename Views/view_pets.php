<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view_pets</title>
</head>
<body>
<h1>My pets</h1>

<table style="text-align:center;" border="2">
            <thead>
                <tr>
                    
                    <th style="width: 150px;">photo</th> 
                    <th style="width: 150px;">name</th> 
                    <th style="width: 150px;">breed</th> 
                    <th style="width: 50px;">size</th> 
                    <th style="width: 150px;">vaccination note</th> 
                    <th style="width: 250px;">observations</th> 
                    <th style="width: 150px;">video</th> 
                    <th style="width: 150px;">action</th> 
                   
                </tr>

            </thead>

            <tbody>
                <?php  foreach($petList as $pet) 
                {
                    ?>
                <tr>
                    <td><img src="../images/rick-roll.gif" alt="rick" height="100" width="100" > </td>
                    <td><?php echo $pet->getName() ?> </td>
                    <td><?php echo $pet->getBreed() ?> </td>
                    <td><?php echo $pet->getSize() ?></td>
                    <td><img src=<?php echo $pet->getVaccination_plan() ?> alt="vac note"height="100" width="100" ></td>
                    <td><?php echo $pet->getObservation() ?> </td>
                    <td><img src="../images/rick-roll.gif" alt="pet video" height="100" width="100"> </td>
                    <td><button type="submit">select</button></td>
                    <?php
                    }
                    ?>
                    
                </tr>
                
            </tbody>
            

   


        </table>
        <div>
        <form action="<?php echo FRONT_ROOT . "Pet/ShowRegisterPet" ?>" method="post">
        <button type="submit">Add new pet</button> 
        </form>
    </div> <button type="submit">edit</button> <button type="submit">remove</button>

    
>>>>>>> 5cf321b19bb14237f14fbfea387aa17d74ded63f
</body>
</html>