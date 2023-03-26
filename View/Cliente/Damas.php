<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <!-- CSS only -->
    <?php include "includes/cdnstop.php"?>  
    <title>Home</title>
</head>
<body>
    <!--inicio Header  -->
        <?php include "includes/header.php"?>    
    <!--Fin Header  -->
    
    <!--inicio menu  -->
     <?php include "includes/nav.php"?>   
    <!--Fin menu  -->

    <!-- Inicio Contenido-->
    <div class="main">
        <main>
        <!-- inicio productos-->
            <div class="container-items">
                <div class="item">
                    <figure>
                        <img src="../IMG/DAMA1.jpg" height="300" alt="producto"><br>
                    </figure>
                    <div class="info-product">
                        <h2>adidas</h2>
                        <p>Cuero alta calidad cosido reforzado color vino tinto</p>
                        <p class="price">$150000</p>
                        <button>Añadir</button>
                    </div>
                </div>        
            </div>   

            <div class="container-items">
                <div class="item">
                    <figure>
                        <img src="../IMG/DAMA2.jpg" height="300" alt="producto"><br>
                    </figure>
                    <div class="info-product">
                        <h2>Marca</h2>
                        <p>Cuero alta calidad cosido reforzado color vino tinto</p>
                        <p class="price">$150000</p>
                        <button>Añadir</button>
                    </div>    
                </div>
            </div>
            <div class="container-items">
                <div class="item">
                    <figure>
                        <img src="../IMG/DAMA3.jpg" height="300" alt="producto"><br>
                    </figure>
                    <div class="info-product">
                        <h2>Marca</h2>
                        <p>Cuero alta calidad cosido reforzado color vino tinto</p>
                        <p class="price">$150000</p>
                        <button>Añadir</button>
                    </div>
                </div>
            </div> 
            <!-- fin promocion2-->
        </main>
    </div>
    <!-- Fin Contenido-->

    <!-- Inicio footer -->
    <?php include "includes/footer.php"?> 
    <!-- fin footer -->

<!-- JavaScript Bundle with Popper -->
<?php include "includes/cdnsbot.php"?> 

</body>
</html>