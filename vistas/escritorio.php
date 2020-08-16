<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

 
require 'header.php';

if ($_SESSION['escritorio']==1) {
$user_id=$_SESSION["idusuario"];
  require_once "../modelos/Consultas.php";
  $consulta = new Consultas();
  $rsptav = $consulta->cantidadalumnos($user_id);
  $regv=$rsptav->fetch_object();
  $totalestudiantes=$regv->total_alumnos;
  $cap_almacen=3000;

 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="panel-body">
<?php $rspta=$consulta->cantidadgrupos($user_id);
$colores = array("box box-danger direct-chat direct-chat-danger bg-blue");
      while ($reg=$rspta->fetch_object()) {
        $idgrupo=$reg->idgrupo;
        $nombre_grupo=$reg->nombre;
        ?>


<div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
          <!-- DIRECT CHAT SUCCESS -->
          <div class="<?php echo $colores[array_rand($colores)]; ?> box">
            <div class="box-header with-border">
              <h3 class="box-title"><b><?php echo $nombre_grupo; ?></b></h3>
              <!-- /.box-header boton entrar-->
              <div class="box-header" style="">
                  <a href="vista_grupo.php?idgrupo=<?php echo $idgrupo; ?>" class="btn-default pull-right" >Acceder <i class="fa fa-arrow-circle-right"></i></a>
              </div>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge" data-original-title="Estudiantes del Ciclo">
                  <?php 
                    $rsptag=$consulta->cantidadg($user_id,$idgrupo);
                    while ($regrupo=$rsptag->fetch_object()) {
                      echo $regrupo->total_alumnos;
                    }
                   ?>
                </span>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">

                    <?php
                    $rsptas=$consulta->cantidadalumnos_porgrupo($user_id,$idgrupo);
                    while ($reg=$rsptas->fetch_object()){

                      
                   if (empty($reg->image)){
                    echo ' <img class="img-circle" src="../files/articulos/anonymous.png" height="50px" width="50px">';
                    

                  }else echo '<img class="img-circle" src="../files/articulos/anonimous2.png'. $reg->image.'" height="50px" width="50px">';
                     
                     } ?>
   
                </div>
              </div>

            </div>
  
          </div>
         
        </div>


<?php } ?>


</div>

<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>

 <?php 
}

ob_end_flush();
  ?>

