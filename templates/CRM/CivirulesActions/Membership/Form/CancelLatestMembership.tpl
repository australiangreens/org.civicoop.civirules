{crmScope extensionKey='smcrules'}
  <h3>{$ruleConditionHeader}</h3>
  <div class="crm-block crm-form-block crm-civirule-rule_condition-block-cancel_membership">
    <div class="crm-section membership_status">
      <div class="label">{$form.membership_status_id.label}</div>
      <div class="content">{$form.membership_status_id.html}</div>
      <div class="clear"></div>
    </div>
    <div class="crm-section membership_type">
      <div class="label">{$form.membership_type_id.label}</div>
      <div class="content">{$form.membership_type_id.html}</div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="crm-submit-buttons">
    {include file="CRM/common/formButtons.tpl" location="bottom"}
  </div>
{/crmScope}
