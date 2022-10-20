<?php

namespace Core;

include_once "..".DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."configView.php";
class View
{
    /**
     * properties to store the name of the default  directory
     * @var string
     */
    protected $view_template_dir ;
    /**
     * properties to store the name of the default mapping file
     * @var string
     */
    protected $view_template_file ;

    /**
     * property initialization
     * @param string $template
     */
    public function __construct(string $template)
    {
        $this->view_template_dir = $template;
        $this->view_template_file = $template;

    }

    /**
     *method for connecting a display file and passing an array of data
     * @param string $pageTemplate
     * @param array $data
     */
    public function render(array $data = [])
    {
        extract($data);
        include_once ROOT_DIRECTORY . DIRECTORY_SEPARATOR . VIEW_DIR . DIRECTORY_SEPARATOR . TEMPLATE_DIR . DIRECTORY_SEPARATOR . $this->view_template_file . '.php';
    }

    /**
     * this method is responsible for connecting the required html page and passing data to it
     * @param string $pageTemplate
     * @param array $data
     */
    public function includePage(string $pageTemplate,array $data = [])
    {
        extract($data);
include_once '..' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . VIEW_DIR . DIRECTORY_SEPARATOR . $this->view_template_dir . DIRECTORY_SEPARATOR . $pageTemplate . '.php';
    }



}