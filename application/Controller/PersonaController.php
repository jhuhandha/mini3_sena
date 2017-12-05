<?php
namespace Mini\Controller;

use Mini\Model\Persona;
use Mini\Model\Rol;
use Mini\Model\Color;

class PersonaController
{

    public function index()
    {
        $persona = new Persona();
        $registros = $persona->listar();

        include APP . 'view/_templates/header.php';
        include APP . 'view/persona/index.php';
        include APP . 'view/_templates/footer.php';
    }

    public function crear()
    {
        $rol = new Rol();
        $roles = $rol->listar_rol();

        include APP . 'view/_templates/header.php';
        include APP . 'view/persona/crear.php';
        include APP . 'view/_templates/footer.php';
    }

    public function guardar()
    {

        $carpeta = ROOT . "public" . DIRECTORY_SEPARATOR . "upload\\";
        $nombre_subido = basename($_FILES['imagen']['name']);


        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombre_subido)) {

            try {
                $persona = new Persona();

                $persona->__SET("nombre", $_POST["nombre"]);
                $persona->__SET("telefono", $_POST["telefono"]);
                $persona->__SET("imagen", $nombre_subido);
                $persona->__SET("rol", $_POST["rol"]);
                $persona->__SET("usuario", $_POST["usuario"]);
                $clave = password_hash($_POST["clave"], PASSWORD_DEFAULT);
                $persona->__SET("clave", $clave);

                $respuesta = $persona->guardar();

                $id_persona = $persona->ultimo()->ultimo;

                $color = new Color();
                foreach ($_POST["color"] as $value) {
                    $color->__SET("nombre", $value);
                    $color->guardar();
                    $id_color = $color->ultimo()->ultimo;

                    $color->__SET("codigo", $id_color);
                    $color->__SET("codigo_persona", $id_persona);
                    $color->guardar_detalle();
                }

                $_SESSION["mensaje"] = "<script>alert('Guardo')</script>";
            } catch (\Exception $e) {
                $_SESSION["mensaje"] = "<script>alert('error')</script>";
            }

        } else {
            $_SESSION["mensaje"] = "<script>alert('no fue posible subir el archivo')</script>";
        }
        header("location: " . URL . "/persona/crear");
    }


    public function login()
    {
        $login = new Persona();
        $login->__SET("usuario", $_POST["usuario"]);
        $resultado = $login->login();

        if ($resultado != false) {

            if (password_verify($_POST["clave"], $resultado->clave)) {

                $login->__SET("rol", $resultado->rol_codigo);
                $menu = $login->paginas();

                $m = "";
                foreach ($menu as $value) {

                    $m .= '<li class="nav-item">';
                    $m .= '<a href="'.$value->url.'" class="nav-link active">';
                    $m .= '  <i class="icon ion-ios-home-outline"></i>';
                    $m .= '  <span>'.$value->nombre.'</span>';
                    $m .= '</a>';
                    $m .= '</li>';
                }

                $_SESSION["Codigo"] = $resultado->codigo;
                $_SESSION["Nombre"] = $resultado->nombre;
                $_SESSION["Menu"] = $m;
                header("Location: " . URL . "home");

            }else{
                $_SESSION["mensaje"] = "<script>alert('la clave no es correcta')</script>";
                header("Location: " . URL . "home");
            }
        }else{
            $_SESSION["mensaje"] = "<script>alert('no se encontro el usuario')</script>";
            header("Location: " . URL . "home");
        }
    }

    public function logout(){
        session_destroy();
        unset($_SESSION["Codigo"]);
        unset($_SESSION["Nombre"]);
        unset($_SESSION["Menu"]);

        header("Location: " . URL . "home");
    }

    public function obtenercolores($personas_id){
        $color = new Color();
        $color->__SET("codigo_persona", $personas_id);
        echo json_encode($color->get_colores());
    }

    public function editar($id)
    {
        $persona = new Persona();
        $persona->__SET("id", $id);

        $respuesta = $persona->editar();

        include APP . 'view/_templates/header.php';
        include APP . 'view/persona/editar.php';
        include APP . 'view/_templates/footer.php';
    }


    public function modificar()
    {
        $persona = new Persona();

        $persona->__SET("documento", $_POST["documento"]);
        $persona->__SET("nombre", $_POST["nombre"]);
        $persona->__SET("apellido", $_POST["apellido"]);
        $persona->__SET("telefono", $_POST["telefono"]);
        $persona->__SET("direccion", $_POST["direccion"]);
        $persona->__SET("correo", $_POST["correo"]);
        $persona->__SET("id", $_POST["id"]);

        $respuesta = $persona->modificar();

        if ($respuesta) {
            $_SESSION["mensaje"] = "<script>alert('Felicidades')</script>";
        } else {
            $_SESSION["mensaje"] = "Error";
        }

        header("location: " . URL . "/persona");
    }

    public function estado($estado, $id)
    {

        $persona = new Persona();

        $persona->__SET("estado", $estado);
        $persona->__SET("id", $id);

        $respuesta = $persona->modificar_estado();

        if ($respuesta) {
            $_SESSION["mensaje"] = "<script>alert('Felicidades')</script>";
        } else {
            $_SESSION["mensaje"] = "Error";
        }

        header("location: " . URL . "/persona");
    }



}