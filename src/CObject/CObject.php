<?php
/**
 * Holding a instance of CPenny to enable use of $this in subclasses and provide some helpers.
 *
 * @package PennyCore
 */
class CObject {

	/**
	 * Members
	 */
	protected $pen;
	protected $config;
	protected $request;
	protected $data;
	protected $db;
	protected $views;
	protected $session;
	protected $user;


	/**
	 * Constructor, can be instantiated by sending in the $pen reference.
	 */
	protected function __construct($pen=null) {
	  if(!$pen) {
	    $pen = CPenny::Instance();
	  }
	  $this->ly       = &$pen;
    $this->config   = &$pen->config;
    $this->request  = &$pen->request;
    $this->data     = &$pen->data;
    $this->db       = &$pen->db;
    $this->views    = &$pen->views;
    $this->session  = &$pen->session;
    $this->user     = &$pen->user;
	}


	/**
	 * Wrapper for same method in CPenny. See there for documentation.
	 */
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->ly->RedirectTo($urlOrController, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CPenny. See there for documentation.
	 */
	protected function RedirectToController($method=null, $arguments=null) {
    $this->ly->RedirectToController($method, $arguments);
  }


	/**
	 * Wrapper for same method in CPenny. See there for documentation.
	 */
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->ly->RedirectToControllerMethod($controller, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CPenny. See there for documentation.
	 */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->ly->AddMessage($type, $message, $alternative);
  }


	/**
	 * Wrapper for same method in CPenny. See there for documentation.
	 */
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->ly->CreateUrl($urlOrController, $method, $arguments);
  }


}
