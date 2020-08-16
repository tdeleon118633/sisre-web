<?php 
require_once "../modelos/asistencia_model.php";
if (strlen(session_id())<1)  
	session_start(); 
$asistencia=new Asistencia();

$id=isset($_POST["idasistencia"])? limpiarCadena($_POST["idasistencia"]):"";
$kind_id=isset($_POST["tipo_asistencia"])? limpiarCadena($_POST["tipo_asistencia"]):"";
$date_at=isset($_POST["fecha_asistencia"])? limpiarCadena($_POST["fecha_asistencia"]):"";
$alumn_id=isset($_POST["alumn_id"])? limpiarCadena($_POST["alumn_id"]):"";
$team_id=isset($_POST["idgrupo"])? limpiarCadena($_POST["idgrupo"]):"";
$user_id=$_SESSION["idusuario"];

switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($id)) {
		$rspta=$asistencia->insertar($kind_id,$date_at,$alumn_id,$team_id); 
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$asistencia->editar($id,$kind_id,$date_at,$alumn_id,$team_id);
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

		$rspta=$asistencia->verificar($date_at,$alumn_id,$team_id);
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
            "5"=>($reg->is_active)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-warning btn-xs" onclick="mostrar_precios('.$reg->id.')">P</i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.'<button class="btn btn-warning btn-xs" onclick="mostrar_precios('.$reg->id.')">P</i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>',
            "4"=>"<img src='../files/articulos/".$reg->image."' height='50px' width='50px'>",
            "0"=>$reg->name, 
            "1"=>$reg->lastname,
            "2"=>$reg->phone,
            "3"=>'<button class="btn btn-info btn-xs" onclick="verificar('.$reg->id.')"><i class="fa fa-check"></i> Marcar</button>'
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