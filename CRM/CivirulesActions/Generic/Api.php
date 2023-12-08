<?php

abstract class CRM_CivirulesActions_Generic_Api extends CRM_Civirules_Action {

  /**
   * Method to get the api entity to process in this CiviRule action
   *
   * @return string
   */
  protected abstract function getApiEntity();

  /**
   * Method to get the api action to process in this CiviRule action
   *
   * @return string
   */
  protected abstract function getApiAction();

  /**
   * Returns an array with parameters used for processing an action
   *
   * @param array $params
   * @param CRM_Civirules_TriggerData_TriggerData $triggerData
   *
   * @return array
   */
  protected function alterApiParameters(array $params, CRM_Civirules_TriggerData_TriggerData $triggerData) {
    // This method could be overridden in subclasses to alter parameters to meet certain criteria
    return $params;
  }

  /**
   * Process the action
   *
   * @param CRM_Civirules_TriggerData_TriggerData $triggerData
   */
  public function processAction(CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $entity = $this->getApiEntity();
    $action = $this->getApiAction();

    $params = $this->getActionParameters();

    //alter parameters by subclass
    $params = $this->alterApiParameters($params, $triggerData);

    //execute the action
    $this->executeApiAction($entity, $action, $params);
  }

  /**
   * Executes the action
   *
   * This method could be overridden if needed
   *
   * @param string $entity
   * @param string $action
   * @param array $params

   * @throws Exception on api error
   */
  protected function executeApiAction(string $entity, string $action, array $params) {
    try {
      civicrm_api3($entity, $action, $params);
    } catch (Exception $e) {
      $formattedParams = '';
      foreach($params as $key => $param) {
        if (strlen($formattedParams)) {
          $formattedParams .= ', ';
        }
        $formattedParams .= "{$key}=\"$param\"";
      }
      $message = "Civirules api action exception: {$e->getMessage()}. API call: {$entity}.{$action} with params: {$formattedParams}";
      \Civi::log('civirules')->error($message);
      throw new Exception($message);
    }
  }

}
