<?php
/**
 * Class for CiviRules post trigger handling - Membership Renewed
 *
 * @license AGPL-3.0
 */

use CRM_Civirules_ExtensionUtil as E;

class CRM_CivirulesPostTrigger_MembershipRenewed extends CRM_CivirulesPostTrigger_Membership {

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
    $triggerData = $this->getTriggerDataFromPost($op, $objectName, $objectId, $objectRef, $eventID);
    $membership = $triggerData->getEntityData('Membership');
    $originalMembership = $triggerData->getOriginalData();

    // Check if the Membership has been renewed (end_date has been increased by one membership term)
    // A membership runs from [start_date] to [start_date + [1 membership term] - [1 day]] (end_date).
    // We calculate the renewed membership start date based on the original membership end_date.
    // Then we run getDatesForMembershipType() to get the expected renewed membership dates.
    // Then we check if the expected renewed membership end_date matches the actual renewed membership end_date.
    $startDate = date('Y-m-d', strtotime("{$originalMembership['end_date']} + 1 day"));
    $membershipDates = CRM_Member_BAO_MembershipType::getDatesForMembershipType(
      $membership['membership_type_id'], $membership['join_date'], $startDate);
    if ($membershipDates['end_date'] !== CRM_Utils_Date::isoToMysql($membership['end_date'])) {
      if ($this->getRuleDebugEnabled()) {
        \Civi::log('civirules')->debug('CiviRules Trigger MembershipRenewed: NOT TRIGGERING. Calculated end_date: ' . $membershipDates['end_date'] . ' does not match actual end date: ' . CRM_Utils_Date::isoToMysql($membership['end_date']));
      }
      return;
    }

    $this->setTriggerData($triggerData);
    parent::triggerTrigger($op, $objectName, $objectId, $objectRef, $eventID);
  }

  public function getTriggerDescription() {
    return $this->getHelpText();
  }

  public function getHelpText(): string {
    return E::ts('Trigger when a Membership has been renewed (End Date has been increased by one membership term)');
  }

}
