<?php
/**
 * To install Penny.
 * 
 * @package PennyCore
 */
class CCInstall extends CObject implements IController {


  /**
   * Constructor
   */
  public function __construct() { 
    parent::__construct(); 
    global $pen;
   include(__DIR__.'/config_install.php');
  }
  

  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {     
    $this->views->SetTitle(t('Install Penny'));
    $this->views->AddInclude(__DIR__ . '/install_0.tpl.php', array(), 'primary');
  }


  /**
   * Step 1 of the installation phase.
   */
  public function Step1() {     
    $this->views->SetTitle(t('Verify the server environment'));
    $this->views->AddInclude(__DIR__ . '/install_1.tpl.php', array(), 'primary');
  }


  /**
   * Step 2 of the installation phase.
   */
  public function Step2() {     
    $this->views->SetTitle(t('Verify writable site-directory'));
    $this->views->AddInclude(__DIR__ . '/install_2.tpl.php', array(), 'primary');
  }


  /**
   * Step 3 of the installation phase.
   */
  public function Step3() {
   $data =  array(
      'dsn' => isset($this->config['database'][0]['dsn']) ? $this->config['database'][0]['dsn'] : t('Setting for default database is missing in site/config.php.')
    );

    $this->views->SetTitle(t('Verify default database is enabled'));
    $this->views->AddInclude(__DIR__ . '/install_3.tpl.php', $data, 'primary');
  }

  

  /**
   * Step 4 of the installation phase.
   */
  public function Step4() {
    $modules = new CMModules();
   $results = $modules->Install();
    $allModules = $modules->ReadAndAnalyse();
    $this->views->SetTitle(t('Install all modules'));
    $this->views->AddInclude(__DIR__ . '/install_4.tpl.php', array('modules'=>$results), 'primary');
  }


  /**
   * Step 5 of the installation phase.
   */
  public function Step5() {
    $installController = 'install';
    $status = ($this->config['controllers'][$installController] && $this->config['controllers'][$installController]['enabled']) ? 'enabled' : 'disabled';
    $this->views->SetTitle(t('Done - disable installation'));
    $this->views->AddInclude(__DIR__ . '/install_5.tpl.php', array('status' => $status), 'primary');
  }



} 
