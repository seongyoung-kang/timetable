<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateAuthMail");
$query->setAction("update");
$query->setPriority("");

${'member_srl2_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl2_argument'}->checkFilter('number');
${'member_srl2_argument'}->checkNotNull();
if(!${'member_srl2_argument'}->isValid()) return ${'member_srl2_argument'}->getErrorMessage();
if(${'member_srl2_argument'} !== null) ${'member_srl2_argument'}->setColumnType('number');

${'auth_key3_argument'} = new Argument('auth_key', $args->{'auth_key'});
${'auth_key3_argument'}->checkNotNull();
if(!${'auth_key3_argument'}->isValid()) return ${'auth_key3_argument'}->getErrorMessage();
if(${'auth_key3_argument'} !== null) ${'auth_key3_argument'}->setColumnType('varchar');

${'member_srl4_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl4_argument'}->checkFilter('number');
${'member_srl4_argument'}->checkNotNull();
${'member_srl4_argument'}->createConditionValue();
if(!${'member_srl4_argument'}->isValid()) return ${'member_srl4_argument'}->getErrorMessage();
if(${'member_srl4_argument'} !== null) ${'member_srl4_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`member_srl`', ${'member_srl2_argument'})
,new UpdateExpression('`auth_key`', ${'auth_key3_argument'})
,new UpdateExpressionWithoutArgument('`regdate`', "'".date("YmdHis")."'")
));
$query->setTables(array(
new Table('`xe_member_auth_mail`', '`member_auth_mail`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>