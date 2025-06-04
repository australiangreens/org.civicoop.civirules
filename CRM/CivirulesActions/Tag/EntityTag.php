<?php
use CRM_Civirules_ExtensionUtil as E;

class CRM_CivirulesActions_Tag_EntityTag {

  /**
   * Method to get all contact tags with API4
   */
  public static function getApi4Tags($table) {
    $tags = [];
    try {
      $apiTags = \Civi\Api4\Tag::get(FALSE)
        ->addSelect('name')
        ->addWhere('used_for', 'LIKE', '%' . $table . '%')
        ->execute();
      foreach ($apiTags as $apiTag) {
        if (!isset($tags[$apiTag['id']])) {
          $tags[$apiTag['id']] = $apiTag['name'];
        }
      }
    }
    catch (CRM_Core_Exception $ex) {
      Civi::log()->error(E::ts("Error from API4 Tag get in ") . __METHOD__
        . E::ts("with message: ") . $ex->getMessage());
    }
    return $tags;
  }

  /**
   * Method to add entity tag with API4
   *
   * @param $entityTable
   * @param $entityId
   * @param $tagId
   */
  public static function createApi4EntityTag($entityTable, $entityId, $tagId) {
    if (empty($entityTable) || empty($entityId) || empty($tagId)) {
      return;
    }
    try {
      \Civi\Api4\EntityTag::create(FALSE)
        ->addValue('entity_table', $entityTable)
        ->addValue('entity_id', $entityId)
        ->addValue('tag_id', $tagId)
        ->execute();
    }
    catch (CRM_Core_Exception $ex) {
      Civi::log()->error(E::ts("Error from API4 EntityTag create in ") . __METHOD__ . E::ts(" with message: ") . $ex->getMessage());
    }
  }

  /**
   * Method to remove entity tag with API4
   *
   * @param $entityTable
   * @param $entityId
   * @param $tagId
   */
  public static function deleteApi4EntityTag($entityTable, $entityId, $tagId) {
    if (empty($entityTable) || empty($entityId) || empty($tagId)) {
      return;
    }
    try {
      \Civi\Api4\EntityTag::delete(FALSE)
        ->addWhere('entity_table', '=', $entityTable)
        ->addWhere('entity_id', '=', $entityId)
        ->addWhere('tag_id', '=', $tagId)
        ->execute();
    }
    catch (CRM_Core_Exception $ex) {
      Civi::log()->error(E::ts("Error from API4 EntityTag delete in ") . __METHOD__ . E::ts(" with message: ") . $ex->getMessage());
    }
  }

}
