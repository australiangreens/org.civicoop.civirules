<?php

use Civi\Api4\Membership;

class CRM_Civirules_TriggerData_Post extends CRM_Civirules_TriggerData_TriggerData {

  /**
   * @param string $entity
   * @param int $objectId
   * @param array $data
   *
   * @throws \CRM_Core_Exception
   * @throws \Civi\API\Exception\UnauthorizedException
   */
  public function __construct($entity, $objectId, $data) {
    parent::__construct();
    $this->setEntity($entity);
    $this->setEntityId($objectId);

    // When we are triggered via a Post hook we are not guaranteed to have all values
    // for the entity. Maybe we should load them all here?
    switch ($entity) {
      case 'Contact':
        $this->setContactId($objectId);
        $this->setEntityData($entity, $data);
        break;

      case 'Membership':
        // Load the membership entity (this makes sure we have all fields such as contribution_recur_id if set).
        $membership = Membership::get(FALSE)
          ->addWhere('id', '=', $objectId)
          ->execute()
          ->first();
        $this->setContactId($membership['contact_id']);
        $this->setEntityData('Membership', $membership);
        break;

      default:
        // Generic handler: Just make sure contactID is set.
        if (isset($data['contact_id'])) {
          $this->setContactId($data['contact_id']);
        }
        $this->setEntityData($entity, $data);
    }
  }

}
