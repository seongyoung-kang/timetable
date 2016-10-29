<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteKeywordMemberOld");
$query->setAction("delete");
$query->setPriority("LOW");
if(isset($args->module_srl)) {
${'module_srl3_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl3_argument'}->checkFilter('number');
${'module_srl3_argument'}->createConditionValue();
if(!${'module_srl3_argument'}->isValid()) return ${'module_srl3_argument'}->getErrorMessage();
} else
${'module_srl3_argument'} = NULL;if(${'module_srl3_argument'} !== null) ${'module_srl3_argument'}->setColumnType('number');

${'regdate4_argument'} = new ConditionArgument('regdate', $args->regdate, 'less');
${'regdate4_argument'}->checkFilter('number');
${'regdate4_argument'}->checkNotNull();
${'regdate4_argument'}->createConditionValue();
if(!${'regdate4_argument'}->isValid()) return ${'regdate4_argument'}->getErrorMessage();
if(${'regdate4_argument'} !== null) ${'regdate4_argument'}->setColumnType('date');

$query->setTables(array(
new Table('`xe_marketplace_keyword_member`', '`marketplace_keyword_member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl3_argument,"equal", 'and')
,new ConditionWithArgument('`regdate`',$regdate4_argument,"less", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>