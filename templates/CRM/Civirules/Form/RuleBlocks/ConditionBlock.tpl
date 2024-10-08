
{*block for linked condition *}
<h3>{ts}Linked Condition(s){/ts}</h3>
<div class="crm-block crm-form-block crm-civirule-rule_condition-block">
  <div class="crm-section">
    <div id="civirule_conditionBlock-wrapper" class="dataTables_wrapper">
      <table id="civirule-conditionBlock-table" class="display">
        <thead>
          <tr>
            <th>{ts}Link operator{/ts}</th>
            <th>{ts}Condition{/ts}</th>
            <th>{ts}Description{/ts}</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
          {assign var="row_class" value="odd-row"}
          {foreach from=$ruleConditions key=ruleConditionIid item=ruleCondition}
            <tr class={$row_class}>
              <td>{if isset($ruleCondition.condition_link)}{$ruleCondition.condition_link}{/if}</td>
              <td>{$ruleCondition.name}</td>
              <td>
                {if !empty($ruleCondition.formattedConditionParams)}
                  {$ruleCondition.formattedConditionParams}
                {/if}
              </td>
              <td>
                <span>
                  {foreach from=$ruleCondition.actions item=action_link}
                    {$action_link}
                  {/foreach}
                </span>
              </td>
            </tr>
            {if $row_class eq "odd-row"}
              {assign var="row_class" value="even-row"}
            {else}
              {assign var="row_class" value="odd-row"}
            {/if}
          {/foreach}
        </tbody>
      </table>
    </div>
  </div>
  <div class="crm-submit-buttons">
    <a class="add button" title="Add Condition" href="{$ruleConditionAddUrl}">
      <span><i class="crm-i fa-plus-circle"></i> {ts}Add Condition{/ts}</span></a>
  </div>
</div>
