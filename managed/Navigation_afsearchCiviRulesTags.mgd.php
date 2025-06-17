<?php
use CRM_Civirules_ExtensionUtil as E;

return [
  [
    'name' => 'Navigation_afsearchCiviRulesTags',
    'entity' => 'Navigation',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'label' => E::ts('Manage Tags'),
        'name' => 'afsearchCiviRulesTags',
        'url' => 'civicrm/admin/civirules/tags',
        'icon' => 'crm-i fa-tags',
        'permission' => [
          'administer CiviCRM',
          'administer CiviRules',
        ],
        'permission_operator' => 'OR',
        'parent_id.name' => 'CiviRules',
        'weight' => 9,
      ],
      'match' => ['name', 'domain_id'],
    ],
  ],
];
