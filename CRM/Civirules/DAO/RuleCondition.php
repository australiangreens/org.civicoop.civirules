<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from org.civicoop.civirules/xml/schema/CRM/Civirules/RuleCondition.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:c30307d421938086791b2d014d41133f)
 */
use CRM_Civirules_ExtensionUtil as E;

/**
 * Database access object for the RuleCondition entity.
 */
class CRM_Civirules_DAO_RuleCondition extends CRM_Core_DAO {
  const EXT = E::LONG_NAME;
  const TABLE_ADDED = '';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civirule_rule_condition';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique RuleCondition ID
   *
   * @var int
   */
  public $id;

  /**
   * @var int
   */
  public $rule_id;

  /**
   * @var string
   */
  public $condition_link;

  /**
   * @var int
   */
  public $condition_id;

  /**
   * @var text
   */
  public $condition_params;

  /**
   * @var int
   */
  public $is_active;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civirule_rule_condition';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? E::ts('Rule Conditions') : E::ts('Rule Condition');
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'rule_id', 'civirule_rule', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'condition_id', 'civirule_condition', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => E::ts('Unique RuleCondition ID'),
          'required' => TRUE,
          'where' => 'civirule_rule_condition.id',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'RuleCondition',
          'bao' => 'CRM_Civirules_DAO_RuleCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'rule_id' => [
          'name' => 'rule_id',
          'type' => CRM_Utils_Type::T_INT,
          'where' => 'civirule_rule_condition.rule_id',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'RuleCondition',
          'bao' => 'CRM_Civirules_DAO_RuleCondition',
          'localizable' => 0,
          'FKClassName' => 'CRM_Civirules_DAO_Rule',
          'add' => NULL,
        ],
        'condition_link' => [
          'name' => 'condition_link',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => E::ts('Condition Link'),
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'where' => 'civirule_rule_condition.condition_link',
          'default' => 'NULL',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'RuleCondition',
          'bao' => 'CRM_Civirules_DAO_RuleCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'condition_id' => [
          'name' => 'condition_id',
          'type' => CRM_Utils_Type::T_INT,
          'where' => 'civirule_rule_condition.condition_id',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'RuleCondition',
          'bao' => 'CRM_Civirules_DAO_RuleCondition',
          'localizable' => 0,
          'FKClassName' => 'CRM_Civirules_DAO_Condition',
          'add' => NULL,
        ],
        'condition_params' => [
          'name' => 'condition_params',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => E::ts('Condition Params'),
          'where' => 'civirule_rule_condition.condition_params',
          'default' => 'NULL',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'RuleCondition',
          'bao' => 'CRM_Civirules_DAO_RuleCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_INT,
          'where' => 'civirule_rule_condition.is_active',
          'default' => '1',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'RuleCondition',
          'bao' => 'CRM_Civirules_DAO_RuleCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, '_rule_condition', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, '_rule_condition', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
