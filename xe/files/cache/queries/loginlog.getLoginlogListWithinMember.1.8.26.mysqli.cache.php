<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLoginlogListWithinMember");
$query->setAction("select");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl1_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl1_argument'}->checkFilter('number');
${'member_srl1_argument'}->createConditionValue();
if(!${'member_srl1_argument'}->isValid()) return ${'member_srl1_argument'}->getErrorMessage();
} else
${'member_srl1_argument'} = NULL;if(${'member_srl1_argument'} !== null) ${'member_srl1_argument'}->setColumnType('number');
if(isset($args->s_log_srl)) {
${'s_log_srl2_argument'} = new ConditionArgument('s_log_srl', $args->s_log_srl, 'in');
${'s_log_srl2_argument'}->createConditionValue();
if(!${'s_log_srl2_argument'}->isValid()) return ${'s_log_srl2_argument'}->getErrorMessage();
} else
${'s_log_srl2_argument'} = NULL;if(${'s_log_srl2_argument'} !== null) ${'s_log_srl2_argument'}->setColumnType('number');
if(isset($args->s_ipaddress)) {
${'s_ipaddress3_argument'} = new ConditionArgument('s_ipaddress', $args->s_ipaddress, 'like_prefix');
${'s_ipaddress3_argument'}->createConditionValue();
if(!${'s_ipaddress3_argument'}->isValid()) return ${'s_ipaddress3_argument'}->getErrorMessage();
} else
${'s_ipaddress3_argument'} = NULL;if(${'s_ipaddress3_argument'} !== null) ${'s_ipaddress3_argument'}->setColumnType('varchar');
if(isset($args->daterange_start)) {
${'daterange_start4_argument'} = new ConditionArgument('daterange_start', $args->daterange_start, 'more');
${'daterange_start4_argument'}->createConditionValue();
if(!${'daterange_start4_argument'}->isValid()) return ${'daterange_start4_argument'}->getErrorMessage();
} else
${'daterange_start4_argument'} = NULL;if(${'daterange_start4_argument'} !== null) ${'daterange_start4_argument'}->setColumnType('date');
if(isset($args->daterange_end)) {
${'daterange_end5_argument'} = new ConditionArgument('daterange_end', $args->daterange_end, 'less');
${'daterange_end5_argument'}->createConditionValue();
if(!${'daterange_end5_argument'}->isValid()) return ${'daterange_end5_argument'}->getErrorMessage();
} else
${'daterange_end5_argument'} = NULL;if(${'daterange_end5_argument'} !== null) ${'daterange_end5_argument'}->setColumnType('date');
if(isset($args->s_platform)) {
${'s_platform6_argument'} = new ConditionArgument('s_platform', $args->s_platform, 'like');
${'s_platform6_argument'}->createConditionValue();
if(!${'s_platform6_argument'}->isValid()) return ${'s_platform6_argument'}->getErrorMessage();
} else
${'s_platform6_argument'} = NULL;if(${'s_platform6_argument'} !== null) ${'s_platform6_argument'}->setColumnType('varchar');
if(isset($args->s_browser)) {
${'s_browser7_argument'} = new ConditionArgument('s_browser', $args->s_browser, 'like');
${'s_browser7_argument'}->createConditionValue();
if(!${'s_browser7_argument'}->isValid()) return ${'s_browser7_argument'}->getErrorMessage();
} else
${'s_browser7_argument'} = NULL;if(${'s_browser7_argument'} !== null) ${'s_browser7_argument'}->setColumnType('varchar');
if(isset($args->isSucceed)) {
${'isSucceed8_argument'} = new ConditionArgument('isSucceed', $args->isSucceed, 'like');
${'isSucceed8_argument'}->createConditionValue();
if(!${'isSucceed8_argument'}->isValid()) return ${'isSucceed8_argument'}->getErrorMessage();
} else
${'isSucceed8_argument'} = NULL;if(${'isSucceed8_argument'} !== null) ${'isSucceed8_argument'}->setColumnType('char');
if(isset($args->s_user_id)) {
${'s_user_id9_argument'} = new ConditionArgument('s_user_id', $args->s_user_id, 'like');
${'s_user_id9_argument'}->createConditionValue();
if(!${'s_user_id9_argument'}->isValid()) return ${'s_user_id9_argument'}->getErrorMessage();
} else
${'s_user_id9_argument'} = NULL;if(${'s_user_id9_argument'} !== null) ${'s_user_id9_argument'}->setColumnType('varchar');
if(isset($args->s_user_name)) {
${'s_user_name10_argument'} = new ConditionArgument('s_user_name', $args->s_user_name, 'like');
${'s_user_name10_argument'}->createConditionValue();
if(!${'s_user_name10_argument'}->isValid()) return ${'s_user_name10_argument'}->getErrorMessage();
} else
${'s_user_name10_argument'} = NULL;if(${'s_user_name10_argument'} !== null) ${'s_user_name10_argument'}->setColumnType('varchar');
if(isset($args->s_nick_name)) {
${'s_nick_name11_argument'} = new ConditionArgument('s_nick_name', $args->s_nick_name, 'like');
${'s_nick_name11_argument'}->createConditionValue();
if(!${'s_nick_name11_argument'}->isValid()) return ${'s_nick_name11_argument'}->getErrorMessage();
} else
${'s_nick_name11_argument'} = NULL;if(${'s_nick_name11_argument'} !== null) ${'s_nick_name11_argument'}->setColumnType('varchar');
if(isset($args->is_admin)) {
${'is_admin12_argument'} = new ConditionArgument('is_admin', $args->is_admin, 'equal');
${'is_admin12_argument'}->createConditionValue();
if(!${'is_admin12_argument'}->isValid()) return ${'is_admin12_argument'}->getErrorMessage();
} else
${'is_admin12_argument'} = NULL;if(${'is_admin12_argument'} !== null) ${'is_admin12_argument'}->setColumnType('char');

