<?php

namespace App\Models;

abstract class Model
{
	protected $model;

    /**
     * Model constructor.
     */
    public function __construct()
	{
		$this->model = Database::getInstance()->getConnection();
	}
}
