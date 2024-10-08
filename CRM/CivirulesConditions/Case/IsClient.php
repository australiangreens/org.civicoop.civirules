<?php

class CRM_CivirulesConditions_Case_IsClient extends CRM_Civirules_Condition {

  public function isConditionValid(CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $relationship = $triggerData->getEntityData('Relationship');
    if (empty($relationship)) {
      $caseData = $triggerData->getEntityData('Case');
      $contactId = $triggerData->getContactId();
      return in_array($contactId,$caseData['client_id']);
    }
    return false;
  }

  public function getExtraDataInputUrl($ruleConditionId) {
    return false;
  }

  /**
   * This function validates whether this condition works with the selected trigger.
   *
   * This function could be overriden in child classes to provide additional validation
   * whether a condition is possible in the current setup. E.g. we could have a condition
   * which works on contribution or on contributionRecur then this function could do
   * this kind of validation and return false/true
   *
   * @param CRM_Civirules_Trigger $trigger
   * @param CRM_Civirules_BAO_Rule $rule
   * @return bool
   */
  public function doesWorkWithTrigger(CRM_Civirules_Trigger $trigger, CRM_Civirules_BAO_Rule $rule) {
    return $trigger->doesProvideEntities(array('Case', 'Relationship'));
  }

}
