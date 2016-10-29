<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getComponentList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->enabled)) {
${'enabled3_argument'} = new ConditionArgument('enabled', $args->enabled, 'equal');
${'enabled3_argument'}->createConditionValue();
if(!${'enabled3_argument'}->isValid()) return ${'enabled3_argument'}->getErrorMessage();
} else
${'enabled3_argument'} = NULL;if(${'enabled3_argument'} !== null) ${'enabled3_argument'}->setColumnType('char');

${'sort_index4_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index4_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index4_argument'}->isValid()) return ${'sort_index4_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_editor_components`', '`editor_components`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`enabled`',$enabled3_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index4_argument'}, "asc")
));
$query->setLimit();
return $query; ?>