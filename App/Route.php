<?php

include_once '..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'configRoute.php';

class Route
{
    /**
     * gets an array with uri components
     * @return array
     */
    static public function getUri(){
        $uri = $_SERVER['REQUEST_URI'];
        $uriComponents = explode('/',$uri);
        array_shift($uriComponents);
        return $uriComponents;
    }

    /**
     * controller initialization function and actions by uri
     */
    static public function init(){
        $uriComponents = self::getUri();
        if(count($uriComponents)>3){
            self::notFound();
        }

        $controllerName = DEFAULT_CONTROLLER_NAME;
        $action = DEFAULT_ACTION_NAME;

        if(!empty($uriComponents[0])){
            $controllerName = mb_strtolower(urldecode($uriComponents[0]));
        }
        if(!empty($uriComponents[1])){
            $action = mb_strtolower(urldecode($uriComponents[1]));
        }
        $controllerClass = '\Controllers\\'.$controllerName.'Controller';
        if(!class_exists($controllerClass)){
            self::notFound();
        }
        $controller = new $controllerClass();
        if(!method_exists($controller,$action)){
            self::notFound();
        }

        try{
            $controller->$action();
        }catch(Exception $e){
            exit($e->getMessage());
//            self::addErrors([$e->getMessage()]);
        }
    }

    /**
     * create url by controller and action
     * @param string $controller
     * @param string $action
     * @return string
     */
    static public function url(string $controller =DEFAULT_CONTROLLER_NAME , string $action = DEFAULT_ACTION_NAME){
        return "/$controller/$action";
    }

    /**
     * redirect to url
     * @param string $url
     */
    static public function redirect($url){
        header("location: $url");
        exit();
    }

    /**
     * add errors in session
     * @return array
     */
    static public function addErrors(array $errors){
        session_start();
        $_SESSION['errors'] = $errors;
    }

    /**
     * get errors from session
     * @return array
     */
    static public function getErrors(){
        session_start();
        $errors = [];
        if(isset($_SESSION['errors'])){
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        return $errors;
    }

    /**
     * returns a 404 page
     */
    static public function notFound(){
        http_response_code(404);
        exit();
    }

}