<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from org.civicoop.civirules/xml/schema/CRM/Civirules/RuleAction.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:2216fb3f0e412537dea6e7cc7581a18e)
 */
use CRM_Civirules_ExtensionUtil as E;

/**
 * Database access object for the RuleAction entity.
 */
class CRM_Civirules_DAO_RuleAction extends CRM_Core_DAO {
  const EXT = E::LONG_NAME;
  const TABLE_ADDED = '';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civirule_rule_action';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique RuleAction ID
   *
   * @var int
   */
  public $id;

  /**
   * @var int
   */
  public $rule_id;

  /**
   * @var int
   */
  public $action_id;

  /**
   * @var text
   */
  public $action_params;

  /**
   * @var text
   */
  public $delay;

  /**
   * @var int
   */
  public $ignore_condition_with_delay;

  /**
   * @var int
   */
  public $is_active;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civirule_rule_action';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? E::ts('Rule Actions') : E::ts('Rule Action');
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'action_id', 'civirule_action', 'id');
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
          'description' => E::ts('Unique RuleAction ID'),
          'required' => TRUE,
          'where' => 'civirule_rule_action.id',
          'table_name' => 'civirule_rule_action',
          'entity' => 'RuleAction',
          'bao' => 'CRM_Civirules_DAO_RuleAction',
          'localizable' => 0,
          'add' => NULL,
        ],
        'rule_id' => [
          'name' => 'rule_id',
          'type' => CRM_Utils_Type::T_INT,
          'where' => 'civirule_rule_action.rule_id',
          'default' => 'NULL',
          'table_name' => 'civirule_rule_action',
          'entity' => 'RuleAction',
          'bao' => 'CRM_Civirules_DAO_RuleAction',
          'localizable' => 0,
          'FKClassName' => 'CRM_Civirules_DAO_Rule',
          'add' => NULL,
        ],
        'action_id' => [
          'name' => 'action_id',
          'type' => CRM_Utils_Type::T_INT,
          'where' => 'civirule_rule_action.action_id',
          'default' => 'NULL',
          'table_name' => 'civirule_rule_action',
          'entity' => 'RuleAction',
          'bao' => 'CRM_Civirules_DAO_RuleAction',
          'localizable' => 0,
          'FKClassName' => 'CRM_Civirules_DAO_Action',
          'add' => NULL,
        ],
        'action_params' => [
          'name' => 'action_params',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => E::ts('Action Params'),
          'where' => 'civirule_rule_action.action_params',
          'default' => 'NULL',
          'table_name' => 'civirule_rule_action',
          'entity' => 'RuleAction',
          'bao' => 'CRM_Civirules_DAO_RuleAction',
          'localizable' => 0,
          'add' => NULL,
        ],
        'delay' => [
          'name' => 'delay',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => E::ts('Delay'),
          'where' => 'civirule_rule_action.delay',
          'default' => 'NULL',
          'table_name' => 'civirule_rule_action',
          'entity' => 'RuleAction',
          'bao' => 'CRM_Civirules_DAO_RuleAction',
          'localizable' => 0,
          'add' => NULL,
        ],
        'ignore_condition_with_delay' => [
          'name' => 'ignore_condition_with_delay',
          'type' => CRM_Utils_Type::T_INT,
          'title' => E::ts('Ignore Condition With Delay'),
          'where' => 'civirule_rule_action.ignore_condition_with_delay',
          'default' => '0',
          'table_name' => 'civirule_rule_action',
          'entity' => 'RuleAction',
          'bao' => 'CRM_Civirules_DAO_RuleAction',
          'localizable' => 0,
          'add' => NULL,
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_INT,
          'where' => 'civirule_rule_action.is_active',
          'default' => '1',
          'table_name' => 'civirule_rule_action',
          'entity' => 'RuleAction',
          'bao' => 'CRM_Civirules_DAO_RuleAction',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, '_rule_action', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, '_rule_action', $prefix, []);
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
