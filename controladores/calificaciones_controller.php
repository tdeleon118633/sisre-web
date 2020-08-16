<?php 
require_once "../modelos/calificaciones_model.php";
if (strlen(session_id())<1) 
	session_start(); 
$asistencia=new Calificaciones();

$id=isset($_POST["idcalificacion"])? limpiarCadena($_POST["idcalificacion"]):"";
$val=isset($_POST["valor"])? limpiarCadena($_POST["valor"]):"";
$alumn_id=isset($_POST["alumn_id"])? limpiarCadena($_POST["alumn_id"]):"";
$block_id=isset($_POST["idcurso"])? limpiarCadena($_POST["idcurso"]):"";
$user_id=$_SESSION["idusuario"];

switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($id)) {
		$rspta=$asistencia->insertar($val,$alumn_id,$block_id); 
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$asistencia->editar($id,$val,$alumn_id,$block_id);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos"; 
	}
		break;
	

	case 'desactivar':
		$rspta=$asistencia->desactivar($id);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$asistencia->activar($id);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
	break;
	
	case 'mostrar':
		$rspta=$asistencia->mostrar($id);
		echo json_encode($rspta);
	break;
	case 'verificar':

		$rspta=$asistencia->verificar($alumn_id,$block_id);
		echo json_encode($rspta);
	break;

    case 'listar':
    			require_once "../modelos/alumnos_model.php";
			$alumnos=new Alumnos();
        $team_id=$_REQUEST["idgrupo"];
		$rspta=$alumnos->listar($user_id,$team_id);
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            //"0"=>($reg->is_active)?'<button class="btn btn-primary btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil-square-o"></i></button>'.' '.'<button class="btn btn-warning btn-xs" onclick="mostrar_precios('.$reg->id.')">P</i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-eraser"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil-square-o"></i></button>'.'<button class="btn btn-warning btn-xs" onclick="mostrar_precios('.$reg->id.')">P</i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>',
            "0"=>"<img src='../files/articulos/".$reg->image."' height='50px' width='50px'>",
            "1"=>$reg->name, 
            "2"=>$reg->lastname,
            "3"=>$reg->phone,
            "4"=>'<button class="btn btn-info btn-xs" onclick="verificar('.$reg->id.')"><i class="fa fa-check"></i> Calificar</button>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

}
 ?>