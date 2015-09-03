<?php
abstract class BaseController {
	abstract function index( $app = '' );
	protected $data;
}