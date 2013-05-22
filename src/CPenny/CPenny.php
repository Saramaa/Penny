<?php
/**
 * Main class for Penny, holds everything.
 *
 * @package PennyCore
 */
class CPenny implements ISingleton {

	/**
	 * Members
	 */
	private static $instance = null;
	public $config = array();
	public $request;
	public $data;
	public $db;
	public $views;
	public $session;
	public $user;
	public $timer = array();


	/**
	 * Constructor
	 */
	protected function __construct() {
		// time page generation
		$this->timer['first'] = microtime(true); 

		// include the site specific config.php and create a ref to $pen to be used by config.php
		$pen = &$this;
    require(PENNY_SITE_PATH.'/config.php');

		// Start a named session
		session_name($this->config['session_name']);
		session_start();
		$this->session = new CSession($this->config['session_key']);
		$this->session->PopulateFromSession();

		// Set default date/time-zone
		date_default_timezone_set('UTC');
		
		  // Setup i18n, internationalization and multi-language support
    @putenv('LC_ALL='.$this->config['language']); // Will not work in safe_mode, ignore warning.
    setlocale(LC_ALL, $this->config['language']);
    if($this->config['i18n']) {
      bindtextdomain('penny', PENNY_INSTALL_PATH.'/language');
      bind_textdomain_codeset('penny', 'UTF-8'); 
      textdomain('penny');
    }
    

		// Create a database object.
		 if(isset($this->config['database'][0]['dsn'])) {
      try {
        $this->db = new CDatabase($this->config['database'][0]['dsn']);
      }
      catch(Exception $e) {
        if(!$this->config['controllers']['install']['enabled']) {
          throw $e;
        }
      }
    }
  	
  	// Create a container for all views and theme data
  	$this->views = new CViewContainer();

  	// Create a object for the user
  	$this->user = new CMUser($this);
  }
  
  
  /**
	 * Singleton pattern. Get the instance of the latest created object or create a new one. 
	 * @return CPenny The instance of this class.
	 */
	public static function Instance() {
		if(self::$instance == null) {
			self::$instance = new CPenny();
		}
		return self::$instance;
	}


	/**
	 * Frontcontroller, check url and route to controllers.
	 */
  public function FrontControllerRoute() {
    // Take current url and divide it in controller, method and parameters
    $this->request = new CRequest(isset($this->config['url_type']) ? $this->config['url_type'] : null);
    $this->request->Init($this->config['base_url'], $this->config['routing']);
    $controller = $this->request->controller;
    $method     = $this->request->method;
    $arguments  = $this->request->arguments;
    
    // If the install controller is enabled, then redirect all traffic there.
    $installController = 'install';
    if(isset($this->config['controllers'][$installController]) && 
       $this->config['controllers'][$installController]['enabled'] && 
       ($controller != $installController)) {
      $controller = $installController;
    }

    // Is the controller enabled in config.php?
    $controllerExists 	= isset($this->config['controllers'][$controller]);
    $controllerEnabled 	= $controllerExists ? $this->config['controllers'][$controller]['enabled'] : false;
    $className			    = $controllerExists ? $this->config['controllers'][$controller]['class']   : false;
    $classExists 		    = $controllerExists ? class_exists($className) : false;

    // Check if controller has a callable method in the controller class, if then call it
    if($controllerExists && $controllerEnabled && $classExists) {
      $rc = new ReflectionClass($className);
      if($rc->implementsInterface('IController')) {
         $formattedMethod = str_replace(array('_', '-'), '', $method);
        if($rc->hasMethod($formattedMethod)) {
          $controllerObj = $rc->newInstance();
          $methodObj = $rc->getMethod($formattedMethod);
          if($methodObj->isPublic()) {
            $methodObj->invokeArgs($controllerObj, $arguments);
          } else {
            $this->ShowErrorPage(404, 'Controller method not public.');          
          }
        } else if($rc->hasMethod('CatchAll')) {
          $controllerObj = $rc->newInstance();
          $methodObj = $rc->getMethod('CatchAll');
          if($methodObj->isPublic()) {
            $methodObj->invokeArgs($controllerObj, array_merge(array($method), $arguments));
          } else {
            $this->ShowErrorPage(404, 'Controller default method not public.');          
          }
        } else {
          $this->ShowErrorPage(404, 'Controller does not contain method nor implements a default method.');
        }
      } else {
        $this->ShowErrorPage(404, 'Controller does not implement interface IController.');
      }
    } 

  }
  
