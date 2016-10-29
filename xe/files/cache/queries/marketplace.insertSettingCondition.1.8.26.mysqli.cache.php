<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertSettingCondition");
$query->setAction("insert");
$query->setPriority("");

${'module_srl4_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl4_argument'}->checkFilter('number');
${'module_srl4_argument'}->checkNotNull();
if(!${'module_srl4_argument'}->isValid()) return ${'module_srl4_argument'}->getErrorMessage();
if(${'module_srl4_argument'} !== null) ${'module_srl4_argument'}->setColumnType('number');

${'eid5_argument'} = new Argument('eid', $args->{'eid'});
${'eid5_argument'}->checkNotNull();
if(!${'eid5_argument'}->isValid()) return ${'eid5_argument'}->getErrorMessage();
if(${'eid5_argument'} !== null) ${'eid5_argument'}->setColumnType('varchar');

${'name6_argument'} = new Argument('name', $args->{'name'});
${'name6_argument'}->checkNotNull();
if(!${'name6_argument'}->isValid()) return ${'name6_argument'}->getErrorMessage();
if(${'name6_argument'} !== null) ${'name6_argument'}->setColumnType('varchar');

${'short_name7_argument'} = new Argument('short_name', $args->{'short_name'});
${'short_name7_argument'}->checkNotNull();
if(!${'short_name7_argument'}->isValid()) return ${'short_name7_argument'}->getErrorMessage();
if(${'short_name7_argument'} !== null) ${'short_name7_argument'}->setColumnType('varchar');
if(isset($args->desc)) {
${'desc8_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc8_argument'}->isValid()) return ${'desc8_argument'}->getErrorMessage();
} else
${'desc8_argument'} = NULL;if(${'desc8_argument'} !== null) ${'desc8_argument'}->setColumnType('text');

${'idx9_argument'} = new Argument('idx', $args->{'idx'});
${'idx9_argument'}->checkFilter('number');
${'idx9_argument'}->checkNotNull();
if(!${'idx9_argument'}->isValid()) return ${'idx9_argument'}->getErrorMessage();
if(${'idx9_argument'} !== null) ${'idx9_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl4_argument'})
,new InsertExpression('`eid`', ${'eid5_argument'})
,new InsertExpression('`name`', ${'name6_argument'})
,new InsertExpression('`short_name`', ${'short_name7_argument'})
,new InsertExpression('`desc`', ${'desc8_argument'})
,new InsertExpression('`idx`', ${'idx9_argument'})
));
$query->setTables(array(
new Table('`xe_marketplace_conditions`', '`marketplace_conditions`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>