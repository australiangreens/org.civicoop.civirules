<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from org.civicoop.civirules/xml/schema/CRM/Civirules/RuleCondition.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:fb957c2c8f3c0e04d61472c1828914ab)
 */
use CRM_Civirules_ExtensionUtil as E;

/**
 * Database access object for the CiviRulesRuleCondition entity.
 */
class CRM_Civirules_DAO_CiviRulesRuleCondition extends CRM_Core_DAO {
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
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $id;

  /**
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $rule_id;

  /**
   * @var string|null
   *   (SQL type: varchar(3))
   *   Note that values will be retrieved from the database as a string.
   */
  public $condition_link;

  /**
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $condition_id;

  /**
   * @var string|null
   *   (SQL type: text)
   *   Note that values will be retrieved from the database as a string.
   */
  public $condition_params;

  /**
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
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
    return $plural ? E::ts('Civi Rules Rule Conditions') : E::ts('Civi Rules Rule Condition');
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
          'title' => E::ts('ID'),
          'description' => E::ts('Unique RuleCondition ID'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_condition.id',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'CiviRulesRuleCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleCondition',
          'localizable' => 0,
          'readonly' => TRUE,
          'add' => NULL,
        ],
        'rule_id' => [
          'name' => 'rule_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => E::ts('Rule ID'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_condition.rule_id',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'CiviRulesRuleCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleCondition',
          'localizable' => 0,
          'FKClassName' => 'CRM_Civirules_DAO_CiviRulesRule',
          'add' => NULL,
        ],
        'condition_link' => [
          'name' => 'condition_link',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => E::ts('Condition Link'),
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_condition.condition_link',
          'default' => NULL,
          'table_name' => 'civirule_rule_condition',
          'entity' => 'CiviRulesRuleCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'condition_id' => [
          'name' => 'condition_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => E::ts('Condition ID'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_condition.condition_id',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'CiviRulesRuleCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleCondition',
          'localizable' => 0,
          'FKClassName' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'add' => NULL,
        ],
        'condition_params' => [
          'name' => 'condition_params',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => E::ts('Condition Params'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_condition.condition_params',
          'default' => NULL,
          'table_name' => 'civirule_rule_condition',
          'entity' => 'CiviRulesRuleCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => E::ts('Enabled'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_condition.is_active',
          'default' => '1',
          'table_name' => 'civirule_rule_condition',
          'entity' => 'CiviRulesRuleCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleCondition',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
            'label' => E::ts("Enabled"),
          ],
          'add' => NULL,
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
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