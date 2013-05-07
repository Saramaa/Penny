<?php include('CForm.php'); 
/**
 * Create a class for a contact-form with name, email and phonenumber.
 */
class CFormContact extends CForm 
{
 
  /** 
   * Create all form elements and validation rules in the constructor.
   */
  public function __construct() {
    parent::__construct();
 
    $this->AddElement(new CFormElementText('name'))
         ->AddElement(new CFormElementText('email'))
         ->AddElement(new CFormElementText('phone'))
         ->AddElement(new CFormElementSubmit('submit', array('callback'=>array($this, 'DoSubmit'))))
          ->AddElement(new CFormElementSubmit('submit', array('callback'=>array($this, 'DoSubmit'))))
         ->AddElement(new CFormElementSubmit('submit-fail', array('callback'=>array($this, 'DoSubmitFail'))));
  }
 
  /**
   * Callback for submitted forms, will always fail
   */
  protected function DoSubmitFail() {
    echo "<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>";
    return false;
  }
 
 
  /**
   * Callback for submitted forms
   */
  protected function DoSubmit() {
    echo "<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>";
    return true;
  }

}
// -----------------------------------------------------------------------
//
// Use the form and check it status.
//
session_name('cform_example');
session_start();
$form = new CFormContact();

 // Check the status of the form
$status = $form->Check();
 
// What to do if the form was submitted?
if($status === true) {
  echo "<p><i>Form was submitted and the callback method returned true. I should redirect to a page to avoid issues with reloading posted form.</i></p>";
}?>

<!doctype html>
<meta charset=utf8>
<h1><?=$title?>Example on using forms with Lydia CForm</h1>
<!-- Echo out the form -->
<?=$form->GetHTML()?>