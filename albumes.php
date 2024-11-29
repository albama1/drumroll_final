<?php
$servername = "localhost:3306";
$database = "drumroll";
$username = "root";
$password = "";

$album=$_GET["album"];
$artista=$_GET["artista"];
$banda=$_GET["banda"];
$conexion = mysqli_connect($servername, $username, $password, $database);

$query="select * from albumes where id_albumes=" . $_GET["album"];
$query1="select cancion.* from cancion where $album=Albumes_id_albumes order by idcancion;";
$res1=mysqli_query($conexion, $query1);
$res=mysqli_query($conexion, $query);
$devuelve=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="style6.css">
    <link rel="icon" type="image/png" href="imagenes/image.png"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
    <header style="background-color:#2e2d2d;">
    <div >
            <a href="http://localhost/inicio/drumroll_incio.html">
            <img src="imagenes/image.png" style="height: 80px; width: 110px; padding-left: 35px;">
            </a>
        </div>
            <div class="searchBox" style="padding-right:400px">
              <input class="searchInput" type="text" name="" placeholder="Search something">
              <button class="searchButton" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="4 3 29 29" fill="none">
                  <g clip-path="url(#clip0_2_17)">
                    <g filter="url(#filter0_d_2_17)">
                      <path d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" shape-rendering="crispEdges"></path>
                    </g>
                  </g>
                  <defs>
                    <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                      <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                      <feOffset dy="4"></feOffset>
                      <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                      <feComposite in2="hardAlpha" operator="out"></feComposite>
                      <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
                      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape"></feBlend>
                    </filter>
                    <clipPath id="clip0_2_17">
                      <rect width="28.0702" height="28.0702" fill="white" transform="translate(0.403503 0.526367)"></rect>
                    </clipPath>
                  </defs>
                </svg>
    </header>
    <main>
      <div id="second-background">
      <div id="title">
        <h1 style=" margin-block-end: 0px;">  
          
          <?php
            if($artista==0){ ?>
              
            <?php
              if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select banda.* from banda join albumes on Banda_idBanda=banda.idBanda where Banda_idBanda=$banda"))["Nombre_banda"])){
              echo "-";    
              }
              else{
              echo mysqli_fetch_assoc(mysqli_query($conexion ,"select banda.* from banda join albumes on Banda_idBanda=banda.idBanda where Banda_idBanda=$banda"))["Nombre_banda"];
              }?>
        <?php } ?>
          
        <?php
          if($artista!=0){?>
            
          <?php
              if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select artista.* from artista join albumes on Artista_idArtista=artista.idArtista where Artista_idArtista=$artista"))["Nombre_artistico"])){
                echo "-";    
              }
                else{
              echo mysqli_fetch_assoc(mysqli_query($conexion ,"select artista.* from artista join albumes on Artista_idArtista=artista.idArtista where Artista_idArtista=$artista"))["Nombre_artistico"];
            }?>
          <?php } ?>
        
        
        
        - <?php 
            if(empty($devuelve["Nombre"])){
            echo "-";    
            }
            else{
            echo $devuelve["Nombre"];
            }
          ?></h1>
      <div class="general" style="width: 700px;">
      </div>
      </div>
      <div id="info-box">
        <table>
          <tr>
            <th> <div style="font-size: x-large;padding:20px;background-color: rgb(65, 29, 60);">
            <?php 
            if(empty($devuelve["Nombre"])){
            echo "-";    
            }
            else{
            echo $devuelve["Nombre"];
            }
          ?> </th></div>
          </tr>
          <tr>
            <td style="text-align: center;"><img  style="width:300px" src= <?php 
            if(empty($devuelve["imagen"])){
              echo "-";
            }
            else{
              echo $devuelve["imagen"];
            }
            ?> ></div></td>
          </tr>
          <tr>
            <td>
              <div class="subtitle">Datos generales</div>
              <table style="border-style: hidden;">
                <tr style="border-style: hidden;"><td style="border-style: hidden;">Autor/es</td><td>• 
                  <?php 
                      if($artista==0){?>
                        <a href="../banda/banda.php?banda=<?php echo $banda ?>">
                          <?php
                        if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select banda.* from banda join albumes on Banda_idBanda=banda.idBanda where Banda_idBanda=$banda"))["Nombre_banda"])){
                        echo "-";    
                        }
                        else{
                        echo mysqli_fetch_assoc(mysqli_query($conexion ,"select banda.* from banda join albumes on Banda_idBanda=banda.idBanda where Banda_idBanda=$banda"))["Nombre_banda"];
                        } ?>
                        </a>
                      <?php } ?>
                      <?php
                      if($artista!=0){?>
                          <a href="../art/art.php?artista=<?php echo $artista ?>">
                      <?php
                          if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select artista.* from artista join albumes on Artista_idArtista=artista.idArtista where Artista_idArtista=$artista"))["Nombre_artistico"])){
                            echo "-";    
                          }
                            else{
                          echo mysqli_fetch_assoc(mysqli_query($conexion ,"select artista.* from artista join albumes on Artista_idArtista=artista.idArtista where Artista_idArtista=$artista"))["Nombre_artistico"];
                        } ?>
                        </a>
                      <?php } ?>
                    
                </td></tr>
                

                <tr style="border-style: hidden;"><td style="border-style: hidden;">Discográfica</td> <td>•  <?php if(empty($devuelve["discografica"])){
                  echo "-";
                }
                else{
                  echo $devuelve["discografica"];
                } ?></td></tr>
                <tr style="border-style: hidden;"><td style="border-style: hidden;">Estudio</td> <td>• 
                  <?php if(empty($devuelve["estudio"])){
                    echo "-";
                  }
                  else{
                    echo $devuelve["estudio"];
                  }
                  ?>
                </td></tr>
                <tr style="border-style: hidden;"><td style="border-style: hidden;">Genero/s</td> <td>• 
                  <?php if(empty($devuelve["genero/s"])){
                    echo "-";
                  }
                  else{
                    echo $devuelve["genero/s"];
                  }
                  ?>
                </td></tr>
                <tr style="border-style: hidden;"><td style="border-style: hidden;">Fecha de lanzamiento</td> <td>• 
                <?php if(empty($devuelve["fecha_salida"])){
                    echo "-";
                  }
                  else{
                    echo $devuelve["fecha_salida"];
                  }
                  ?>
                </td></tr>
                <tr style="border-style: hidden;"><td style="border-style: hidden;">Duración(minutos)</td> <td>• 
                <?php if(empty($devuelve["duracion_album"])){
                    echo "-";
                  }
                  else{
                    echo $devuelve["duracion_album"];
                  }
                  ?>
                </td></tr>
                <tr style="border-style: hidden;"><td style="border-style: hidden;">Cantidad de canciones</td> <td>• 
                <?php
                    if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select count(Albumes_id_albumes) as count from cancion join albumes on Albumes_id_albumes = id_albumes where id_albumes=$album"))["count"])){
                      echo "-";    
                      }
                      else{
                      echo mysqli_fetch_assoc(mysqli_query($conexion ,"select count(Albumes_id_albumes) as count from cancion join albumes on Albumes_id_albumes = id_albumes where id_albumes=$album"))["count"];
                      }
                ?>
                </td></tr>
                    </table>
                <div class="subtitle">Canciones</div>
                <div style="padding-left:100px">
                <table style="width=100% ">
                <tr class="songs" style="border-style: hidden;" >
                  <th style="width=: 100%;"> 
                    <ul>
                    <?php
                      while($fila=mysqli_fetch_assoc($res1)){?>
                      <a href="../canciones/artista.php?banda=<?php echo $banda ?>&artista=<?php echo $artista?>&cancion=<?php echo $fila["idcancion"]?>">
                        <?php echo "<li>" . htmlspecialchars($fila["nombre_cancion"]) . "</li>";?>
                      </a>
                      <?php
                        
                      }
                    ?>
                    </ul>
                     </th>
                </tr>
              </table>
              </div>
            </td>
          </tr>
          
        </table>
      </div>
              
      
      <div class="text-title"> Historia </div>
      <div class="general" style="width: 700px;">
      </div>
      <div class="info-text" style="width: 560px;margin-bottom:80px">
            <?php 
            if(empty($devuelve["historia"])){
                echo "-";
              }
              else{
                echo $devuelve["historia"];
              }
            ?> 
      </div>
  
      <div class="text-title"  style="text-align:center; margin-top:150px"> Producción </div>
      <div class="general"></div>
      <div class=" info-text" style= "width: 560px;margin-bottom:80px">
      <?php 
            if(empty($devuelve["produccion"])){
                echo "-";
              }
              else{
                echo $devuelve["produccion"];
              }
            ?>
      </div>
      
      <div class="text-title"> Temática</div>
      <div class="general"></div>
      <div class="info-text2">
      <?php 
            if(empty($devuelve["tematica"])){
                echo "-";
              }
              else{
                echo $devuelve["tematica"];
              }
            ?>
      </div>
      <div class="text-title"> Diseño</div>
      <div class="general"></div>
      <div class="info-text2">
      <?php 
            if(empty($devuelve["diseño"])){
                echo "-";
              }
              else{
                echo $devuelve["diseño"];
              }
            ?>
      </div>
      <div class="text-title"> Recepción</div>
      <div class="general"></div>
      <div class="info-text2">
      <?php 
            if(empty($devuelve["recepcion"])){
                echo "-";
              }
              else{
                echo $devuelve["recepcion"];
              }
            ?>
      </div>
      <div class="text-title"> Éxito comercial</div>
      <div class="general"></div>
      <div class="info-text2">
      <?php 
            if(empty($devuelve["exito_comercial"])){
                echo "-";
              }
              else{
                echo $devuelve["exito_comercial"];
              }
            ?>
      </div>
      <div class="text-title"> Reconocimientos</div>
      <div class="general"></div>
      <div class="info-text2" style="margin-bottom:50px">
      <?php 
            if(empty($devuelve["reconocimientos"])){
                echo "-";
              }
              else{
                echo $devuelve["reconocimientos"];
              }
            ?>
      </div>
     
      </div>
    </div> 
    </div>  
     
    </main>
    <footer>
      <p>&copy; 2024 Página Web. Todos los derechos reservados.</p>
  </footer>
</body>