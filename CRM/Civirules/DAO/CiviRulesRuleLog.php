<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from org.civicoop.civirules/xml/schema/CRM/Civirules/RuleLog.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:216d586348ad04d38299ee52bc82fdf1)
 */
use CRM_Civirules_ExtensionUtil as E;

/**
 * Database access object for the CiviRulesRuleLog entity.
 */
class CRM_Civirules_DAO_CiviRulesRuleLog extends CRM_Core_DAO {
  const EXT = E::LONG_NAME;
  const TABLE_ADDED = '';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civirule_rule_log';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique RuleLog ID
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
   * FK to Contact ID
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $contact_id;

  /**
   * @var string|null
   *   (SQL type: varchar(255))
   *   Note that values will be retrieved from the database as a string.
   */
  public $entity_table;

  /**
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $entity_id;

  /**
   * @var string|null
   *   (SQL type: datetime)
   *   Note that values will be retrieved from the database as a string.
   */
  public $log_date;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civirule_rule_log';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? E::ts('Civi Rules Rule Logs') : E::ts('Civi Rules Rule Log');
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
          'description' => E::ts('Unique RuleLog ID'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_log.id',
          'table_name' => 'civirule_rule_log',
          'entity' => 'CiviRulesRuleLog',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleLog',
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
          'where' => 'civirule_rule_log.rule_id',
          'default' => NULL,
          'table_name' => 'civirule_rule_log',
          'entity' => 'CiviRulesRuleLog',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleLog',
          'localizable' => 0,
          'FKClassName' => 'CRM_Civirules_DAO_CiviRulesRule',
          'add' => NULL,
        ],
        'contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => E::ts('Contact ID'),
          'description' => E::ts('FK to Contact ID'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_log.contact_id',
          'default' => NULL,
          'table_name' => 'civirule_rule_log',
          'entity' => 'CiviRulesRuleLog',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleLog',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'html' => [
            'label' => E::ts("Modified By"),
          ],
          'readonly' => TRUE,
          'add' => NULL,
        ],
        'entity_table' => [
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => E::ts('Entity Table'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_log.entity_table',
          'default' => NULL,
          'table_name' => 'civirule_rule_log',
          'entity' => 'CiviRulesRuleLog',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleLog',
          'localizable' => 0,
          'add' => NULL,
        ],
        'entity_id' => [
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => E::ts('Entity ID'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_log.entity_id',
          'default' => NULL,
          'table_name' => 'civirule_rule_log',
          'entity' => 'CiviRulesRuleLog',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleLog',
          'localizable' => 0,
          'add' => NULL,
        ],
        'log_date' => [
          'name' => 'log_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => E::ts('Log Date'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_rule_log.log_date',
          'default' => NULL,
          'table_name' => 'civirule_rule_log',
          'entity' => 'CiviRulesRuleLog',
          'bao' => 'CRM_Civirules_DAO_CiviRulesRuleLog',
          'localizable' => 0,
          'readonly' => TRUE,
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, '_rule_log', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, '_rule_log', $prefix, []);
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
    $indices = [
      'rule_id' => [
        'name' => 'rule_id',
        'field' => [
          0 => 'rule_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civirule_rule_log::0::rule_id',
      ],
      'contact_id' => [
        'name' => 'contact_id',
        'field' => [
          0 => 'contact_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civirule_rule_log::0::contact_id',
      ],
      'rule_contact_id' => [
        'name' => 'rule_contact_id',
        'field' => [
          0 => 'rule_id',
          1 => 'contact_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civirule_rule_log::0::rule_id::contact_id',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}