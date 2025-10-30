<?php

use CRM_Civirules_ExtensionUtil as E;

class CRM_CivirulesPostTrigger_AfformSubmission extends CRM_Civirules_Trigger_Post {

  /**
   * Returns an array of entities on which the trigger reacts
   *
   * @return CRM_Civirules_TriggerData_EntityDefinition
   */
  protected function reactOnEntity() {
    return new CRM_Civirules_TriggerData_EntityDefinition($this->objectName, $this->objectName, $this->getDaoClassName(), 'AfformSubmission');
  }

  /**
   * Return the name of the DAO Class. If a dao class does not exist return an empty value
   *
   * @return string
   */
  protected function getDaoClassName() {
    return 'CRM_Afform_DAO_AfformSubmission';
  }

  /**
   * Checks whether the trigger provides a certain entity.
   *
   * @param string $entity
   *
   * @return bool
   */
  public function doesProvideEntity(string $entity): bool {
    if ($entity == 'Contact') {
      return TRUE;
    }
    $availableEntities = $this->getProvidedEntities();
    foreach($availableEntities as $providedEntity) {
      if (strtolower($providedEntity->entity) == strtolower($entity)) {
        return TRUE;
      }
    }
    return FALSE;
  }

  /**
   * Checks whether the trigger provides a certain set of entities
   *
   * @param array<string> $entities
   *
   * @return bool
   */
  public function doesProvideEntities($entities): bool {
    $availableEntities = $this->getProvidedEntities();
    foreach($entities as $entity) {
      $entityPresent = false;
      if ($entity == 'Contact') {
        $entityPresent = true;
      } else {
        foreach ($availableEntities as $providedEntity) {
          if (strtolower($providedEntity->entity) == strtolower($entity)) {
            $entityPresent = TRUE;
          }
        }
      }
      if (!$entityPresent) {
        return false;
      }
    }
    return true;
  }

  /**
   * Returns a redirect url to extra data input from the user after adding a trigger
   *
   * Return false if you do not need extra data input
   *
   * @param $ruleId
   *
   * @return bool|string
   */
  public function getExtraDataInputUrl($ruleId) {
    return $this->getFormattedExtraDataInputUrl('civicrm/civirule/form/trigger/afformsubmission', $ruleId);
  }

  /**
   * Get various types of help text for the trigger:
   *   - triggerDescription: When choosing from a list of triggers, explains what the trigger does.
   *   - triggerDescriptionWithParams: When a trigger has been configured for a rule provides a
   *       user friendly description of the trigger and params (see $this->getTriggerDescription())
   *   - triggerParamsHelp (default): If the trigger has configurable params, show this help text when configuring
   * @param string $context
   *
   * @return string
   */
  public function getHelpText(string $context = 'triggerParamsHelp'): string {
    switch ($context) {
      case 'triggerDescription':
        return E::ts('Trigger on %1', [1 => $this->getObjectName()]);

      case 'triggerDescriptionWithParams':
        return $this->getTriggerDescription();

      case 'triggerParamsHelp':
        switch ($this->getOp()) {
          case 'create|edit':
            return E::ts('Choose the Formbuilder forms to trigger on. The first "Contact" on the form 
            will be available as context for the rule (eg. for conditions/actions etc).')
             . '<br> ' . E::ts('Select if you want to trigger on Create and/or Edit');

          case 'delete':
          default:
            return '';
        }
      default:
        return parent::getHelpText($context);
    }
  }

  /**
   * Returns a calculated description of this trigger
   * If the trigger has parameters this this function should provide a user-friendly description of those parameters
   * See also: getHelpText()
   * You could return the contents of getHelpText('triggerDescriptionWithParams') if you want a generic description and the trigger has no configurable
   * parameters.
   *
   * @return string
   */
  public function getTriggerDescription(): string {
    $afforms = \Civi\Api4\Afform::get(FALSE)
      ->addWhere('type:name', '=', 'form')
      ->addSelect('name', 'title')
      ->execute()->indexBy('name')->getArrayCopy();

    $selectedForms = explode(',', $this->triggerParams['rule_afform_select'] ?? '');
    foreach ($selectedForms as $formName) {
      if (in_array($formName, array_keys($afforms))) {
        $formTitles[] = '<a href=' . Civi::url('backend://civicrm/admin/afform#/edit/' . $formName) . ' target="_blank">' . $afforms[$formName]['title'] . '</a>';
      }
    }

    $options = CRM_CivirulesTrigger_Form_Form::getTriggerOptions();
    $triggerOps = explode(',', $this->triggerParams['trigger_op'] ?? '');
    foreach ($options as $option) {
      if (in_array($option['id'], $triggerOps)) {
        $triggerOptions[] = $option['text'];
      }
    }
    $text = E::ts('Trigger for forms: %1 on %2', [1 => implode(', ', $formTitles ?? []), 2 => implode(', ', $triggerOptions ?? [])]);
    return $text;
  }

  /**
   * Override alter trigger data.
   *
   */
  public function alterTriggerData(CRM_Civirules_TriggerData_TriggerData &$triggerData) {
    try {
      $afformSubmission = $triggerData->getEntityData('AfformSubmission');
      $submissionData = json_decode($afformSubmission['data'], TRUE);


      $contactEntities = array_filter($submissionData, function($key) {
        $validContactEntities = ['Individual', 'Household', 'Organization'];
        foreach ($validContactEntities as $contactEntity) {
          return str_starts_with($key, $contactEntity);
        }
      }, ARRAY_FILTER_USE_KEY);

      if (empty($contactEntities)) {
        \Civi::log()->error('CiviRules AfformSubmission trigger: no contact entity found!');
        return;
      }
      $contactEntityName = array_key_first($contactEntities);
      $contactFields = $submissionData[$contactEntityName][0]['fields'] ?? NULL;
      if (!$contactFields) {
        \Civi::log()->error('CiviRules AfformSubmission trigger: no fields for contact entity found.');
        return;
      }

      $contactID = $contactFields['id'];

      $contact = \Civi\Api4\Contact::get(FALSE)
        ->addWhere('id', '=', $contactID)
        ->execute()
        ->first();
        $triggerData->setEntityData('Contact', $contact);
    } catch (Throwable $e) {
      // Do nothing. There could be an exception when the contribution does not exists in the database anymore.
    }

    parent::alterTriggerData($triggerData);
  }

}
