<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberSns");
$query->setAction("select");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl1_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl1_argument'}->checkFilter('number');
${'member_srl1_argument'}->createConditionValue();
if(!${'member_srl1_argument'}->isValid()) return ${'member_srl1_argument'}->getErrorMessage();
} else
${'member_srl1_argument'} = NULL;if(${'member_srl1_argument'} !== null) ${'member_srl1_argument'}->setColumnType('number');
if(isset($args->service)) {
${'service2_argument'} = new ConditionArgument('service', $args->service, 'equal');
${'service2_argument'}->createConditionValue();
if(!${'service2_argument'}->isValid()) return ${'service2_argument'}->getErrorMessage();
} else
${'service2_argument'} = NULL;if(${'service2_argument'} !== null) ${'service2_argument'}->setColumnType('varchar');
if(isset($args->id)) {
${'id3_argument'} = new ConditionArgument('id', $args->id, 'equal');
${'id3_argument'}->createConditionValue();
if(!${'id3_argument'}->isValid()) return ${'id3_argument'}->getErrorMessage();
} else
${'id3_argument'} = NULL;if(${'id3_argument'} !== null) ${'id3_argument'}->setColumnType('varchar');
if(isset($args->regdate_less)) {
${'regdate_less4_argument'} = new ConditionArgument('regdate_less', $args->regdate_less, 'less');
${'regdate_less4_argument'}->createConditionValue();
if(!${'regdate_less4_argument'}->isValid()) return ${'regdate_less4_argument'}->getErrorMessage();
} else
${'regdate_less4_argument'} = NULL;if(${'regdate_less4_argument'} !== null) ${'regdate_less4_argument'}->setColumnType('date');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_socialxe`', '`socialxe`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl1_argument,"equal")
,new ConditionWithArgument('`service`',$service2_argument,"equal", 'and')
,new ConditionWithArgument('`id`',$id3_argument,"equal", 'and')
,new ConditionWithArgument('`regdate`',$regdate_less4_argument,"less", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>