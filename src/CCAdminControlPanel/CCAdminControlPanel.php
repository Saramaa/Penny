<?php
/**
 * Admin Control Panel to manage admin stuff.
 * 
 * @package PennyCore
 */
class CCAdminControlPanel extends CObject implements IController {


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
    $this->listall = new CMAdminControlPanel();
 
  }


  /**
   * Show profile information of the user.
   */
  public function Index() {
    $this->views->SetTitle('ACP: Admin Control Panel')
    ->AddInclude(__DIR__ . '/index.tpl.php', array(
                  'is_authenticated'=>$this->user['isAuthenticated'], 
                  'user'=>$this->user,
                  'Admin'=>$this->user['hasRoleAdmin'],
                  'groups'=>$this->listall->SeeAllGroups(), 
                  'users'=>$this->listall->SeeAllUsers(),
                  'formAction'=>$this->request->CreateUrl('', 'DeleteUser'),
                  'formAction2'=>$this->request->CreateUrl('', 'Profile'),
                  
                  
        
                  ));
  }
  
  /**
   * View and edit user profile.
   */
  public function Profile() {    
    $form = new CFormUserProfile($this, $this->user);
    if($form->Check() === false) {
      $this->AddMessage('notice', 'Some fields did not validate and the form could not be processed.');
      $this->RedirectToController('profile');
    }

    $this->views->SetTitle('User Profile')
                ->AddInclude(__DIR__ . '/profile.tpl.php', array(
                  'is_authenticated'=>$this->user['isAuthenticated'], 
                  'user'=>$this->user,
                  'profile_form'=>$form->GetHTML(),
                  'Admin'=>$this->user['hasRoleAdmin'],
                ));
   
           
                
  }
 
  /**
   * Save updates to profile information.
   */
  public function DoProfileSave($form) {
    $this->user['name'] = $form['name']['value'];
    $this->user['email'] = $form['email']['value'];
    $ret = $this->user->Save();
    $this->AddMessage($ret, 'Saved profile.', 'Failed saving profile.');
   $this->RedirectToController('profile');
  } 
  
  /**
   * Delete user
   */
    public function DeleteUser() {
    $delete = $_GET['acronym']; 
    if ($delete = 'root' || $delete = 'doe' || $delete = 'anonomous')
    {
    	    $this->session->AddMessage('info', 'You cannot delete this user');
    }
    $this->db->ExecuteQuery("delete from User Where acronym = '$delete' AND acronym != 'root' AND acronym != 'doe' AND acronym != 'anonomous'");
    
    $this->session->AddMessage('info', 'User deleted.');

     $this->RedirectTo($this->request->CreateUrl($this->request->controller));
}

  
  
   /**
   * Create a new user.
   */
  public function Create() {
    $form = new CFormUserCreate($this);
    if($form->Check() === false) {
      $this->AddMessage('notice', 'You must fill in all values.');
     $this->RedirectToController('Create');
    }
    $this->views->SetTitle('Create user')
                ->AddInclude(__DIR__ . '/create.tpl.php', array('form' => $form->GetHTML()));     
  }
  

  /**
   * Perform a creation of a user as callback on a submitted form.
   *
   * @param $form CForm the form that was submitted
   */
  public function DoCreate($form) {    
    if($form['password']['value'] != $form['password1']['value'] || empty($form['password']['value']) || empty($form['password1']['value'])) {
      $this->AddMessage('error', 'Password does not match or is empty.');
      $this->RedirectToController('create');
    } else if($this->user->Create($form['acronym']['value'], 
                           $form['password']['value'],
                           $form['name']['value'],
                           $form['email']['value']
                           )) {
      $this->AddMessage('success'," Your have successfully created a new account.");
     // $this->user->Login($form['acronym']['value'], $form['password']['value']);
      $this->RedirectTo('acp');
    } else {
      $this->AddMessage('notice', "Failed to create an account.");
   //   $this->RedirectToController('create');
    }
  }
  
  
  
 }
