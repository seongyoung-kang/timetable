<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberSnsList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->nick_name)) {
${'nick_name1_argument'} = new ConditionArgument('nick_name', $args->nick_name, 'like');
${'nick_name1_argument'}->createConditionValue();
if(!${'nick_name1_argument'}->isValid()) return ${'nick_name1_argument'}->getErrorMessage();
} else
${'nick_name1_argument'} = NULL;if(${'nick_name1_argument'} !== null) ${'nick_name1_argument'}->setColumnType('varchar');
if(isset($args->email)) {
${'email2_argument'} = new ConditionArgument('email', $args->email, 'like');
${'email2_argument'}->createConditionValue();
if(!${'email2_argument'}->isValid()) return ${'email2_argument'}->getErrorMessage();
} else
${'email2_argument'} = NULL;if(${'email2_argument'} !== null) ${'email2_argument'}->setColumnType('varchar');

${'page5_argument'} = new Argument('page', $args->{'page'});
${'page5_argument'}->ensureDefaultValue('1');
if(!${'page5_argument'}->isValid()) return ${'page5_argument'}->getErrorMessage();

${'page_count6_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count6_argument'}->ensureDefaultValue('10');
if(!${'page_count6_argument'}->isValid()) return ${'page_count6_argument'}->getErrorMessage();

${'list_count7_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count7_argument'}->ensureDefaultValue('20');
if(!${'list_count7_argument'}->isValid()) return ${'list_count7_argument'}->getErrorMessage();

${'sort_index3_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index3_argument'}->ensureDefaultValue('member.list_order');
if(!${'sort_index3_argument'}->isValid()) return ${'sort_index3_argument'}->getErrorMessage();

${'sort_order4_argument'} = new SortArgument('sort_order4', $args->sort_order);
${'sort_order4_argument'}->ensureDefaultValue('asc');
if(!${'sort_order4_argument'}->isValid()) return ${'sort_order4_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`member`.`member_srl`')
,new SelectExpression('`member`.`list_order`')
,new SelectExpression('`member`.`nick_name`')
,new SelectExpression('`socialxe`.`regdate`')
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
,new Table('`xe_socialxe`', '`socialxe`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`member`.`member_srl`','`socialxe`.`member_srl`',"equal")))
,new ConditionGroup(array(
new ConditionWithArgument('`member`.`nick_name`',$nick_name1_argument,"like", 'or')
,new ConditionWithArgument('`member`.`email_address`',$email2_argument,"like", 'or')),'and')
));
$query->setGroups(array(
'`member`.`member_srl`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index3_argument'}, $sort_order4_argument)
));
$query->setLimit(new Limit(${'list_count7_argument'}, ${'page5_argument'}, ${'page_count6_argument'}));
return $query; ?>