<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGroupsExtraVars");
$query->setAction("select");
$query->setPriority("");

${'module_srl8_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl8_argument'}->checkFilter('number');
${'module_srl8_argument'}->checkNotNull();
${'module_srl8_argument'}->createConditionValue();
if(!${'module_srl8_argument'}->isValid()) return ${'module_srl8_argument'}->getErrorMessage();
if(${'module_srl8_argument'} !== null) ${'module_srl8_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx9_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'notin');
${'var_idx9_argument'}->checkFilter('number');
${'var_idx9_argument'}->createConditionValue();
if(!${'var_idx9_argument'}->isValid()) return ${'var_idx9_argument'}->getErrorMessage();
} else
${'var_idx9_argument'} = NULL;if(${'var_idx9_argument'} !== null) ${'var_idx9_argument'}->setColumnType('number');
if(isset($args->eid)) {
${'eid10_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid10_argument'}->createConditionValue();
if(!${'eid10_argument'}->isValid()) return ${'eid10_argument'}->getErrorMessage();
} else
${'eid10_argument'} = NULL;if(${'eid10_argument'} !== null) ${'eid10_argument'}->setColumnType('varchar');

${'sort_index11_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index11_argument'}->ensureDefaultValue('var_idx');
if(!${'sort_index11_argument'}->isValid()) return ${'sort_index11_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`module_srl`', '`module_srl`')
,new SelectExpression('`var_idx`', '`idx`')
,new SelectExpression('`eid`', '`eid`')
));
$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl8_argument,"equal")
,new ConditionWithArgument('`var_idx`',$var_idx9_argument,"notin", 'and')
,new ConditionWithArgument('`eid`',$eid10_argument,"equal", 'and')))
));
$query->setGroups(array(
'`module_srl`' ,'`var_idx`' ,'`eid`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index11_argument'}, "asc")
));
$query->setLimit();
return $query; ?>