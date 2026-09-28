<!DOCTYPE html>
<html lang=>
    <head>
        <title>Ejercicio 3</title>
        <meta charset= "UTF-8"/>

        <style>
            ul {list-style-type: none;}
            .par    {color: blue;}
            .impar  {color: red;}
        </style>
    </head>
    <body>
        <ul>
            <?php
                for ($i=1; $i <= 100 ; $i++): 
                        echo "<li class=\"" .(($i%2==0)?"par":"impar"). "\">$i</li>"; 
                endfor;
            ?>
        </ul>
        

    </body>
</html>