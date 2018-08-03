<?php

namespace App\Controllers;

class Controller
{
    /**
     * Variables
     *
     * @var array
     */
    protected $var = [];

    /**
     * Layout default
     *
     * @var string
     */
    protected $layout = 'default';

    /**
     * Set variable to view
     *
     * @param array $var Variables
     *
     * @return void
     */
    public function set($var)
    {
        $this->var = array_merge($this->var, $var);
    }

    /**
     * Render a determine view file
     *
     * @param string $fileName File of view
     *
     * @return void
     */
    public function render($fileName)
    {
        extract($this->var);
        ob_start();
        require VIEW . $fileName. '.php';
        $get_content = ob_get_clean();

        if (empty($this->layout))
        {
            $get_content;
        } else {
            require VIEW . 'layout/' . $this->layout . '.php';
        }
    }
}
