<?php
/**
 * Standard controller layout.
 * 
 * @package PennyCore
 */
class CCIndex extends CObject implements IController {

  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }
  

  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {			

    $this->views->SetTitle('Index')
                ->AddInclude(__DIR__ . '/index.tpl.php',array(), 'primary')
                ->AddInclude(__DIR__ . '/sidebar.tpl.php',array(),  'sidebar');
  }
 public function CatchAll() {
    // Check if this is the last step of the installation process or just some random call
    if($this->request->method == 'step5') {
      $this->views->SetTitle(t('Home'))
      ->AddInclude(__DIR__ . '/installed.tpl.php', array(), 'primary');
    } else {
      $this->ShowErrorPage(404, t('Page is not found.'));
    }
  }


} 
