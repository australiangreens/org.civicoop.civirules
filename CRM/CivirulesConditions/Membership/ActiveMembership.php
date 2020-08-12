<?php

class CRM_CivirulesConditions_Membership_ActiveMembership extends CRM_Civirules_Condition {

  protected $_conditionParams = array();

  /**
   * Method to set the Rule Condition data
   *
   * @param array $ruleCondition
   * @access public
   */
  public function setRuleConditionData($ruleCondition) {
    parent::setRuleConditionData($ruleCondition);
    $this->conditionParams = array();
    if (!empty($this->ruleCondition['condition_params'])) {
      $this->conditionParams = unserialize($this->ruleCondition['condition_params']);
    }
  }

  /**
   * This method returns true or false when an condition is valid or not
   *
   * @param CRM_Civirules_TriggerData_TriggerData $triggerData
   * @return bool
   * @access public
   * @abstract
   */
  public function isConditionValid(CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $params['membership_type_id'] = $this->_conditionParams['membership_type_id'];
    $params['contact_id'] = $triggerData->getContactId();
    $params['active_only'] = 1;

    $memberships = civicrm_api3('Membership', 'get', $params);
    if (isset($memberships['values']) && count($memberships['values']) > 0) {
      return ($this->conditionParams['negate'] ? false : true);
    }
    return ($this->conditionParams['negate'] ? true : false);
  }

  /**
   * Returns a redirect url to extra data input from the user after adding a condition
   *
   * Return false if you do not need extra data input
   *
   * @param int $ruleConditionId
   * @return bool|string
   * @access public
   * @abstract
   */
  public function getExtraDataInputUrl($ruleConditionId) {
    return CRM_Utils_System::url('civicrm/civirule/form/condition/activemembershiptype', 'rule_condition_id=' .$ruleConditionId);
  }

  /**
   * Returns a user friendly text explaining the condition params
   * e.g. 'Older than 65'
   *
   * @return string
   * @access public
   */
  public function userFriendlyConditionParams() {
    $params = array(
      'is_active' => 1,
       'options' => array('limit' => 0, 'sort' => "name ASC"),
    );
    try {
      $membershipTypes = civicrm_api3('MembershipType', 'Get', $params);
      $operator = 'equals';
      foreach ($membershipTypes['values'] as $membershipType) {
        if ($membershipType['id'] == $this->_conditionParams['membership_type_id']) {
          return "Membership Type ".$operator." ".$membershipType['name'];
        }
      }
    } catch (CiviCRM_API3_Exception $ex) {}
    return '';
  }

  /**
   * Method to set the Rule Condition data
   *
   * @param array $ruleCondition
   * @access public
   */
  public function setRuleConditionData($ruleCondition) {
    parent::setRuleConditionData($ruleCondition);
    $this->_conditionParams = array();
    if (!empty($this->ruleCondition['condition_params'])) {
      $this->_conditionParams = unserialize($this->ruleCondition['condition_params']);
    }
  }

}
