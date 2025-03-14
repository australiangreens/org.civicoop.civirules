<?php

use Civi\Api4\CiviRulesAction;
use Civi\Api4\CiviRulesRuleAction;
use CRM_Civirules_ExtensionUtil as E;

class CRM_CivirulesActions_Form_Form extends CRM_Core_Form {

  protected $ruleActionId = false;

  protected $ruleAction;

  protected $action;

  protected $rule;

  protected $trigger;

  /**
   * @var CRM_Civirules_Trigger
   */
  protected $triggerClass;

  /**
   * @var CRM_Civirules_Action
   */
  protected CRM_Civirules_Action $actionClass;

  /**
   * Overridden parent method to perform processing before form is build
   */
  public function preProcess() {
    $this->ruleActionId = CRM_Utils_Request::retrieve('rule_action_id', 'Integer');

    $this->ruleAction = new CRM_Civirules_BAO_RuleAction();
    $this->ruleAction->id = $this->ruleActionId;

    $this->action = new CRM_Civirules_BAO_Action();
    $this->rule = new CRM_Civirules_BAO_Rule();
    $this->trigger = new CRM_Civirules_BAO_Trigger();

    if (!$this->ruleAction->find(true)) {
      throw new Exception('Civirules could not find ruleAction (Form)');
    }

    $this->action->id = $this->ruleAction->action_id;
    if (!$this->action->find(true)) {
      throw new Exception('Civirules could not find action');
    }

    // Instantiate the action class
    $action = CiviRulesAction::get(FALSE)
      ->addSelect('id', 'class_name')
      ->addWhere('id', '=', $this->action->id)
      ->execute()
      ->first();
    if (class_exists($action['class_name'])) {
      $this->actionClass = new $action['class_name'];
    }

    $this->rule->id = $this->ruleAction->rule_id;
    if (!$this->rule->find(true)) {
      throw new Exception('Civirules could not find rule');
    }

    $this->trigger->id = $this->rule->trigger_id;
    if (!$this->trigger->find(true)) {
      throw new Exception('Civirules could not find trigger');
    }

    $this->triggerClass = CRM_Civirules_BAO_Trigger::getPostTriggerObjectByClassName($this->trigger->class_name, true);
    $this->triggerClass->setTriggerId($this->trigger->id);

    //set user context
    $session = CRM_Core_Session::singleton();
    $editUrl = CRM_Utils_System::url('civicrm/civirule/form/rule', 'action=update&id='.$this->rule->id, TRUE);
    $session->pushUserContext($editUrl);

    parent::preProcess();

    $this->setFormTitle();

    if (method_exists($this, 'getHelpText')) {
      // Old location, should be moved to main trigger class
      $helpText = $this->getHelpText();
    }
    elseif (method_exists($this->actionClass, 'getHelpText')) {
      // This is the correct location for getHelpText();
      $helpText = $this->actionClass->getHelpText('actionParamsHelp');
    }
    $this->assign('ruleActionHelp', $helpText ?? '');
  }

  function cancelAction() {
    if (isset($this->_submitValues['rule_action_id']) && $this->_action == CRM_Core_Action::ADD) {
      CRM_Civirules_BAO_RuleAction::deleteWithId($this->_submitValues['rule_action_id']);
    }
  }

  /**
   * Overridden parent method to set default values
   *
   * @return array $defaultValues
   */
  public function setDefaultValues() {
    $defaultValues = array();
    $defaultValues['rule_action_id'] = $this->ruleActionId;
    return $defaultValues;
  }

  public function postProcess() {
    $session = CRM_Core_Session::singleton();
    $session->setStatus(E::ts("Action '%1' parameters updated for CiviRule '%2'", [ 1 => $this->action->label, 2 => $this->rule->label]),
      E::ts('Action parameters updated'),
      'success'
    );

    $redirectUrl = CRM_Utils_System::url('civicrm/civirule/form/rule', 'action=update&id='.$this->rule->id, TRUE);
    CRM_Utils_System::redirect($redirectUrl);
  }

  /**
   * Method to set the form title
   *
   * @access protected
   */
  protected function setFormTitle() {
    $title = 'CiviRules Edit Action parameters';
    $this->assign('ruleActionHeader', E::ts("Edit Action '%1' for CiviRule '%2'", [
      1 => $this->action->label,
      2 => $this->rule->label,
    ]));

    CRM_Utils_System::setTitle($title);
  }

}
