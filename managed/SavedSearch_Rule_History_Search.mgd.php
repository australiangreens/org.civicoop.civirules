<?php
use CRM_Civirules_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Rule_History_Search',
    'entity' => 'SavedSearch',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Rule_History_Search',
        'label' => E::ts('Rule History Search'),
        'api_entity' => 'CiviRulesRule',
        'api_params' => [
          'version' => 4,
          'select' => [
            'CiviRulesRule_CiviRulesRuleLog_rule_id_01.id',
            'CiviRulesRule_CiviRulesRuleLog_rule_id_01.log_date',
            'id',
            'label',
            'is_active',
            'CiviRulesRule_CiviRulesRuleLog_rule_id_01.contact_id',
            'CiviRulesRule_CiviRulesRuleLog_rule_id_01.entity_id',
            'CiviRulesRule_CiviRulesRuleLog_rule_id_01.entity_table',
            'CiviRulesRule_CiviRulesRuleLog_rule_id_01.contact_id.display_name',
            'CiviRulesRule_CiviRulesRuleLog_rule_id_01.rule_id',
          ],
          'orderBy' => [],
          'where' => [
            ['is_active', '=', TRUE],
          ],
          'groupBy' => [],
          'join' => [
            [
              'CiviRulesRuleLog AS CiviRulesRule_CiviRulesRuleLog_rule_id_01',
              'INNER',
              [
                'id',
                '=',
                'CiviRulesRule_CiviRulesRuleLog_rule_id_01.rule_id',
              ],
            ],
          ],
          'having' => [],
        ],
      ],
      'match' => ['name'],
    ],
  ],
  [
    'name' => 'SavedSearch_Rule_History_Search_SearchDisplay_Rule_History_Search_Table_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Rule_History_Search_Table_1',
        'label' => E::ts('Rule History Search'),
        'saved_search_id.name' => 'Rule_History_Search',
        'type' => 'table',
        'settings' => [
          'description' => E::ts(NULL),
          'sort' => [
            [
              'CiviRulesRule_CiviRulesRuleLog_rule_id_01.log_date',
              'DESC',
            ],
          ],
          'limit' => 50,
          'pager' => [],
          'placeholder' => 5,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'CiviRulesRule_CiviRulesRuleLog_rule_id_01.log_date',
              'dataType' => 'Timestamp',
              'label' => E::ts('Date Triggered'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'CiviRulesRule_CiviRulesRuleLog_rule_id_01.contact_id.display_name',
              'dataType' => 'String',
              'label' => E::ts('Triggered For'),
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'CiviRulesRule_CiviRulesRuleLog_rule_id_01.contact_id',
                'target' => '_blank',
              ],
              'title' => E::ts('View Contact'),
            ],
            [
              'type' => 'field',
              'key' => 'CiviRulesRule_CiviRulesRuleLog_rule_id_01.rule_id',
              'dataType' => 'Integer',
              'label' => E::ts('Rule'),
              'sortable' => TRUE,
              'link' => [
                'path' => 'civicrm/civirule/form/rule?reset=1&action=update&id=[id]',
                'entity' => '',
                'action' => '',
                'join' => '',
                'target' => '_blank',
              ],
              'rewrite' => '[CiviRulesRule_CiviRulesRuleLog_rule_id_01.rule_id]: [label]',
            ],
            [
              'type' => 'field',
              'key' => 'CiviRulesRule_CiviRulesRuleLog_rule_id_01.entity_id',
              'dataType' => 'Integer',
              'label' => E::ts('Triggered by Entity ID'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'CiviRulesRule_CiviRulesRuleLog_rule_id_01.entity_table',
              'dataType' => 'String',
              'label' => E::ts('Triggered by Entity Table'),
              'sortable' => TRUE,
            ],
          ],
          'actions' => TRUE,
          'classes' => ['table', 'table-striped'],
        ],
      ],
      'match' => [
        'saved_search_id',
        'name',
      ],
    ],
  ],
];
