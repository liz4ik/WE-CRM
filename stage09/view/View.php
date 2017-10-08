<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 27.09.2017
 * Time: 14:40
 */

namespace view;


class View{

    private $view;
    private $variables = array();

    public function __construct($view) {
        $this->view = $view;
    }

    public function __set($key, $variable) {
        $this->variables[$key] = $variable;
    }

    public function __get($key) {
        return $this->variables[$key];
    }

    public static function noHTML($input, $encoding = "UTF-8")
    {
        return htmlentities($input, ENT_QUOTES | ENT_HTML5, $encoding);
    }

    public function render() {
        extract($this->variables);
        ob_start();
        require_once($this->view);
        return ob_get_clean();
    }

}