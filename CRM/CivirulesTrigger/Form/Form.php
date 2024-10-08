<?php

class CRM_CivirulesTrigger_Form_Form extends CRM_Core_Form {

  /**
   * @var bool
   */
  protected $ruleId = false;

  /**
   * @var \CRM_Civirules_BAO_Rule
   */
  protected $rule;

  /**
   * @var \CRM_Civirules_BAO_Trigger
   */
  protected $trigger;

  /**
   * @var CRM_Civirules_Trigger
   */
  protected $triggerClass;

  /**
   * Overridden parent method to perform processing before form is build
   */
  public function preProcess() {
    $this->ruleId = CRM_Utils_Request::retrieve('rule_id', 'Integer');

    $this->rule = new CRM_Civirules_BAO_Rule();
    $this->trigger = new CRM_Civirules_BAO_Trigger();

    $this->rule->id = $this->ruleId;
    if (!$this->rule->find(true)) {
      throw new Exception('Civirules could not find rule');
    }

    $this->trigger->id = $this->rule->trigger_id;
    if (!$this->trigger->find(true)) {
      throw new Exception('Civirules could not find trigger');
    }

    $this->triggerClass = CRM_Civirules_BAO_Trigger::getTriggerObjectByTriggerId($this->trigger->id, true);
    $this->triggerClass->setTriggerId($this->trigger->id);
    $this->triggerClass->setRuleId($this->rule->id);
    $this->triggerClass->setTriggerParams($this->rule->trigger_params ?? '');

    parent::preProcess();

    $this->setFormTitle();
    $this->assign('ruleTriggerHelp', $this->getHelpText());

    //set user context
    $session = CRM_Core_Session::singleton();
    $editUrl = CRM_Utils_System::url('civicrm/civirule/form/rule', 'action=update&id='.$this->rule->id, TRUE);
    $session->pushUserContext($editUrl);
  }

  /**
   * Overridden parent method to set default values
   *
   * @return array $defaultValues
   */
  public function setDefaultValues() {
    $defaultValues = [];
    $defaultValues['rule_id'] = $this->ruleId;
    return $defaultValues;
  }

  public function postProcess() {
    $session = CRM_Core_Session::singleton();
    $session->setStatus('Rule '.$this->rule->label.' parameters updated', 'Rule parameters updated', 'success');

    $redirectUrl = CRM_Utils_System::url('civicrm/civirule/form/rule', 'action=update&id='.$this->rule->id, TRUE);
    CRM_Utils_System::redirect($redirectUrl);
  }

  /**
   * Method to set the form title
   */
  protected function setFormTitle() {
    $title = 'CiviRules Edit trigger parameters';
    $this->assign('ruleTriggerHeader', 'Edit rule '.$this->rule->label);
    CRM_Utils_System::setTitle($title);
  }

  /**
   * Returns a help text for this trigger.
   * The help text is shown to the administrator who is configuring the condition.
   *
   * @return string
   */
  protected function getHelpText() {
    return '';
  }

}
