<?php
    class Controller{
        public function model($model){
            require_once "./models/".$model.".php";
            return new $model;
        }
        public function view($view,$data=[]){
            $domainLink = $this->getDomain();
            require_once "./views/".$view.".php";
        }
        public function getDomain()
        {
            $protocol     = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
            $domainLink   = $protocol.'://'.$_SERVER['HTTP_HOST']."/mvc";
            return $domainLink;
        }
        public function getParamUrl($param)
        {
            $res = parse_url($_SERVER['REQUEST_URI']);
            if(isset($res['query'])){
                parse_str($res['query'], $params);
                if(isset($params[$param])){
                    return $params[$param];
                }
            }
        }
    }
?>