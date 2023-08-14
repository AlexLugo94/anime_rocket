<?php
class modules extends mysqli
{
    public function __construct()
    {
        $this->conexion= new mysqli("localhost", "root", "", "anime_rocket");
    }

    public function get_data()
    {
        $consulta = "SELECT * FROM videos";
        $result = $this->conexion->query($consulta);
        $array = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $array[] = [
            "id" => $row["id"],
            "anime" => $row["anime"],
            "foto" => $row["thumbnail"],
            "video" => $row["archivo"],
            "categoria" => $row["categoria"],
            "capitulo" => $row["capitulo"],
            "fechai" => $row["fecha_insercion"],
            "fechap" => $row["fecha_publicacion"],
            "orden" => $row["orden"],
            "status" => $row["v_status"],
            ];
        }
        echo json_encode($array);
    }
    public function get_one($id)
    {
        $consulta = "SELECT * FROM videos  WHERE id = $id";
        $result = $this->conexion->query($consulta);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $array = [
            "id" => $row["id"],
            "capitulo" => $row["capitulo"],
            "foto" => $row["thumbnail"],
            "video" => $row["archivo"],
            "categoria" => $row["categoria"],
            "anime" => $row["anime"],
            "fechai" => $row["fecha_insercion"],
            "fechap" => $row["fecha_publicacion"],
            "status" => $row["v_status"]
        ];
        echo json_encode($array);
    }

    public function insert_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['foto'];
        $archivo = $_POST['video'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fechai'];
        $fecha_publicacion = $_POST['fechap'];
        $v_status = $_POST['status'];

        $consulta = "INSERT INTO videos (capitulo, thumbnail, archivo, categoria, anime, v_status, fecha_insercion, fecha_publicacion) VALUES ('$capitulo', '$thumbnail', '$archivo', '$categoria', '$anime','$v_status', '$fecha_insercion', '$fecha_publicacion')";
        $result = mysqli::query($consulta);
        if ($result) {
            $array = [
            "status" => "success",
            "text" => "Se insertó correctamente"
        ];
        }else{
            $array = [
                "status" => "error",
                "text" => "No se pudo insertar el registro"
            ];
        }
        echo json_encode($array);
    }
    
    public function update_data()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $capitulo = $_POST['capitulo'];
        $thumbnail = $_POST['foto'];
        $archivo = $_POST['video'];
        $categoria = $_POST['categoria'];
        $anime = $_POST['anime'];
        $fecha_insercion = $_POST['fechai'];
        $fecha_publicacion = $_POST['fechap'];
        $v_status = $_POST['status'];
        $id = $_POST['id'];

        $consulta = "UPDATE videos set capitulo = '$capitulo', thumbnail = '$thumbnail', archivo = '$archivo', categoria = '$categoria', anime = '$anime', fecha_insercion = '$fecha_insercion', fecha_publicacion = '$fecha_publicacion', v_status = '$v_status' WHERE id =  $id";
        $array = [
            "status" => "success",
            "text" => "Se editó correctamente"
        ];

        if (!mysqli::query($consulta)) {
            $array = [
                "status" => "error",
                "text" => "No se pudo editar el registro"
            ];
        }
        echo json_encode($array);
    }
    
    public function delete_data()
    {
        $datos = $_POST["data"];
        $consulta = "DELETE FROM videos WHERE id IN ($datos)";
        mysqli::query($consulta);
        $array = [
            "text" => "Se eliminó correctamente",
            "status" => "success",
        ];
        echo json_encode($array);
    }

    public function set_avatar(){
        $upload_dir = "../../../public/";
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = $upload_dir . $_FILES["file"]["name"];
        $response = [
            "status" => "error",
            "text" => "no se pudo cargar"
        ];
        if(move_uploaded_file($tmp_name, $name)){
            $response = [
            "status" => "succes",
            "text" => " se pudo cargar",
            "file"=> $_FILES["file"]["name"]
            ];
        }
        echo json_encode ($response);
    }
}

$modules = new modules("localhost", "root", "", "anime_rocket");

if (isset($_POST)) {
    switch ($_POST["funcion"]) {
        case 'get_data':
            $modules->get_data();
            break;
        case 'get_one':
            $modules->get_one($_POST['id']);
            break;
        case 'insert_data':
            $modules->insert_data();
            break;
        case 'update_data':
            $modules->update_data($_POST['id']);
            break;
        case 'delete_data':
            $modules->delete_data();
            break;
        case 'set_avatar':
            $modules->set_avatar();
            break;
        default:
            echo "Función incompleta";
            break;
    }
}