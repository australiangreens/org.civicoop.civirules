<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from org.civicoop.civirules/xml/schema/CRM/Civirules/Condition.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:65f9b97cd473c4158aba4d5ee4f862a8)
 */
use CRM_Civirules_ExtensionUtil as E;

/**
 * Database access object for the CiviRulesCondition entity.
 */
class CRM_Civirules_DAO_CiviRulesCondition extends CRM_Core_DAO {
  const EXT = E::LONG_NAME;
  const TABLE_ADDED = '';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civirule_condition';

  /**
   * Field to show when displaying a record.
   *
   * @var string
   */
  public static $_labelField = 'label';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique Condition ID
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $id;

  /**
   * @var string|null
   *   (SQL type: varchar(80))
   *   Note that values will be retrieved from the database as a string.
   */
  public $name;

  /**
   * @var string|null
   *   (SQL type: varchar(128))
   *   Note that values will be retrieved from the database as a string.
   */
  public $label;

  /**
   * @var string|null
   *   (SQL type: varchar(128))
   *   Note that values will be retrieved from the database as a string.
   */
  public $class_name;

  /**
   * @var bool|string
   *   (SQL type: tinyint)
   *   Note that values will be retrieved from the database as a string.
   */
  public $is_active;

  /**
   * @var string|null
   *   (SQL type: date)
   *   Note that values will be retrieved from the database as a string.
   */
  public $created_date;

  /**
   * FK to Contact ID
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $created_user_id;

  /**
   * @var string|null
   *   (SQL type: date)
   *   Note that values will be retrieved from the database as a string.
   */
  public $modified_date;

  /**
   * FK to Contact ID
   *
   * @var int|string|null
   *   (SQL type: int unsigned)
   *   Note that values will be retrieved from the database as a string.
   */
  public $modified_user_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civirule_condition';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? E::ts('Civi Rules Conditions') : E::ts('Civi Rules Condition');
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
          'description' => E::ts('Unique Condition ID'),
          'required' => TRUE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.id',
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'readonly' => TRUE,
          'add' => NULL,
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => E::ts('Name'),
          'maxlength' => 80,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.name',
          'default' => NULL,
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'label' => [
          'name' => 'label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => E::ts('Label'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.label',
          'default' => NULL,
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'class_name' => [
          'name' => 'class_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => E::ts('Class Name'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.class_name',
          'default' => NULL,
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
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
          'where' => 'civirule_condition.is_active',
          'default' => '1',
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
            'label' => E::ts("Enabled"),
          ],
          'add' => NULL,
        ],
        'created_date' => [
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => E::ts('Created Date'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.created_date',
          'default' => NULL,
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'created_user_id' => [
          'name' => 'created_user_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => E::ts('Created User ID'),
          'description' => E::ts('FK to Contact ID'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.created_user_id',
          'default' => NULL,
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'html' => [
            'type' => 'EntityRef',
            'label' => E::ts("Created By"),
          ],
          'readonly' => TRUE,
          'add' => NULL,
        ],
        'modified_date' => [
          'name' => 'modified_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => E::ts('Modified Date'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.modified_date',
          'default' => NULL,
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'add' => NULL,
        ],
        'modified_user_id' => [
          'name' => 'modified_user_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => E::ts('Modified User ID'),
          'description' => E::ts('FK to Contact ID'),
          'usage' => [
            'import' => FALSE,
            'export' => FALSE,
            'duplicate_matching' => FALSE,
            'token' => FALSE,
          ],
          'where' => 'civirule_condition.modified_user_id',
          'default' => NULL,
          'table_name' => 'civirule_condition',
          'entity' => 'CiviRulesCondition',
          'bao' => 'CRM_Civirules_DAO_CiviRulesCondition',
          'localizable' => 0,
          'html' => [
            'type' => 'EntityRef',
            'label' => E::ts("Modified By"),
          ],
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, '_condition', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, '_condition', $prefix, []);
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
