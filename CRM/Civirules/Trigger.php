<?php

abstract class CRM_Civirules_Trigger {

  protected $ruleId;

  protected $triggerId;

  protected $triggerParams;

  /**
   * @var \CRM_Civirules_TriggerData_TriggerData
   */
  protected \CRM_Civirules_TriggerData_TriggerData $triggerData;

  /**
   * @var string
   */
  protected $ruleTitle;

  /**
   * @var bool
   */
  protected $ruleDebugEnabled;

  public function setRuleId($ruleId) {
    $this->ruleId = $ruleId;
  }

  public function setTriggerParams($triggerParams) {
    $this->triggerParams = $triggerParams;
  }

  public function getRuleId() {
    return $this->ruleId;
  }

  public function setTriggerId($triggerId) {
    $this->triggerId = $triggerId;
  }

  public function getTriggerId() {
    return $this->triggerId;
  }

  /**
   * @param \CRM_Civirules_TriggerData_TriggerData $triggerData
   *
   * @return void
   */
  public function setTriggerData(\CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $this->triggerData = $triggerData;
  }

  /**
   * @return \CRM_Civirules_TriggerData_TriggerData
   */
  public function getTriggerData(): \CRM_Civirules_TriggerData_TriggerData {
    return $this->triggerData;
  }

  public function getRuleTitle() {
    if (empty($this->ruleTitle) && !empty($this->ruleId)) {
      $rule = new CRM_Civirules_BAO_Rule();
      $rule->id = $this->ruleId;
      if ($rule->find(true)) {
        $this->ruleTitle = $rule->label;
      }
    }
    return $this->ruleTitle;
  }

  public function getRuleDebugEnabled() {
    if (empty($this->ruleDebugEnabled) && !empty($this->ruleId)) {
      $rule = new CRM_Civirules_BAO_Rule();
      $rule->id = $this->ruleId;
      if ($rule->find(true)) {
        $this->ruleDebugEnabled = $rule->is_debug;
      }
    }
    return $this->ruleDebugEnabled;
  }

  /**
   * Returns an array of entities on which the trigger reacts
   *
   * @return CRM_Civirules_TriggerData_EntityDefinition
   */
  abstract protected function reactOnEntity();

  /**
   * Returns the name of the trigger data class.
   *
   * This function could be overridden in a child class.
   *
   * @return String
   */
  public function getTriggerDataClassName() {
    return 'CRM_Civirules_TriggerData_TriggerData';
  }


  public function getProvidedEntities() {
    $additionalEntities = $this->getAdditionalEntities();
    foreach($additionalEntities as $entity) {
      $entities[$entity->key] = $entity;
    }

    $entity = $this->reactOnEntity();
    $entities[$entity->key] = $entity;

    return $entities;
  }

  /**
   * @return \CRM_Civirules_TriggerData_EntityDefinition
   */
  public function getReactOnEntity() {
    return $this->reactOnEntity();
  }

  /**
   * Checks whether the trigger provides a certain entity.
   *
   * @param string $entity
   * @return bool
   */
  public function doesProvideEntity($entity) {
    $availableEntities = $this->getProvidedEntities();
    foreach($availableEntities as $providedEntity) {
      if (strtolower($providedEntity->entity) == strtolower($entity)) {
        return true;
      }
    }
    return false;
  }

  /**
   * Checks whether the trigger provides a certain set of entities
   *
   * @param array<string> $entities
   * @return bool
   */
  public function doesProvideEntities($entities) {
    $availableEntities = $this->getProvidedEntities();
    foreach($entities as $entity) {
      $entityPresent = false;
      foreach ($availableEntities as $providedEntity) {
        if (strtolower($providedEntity->entity) == strtolower($entity)) {
          $entityPresent = true;
        }
      }
      if (!$entityPresent) {
        return false;
      }
    }
    return true;
  }

  /**
   * Returns an array of additional entities provided in this trigger
   *
   * @return array of CRM_Civirules_TriggerData_EntityDefinition
   */
  protected function getAdditionalEntities() {
    $reactOnEntity = $this->reactOnEntity();
    $entities = array();
    if (strtolower($reactOnEntity->key) != strtolower('Contact')) {
      $entities[] = new CRM_Civirules_TriggerData_EntityDefinition('Contact', 'Contact', 'CRM_Contact_DAO_Contact', 'Contact');
    }
    return $entities;
  }

  /**
   * Returns a redirect url to extra data input from the user after adding a trigger
   *
   * Return false if you do not need extra data input
   *
   * @param int $ruleId
   * @return bool|string
   * @access public
   * @abstract
   */
  public function getExtraDataInputUrl($ruleId) {
    return false;
  }

  /**
   * Returns a description of this trigger
   *
   * @return string
   * @access public
   * @abstract
   */
  public function getTriggerDescription() {
    return '';
  }

  /**
   * Alter the trigger data with extra data
   *
   * @param \CRM_Civirules_TriggerData_TriggerData $triggerData
   */
  public function alterTriggerData(CRM_Civirules_TriggerData_TriggerData &$triggerData) {
    $hook_invoker = CRM_Civirules_Utils_HookInvoker::singleton();
    $hook_invoker->hook_civirules_alterTriggerData($triggerData);
  }

  /**
   * Trigger a rule for this trigger
   *
   * @param string $op
   * @param string $objectName
   * @param int $objectId
   * @param object $objectRef
   * @param string $eventID
   */
  public function triggerTrigger($op, $objectName, $objectId, $objectRef, $eventID) {
    if (empty($this->getTriggerData())) {
      throw new CRM_Core_Exception('CiviRules: Trigger data is empty. You need to call setTriggerData() first');
    }

    try {
      CRM_Civirules_Engine::triggerRule($this, $this->getTriggerData());
    }
    catch (Exception $e) {
      \Civi::log()->error('Failed to trigger rule: ' . $e->getMessage());
    }
  }

}
