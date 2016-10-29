<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteKeywordDocumentOld");
$query->setAction("delete");
$query->setPriority("LOW");
if(isset($args->module_srl)) {
${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
} else
${'module_srl1_argument'} = NULL;if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');

${'regdate2_argument'} = new ConditionArgument('regdate', $args->regdate, 'less');
${'regdate2_argument'}->checkFilter('number');
${'regdate2_argument'}->checkNotNull();
${'regdate2_argument'}->createConditionValue();
if(!${'regdate2_argument'}->isValid()) return ${'regdate2_argument'}->getErrorMessage();
if(${'regdate2_argument'} !== null) ${'regdate2_argument'}->setColumnType('date');

$query->setTables(array(
new Table('`xe_marketplace_keyword_document`', '`marketplace_keyword_document`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl1_argument,"equal", 'and')
,new ConditionWithArgument('`regdate`',$regdate2_argument,"less", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>