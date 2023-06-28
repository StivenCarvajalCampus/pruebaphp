<?php
namespace App;
    require_once "../vendor/autoload.php";
    
    $router = new \Bramus\Router\Router();
    $router->get("/campus/pais",function(){
        \App\pais::getInstance(json_decode(file_get_contents("php://input"), true))->getAllPais();;
    });
    $router->post("/campus/postpais",function(){
        \App\pais::getInstance(json_decode(file_get_contents("php://input"), true))->postPais();;
    });
    $router->update("/campus/updatepais",function(){
        \App\pais::getInstance(json_decode(file_get_contents("php://input"), true))->updatePais();;
    });
    $router->delete("/campus/deletepais",function(){
        \App\pais::getInstance(json_decode(file_get_contents("php://input"), true))->deletePais();;
    });
    
    
    $router->get("/campus/departamento",function(){
        \App\departamento::getInstance(json_decode(file_get_contents("php://input"), true))->getAllDepartamento();;
    });
    $router->post("/campus/postdepartamento",function(){
        \App\departamento::getInstance(json_decode(file_get_contents("php://input"), true))->postDepartamento();;
    });
    $router->update("/campus/updatedepartamento",function(){
        \App\departamento::getInstance(json_decode(file_get_contents("php://input"), true))->updateDepartamento();;
    });
    $router->delete("/campus/deletedepartamento",function(){
        \App\departamento::getInstance(json_decode(file_get_contents("php://input"), true))->deleteDepartamento();;
    });
    $router->get("/campus/region",function(){
        \App\region::getInstance(json_decode(file_get_contents("php://input"), true))->getAllRegion();;
    });
    $router->post("/campus/postregion",function(){
        \App\region::getInstance(json_decode(file_get_contents("php://input"), true))->postRegion();;
    });
    $router->update("/campus/updateregion",function(){
        \App\region::getInstance(json_decode(file_get_contents("php://input"), true))->updateRegion();;
    });
    $router->delete("/campus/deleteregion",function(){
        \App\region::getInstance(json_decode(file_get_contents("php://input"), true))->deleteRegion();;
    });
    $router->get("/campus/campers",function(){
        \App\campers::getInstance(json_decode(file_get_contents("php://input"), true))->getAllCampers();;
    });
    
    $router->post("/campus/campers",function(){
        \App\campers::getInstance(json_decode(file_get_contents("php://input"), true))->postCampers();;
    });
    
    $router->update("/campus/campers",function(){
        \App\campers::getInstance(json_decode(file_get_contents("php://input"), true))->updateCampers();;
    });
    
    $router->delete("/campus/campers",function(){
        \App\campers::getInstance(json_decode(file_get_contents("php://input"), true))->deleteCampers();;
    });



    $router->run();
    //







?>