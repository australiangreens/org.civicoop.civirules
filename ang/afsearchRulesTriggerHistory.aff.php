<?php
use CRM_Civirules_ExtensionUtil as E;

return [
  'type' => 'search',
  'title' => E::ts('Rules Trigger History'),
  'icon' => 'fa-list-alt',
  'server_route' => 'civicrm/civirules/search/logs',
  'permission' => [
    'administer CiviRules',
  ],
];