  /**
   * ThemeEngineRender, renders the reply of the request to HTML or whatever.
   */
  public function ThemeEngineRender() {
    // Save to session before output anything
    $this->session->StoreInSession();
  
    // Is theme enabled?
    if(!isset($this->config['theme'])) { return; }
    
    // Get the paths and settings for the theme, look in the site dir first
    $themePath 	= PENNY_INSTALL_PATH . '/' . $this->config['theme']['path'];
    $themeUrl		= $this->request->base_url . $this->config['theme']['path'];

    // Is there a parent theme?
    $parentPath = null;
    $parentUrl = null;
    if(isset($this->config['theme']['parent'])) {
      $parentPath = PENNY_INSTALL_PATH . '/' . $this->config['theme']['parent'];
      $parentUrl	= $this->request->base_url . $this->config['theme']['parent'];
    }
    
    // Add stylesheet name to the $pen->data array
    $this->data['stylesheet'] = $this->config['theme']['stylesheet'];
    
    // Make the theme urls available as part of $pen
    $this->themeUrl = $themeUrl;
    $this->themeParentUrl = $parentUrl;
    
    // Map menu to region if defined
    if(is_array($this->config['theme']['menu_to_region'])) {
     foreach($this->config['theme']['menu_to_region'] as $key => $val) {
        $this->views->AddString($this->DrawMenu($key), null, $val);
      }
   }

    // Include the global functions.php and the functions.php that are part of the theme
    $pen = &$this;
    // First the default Penny themes/functions.php
    include(PENNY_INSTALL_PATH . '/themes/functions.php');
    // Then the functions.php from the parent theme
    if($parentPath) {
      if(is_file("{$parentPath}/functions.php")) {
        include "{$parentPath}/functions.php";
      }
    }
    // And last the current theme functions.php
    if(is_file("{$themePath}/functions.php")) {
      include "{$themePath}/functions.php";
    }

    // Extract $pen->data to own variables and handover to the template file
    extract($this->data);  // OBSOLETE, use $this->views->GetData() to set variables
    extract($this->views->GetData());
    if(isset($this->config['theme']['data'])) {
      extract($this->config['theme']['data']);
    }

    // Execute the template file
    $templateFile = (isset($this->config['theme']['template_file'])) ? $this->config['theme']['template_file'] : 'default.tpl.php';
    if(is_file("{$themePath}/{$templateFile}")) {
      include("{$themePath}/{$templateFile}");
    } else if(is_file("{$parentPath}/{$templateFile}")) {
      include("{$parentPath}/{$templateFile}");
    } else {
      throw new Exception('No such template file.');
    }
  }


	/**
	 * Redirect to another url and store the session, all redirects should use this method.
   *
	 * @param $url string the relative url or the controller
	 * @param $method string the method to use, $url is then the controller or empty for current controller
	 * @param $arguments string the extra arguments to send to the method
	 */
	public function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    if(isset($this->config['debug']['db-num-queries']) && $this->config['debug']['db-num-queries'] && isset($this->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($this->config['debug']['db-queries']) && $this->config['debug']['db-queries'] && isset($this->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($this->config['debug']['timer']) && $this->config['debug']['timer']) {
	    $this->session->SetFlash('timer', $this->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($urlOrController, $method, $arguments));
    exit;
  }


	/**
	 * Redirect to a method within the current controller. Defaults to index-method. Uses RedirectTo().
	 *
	 * @param string method name the method, default is index method.
	 * @param $arguments string the extra arguments to send to the method
	 */
	public function RedirectToController($method=null, $arguments=null) {
    $this->RedirectTo($this->request->controller, $method, $arguments);
  }


	/**
	 * Redirect to a controller and method. Uses RedirectTo().
	 *
	 * @param string controller name the controller or null for current controller.
	 * @param string method name the method, default is current method.
	 * @param $arguments string the extra arguments to send to the method
	 */
	public function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
	  $controller = is_null($controller) ? $this->request->controller : null;
	  $method = is_null($method) ? $this->request->method : null;	  
    $this->RedirectTo($this->request->CreateUrl($controller, $method, $arguments));
  }


	/**
	 * Save a message in the session. Uses $this->session->AddMessage()
	 *
   * @param $type string the type of message, for example: notice, info, success, warning, error.
   * @param $message string the message.
   * @param $alternative string the message if the $type is set to false, defaults to null.
   */
  public function AddMessage($type, $message, $alternative=null) {
    if($type === false) {
      $type = 'error';
      $message = $alternative;
    } else if($type === true) {
      $type = 'success';
    }
    $this->session->AddMessage($type, $message);
  }


	/**
	 * Create an url. Wrapper and shorter method for $this->request->CreateUrl()
	 *
	 * @param $urlOrController string the relative url or the controller
	 * @param $method string the method to use, $url is then the controller or empty for current
	 * @param $arguments string the extra arguments to send to the method
	 */
	public function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->request->CreateUrl($urlOrController, $method, $arguments);
  }


  /**
   * Draw HTML for a menu defined in $pen->config['menus'].
   *
   * @param $menu string then key to the menu in the config-array.
   * @returns string with the HTML representing the menu.
   */
  public function DrawMenu($menu) {
    $items = null;
    if(isset($this->config['menus'][$menu])) {
      foreach($this->config['menus'][$menu] as $val) {
        $selected = null;
        if($val['url'] == $this->request->request || $val['url'] == $this->request->routed_from) {
          $selected = " class='selected'";
        }
        $items .= "<li><a {$selected} href='" . $this->CreateUrl($val['url']) . "'>{$val['label']}</a></li>\n";
      }
    } else {
      throw new Exception('No such menu.');
    }     
    return "<ul class='menu {$menu}'>\n{$items}</ul>\n";
  }


}