${'page15_argument'} = new Argument('page', $args->{'page'});
${'page15_argument'}->ensureDefaultValue('1');
if(!${'page15_argument'}->isValid()) return ${'page15_argument'}->getErrorMessage();

${'page_count16_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count16_argument'}->ensureDefaultValue('10');
if(!${'page_count16_argument'}->isValid()) return ${'page_count16_argument'}->getErrorMessage();

${'list_count17_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count17_argument'}->ensureDefaultValue('20');
if(!${'list_count17_argument'}->isValid()) return ${'list_count17_argument'}->getErrorMessage();

${'sort_index13_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index13_argument'}->ensureDefaultValue('loginlog.regdate');
if(!${'sort_index13_argument'}->isValid()) return ${'sort_index13_argument'}->getErrorMessage();

${'order_type14_argument'} = new SortArgument('order_type14', $args->order_type);
${'order_type14_argument'}->ensureDefaultValue('asc');
if(!${'order_type14_argument'}->isValid()) return ${'order_type14_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`member`.*')
,new SelectExpression('`loginlog`.*')
));
$query->setTables(array(
new Table('`xe_member_loginlog`', '`loginlog`')
,new JoinTable('`xe_member`', '`member`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`member`.`member_srl`','`loginlog`.`member_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`loginlog`.`member_srl`',$member_srl1_argument,"equal", 'and')
,new ConditionWithArgument('`loginlog`.`log_srl`',$s_log_srl2_argument,"in", 'and')
,new ConditionWithArgument('`loginlog`.`ipaddress`',$s_ipaddress3_argument,"like_prefix", 'and')
,new ConditionWithArgument('`loginlog`.`regdate`',$daterange_start4_argument,"more", 'and')
,new ConditionWithArgument('`loginlog`.`regdate`',$daterange_end5_argument,"less", 'and')
,new ConditionWithArgument('`loginlog`.`platform`',$s_platform6_argument,"like", 'and')
,new ConditionWithArgument('`loginlog`.`browser`',$s_browser7_argument,"like", 'and')
,new ConditionWithArgument('`loginlog`.`is_succeed`',$isSucceed8_argument,"like", 'and')
,new ConditionWithArgument('`member`.`user_id`',$s_user_id9_argument,"like", 'and')
,new ConditionWithArgument('`member`.`user_name`',$s_user_name10_argument,"like", 'and')
,new ConditionWithArgument('`member`.`nick_name`',$s_nick_name11_argument,"like", 'and')
,new ConditionWithArgument('`member`.`is_admin`',$is_admin12_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index13_argument'}, $order_type14_argument)
));
$query->setLimit(new Limit(${'list_count17_argument'}, ${'page15_argument'}, ${'page_count16_argument'}));
return $query; ?>