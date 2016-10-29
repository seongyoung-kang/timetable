<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMarketplaceItemList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl6_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl6_argument'}->checkFilter('number');
${'module_srl6_argument'}->createConditionValue();
if(!${'module_srl6_argument'}->isValid()) return ${'module_srl6_argument'}->getErrorMessage();
} else
${'module_srl6_argument'} = NULL;if(${'module_srl6_argument'} !== null) ${'module_srl6_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl7_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'in');
${'category_srl7_argument'}->checkFilter('number');
${'category_srl7_argument'}->createConditionValue();
if(!${'category_srl7_argument'}->isValid()) return ${'category_srl7_argument'}->getErrorMessage();
} else
${'category_srl7_argument'} = NULL;if(${'category_srl7_argument'} !== null) ${'category_srl7_argument'}->setColumnType('number');
if(isset($args->item_condition)) {
${'item_condition8_argument'} = new ConditionArgument('item_condition', $args->item_condition, 'in');
${'item_condition8_argument'}->createConditionValue();
if(!${'item_condition8_argument'}->isValid()) return ${'item_condition8_argument'}->getErrorMessage();
} else
${'item_condition8_argument'} = NULL;if(${'item_condition8_argument'} !== null) ${'item_condition8_argument'}->setColumnType('varchar');
if(isset($args->member_srl)) {
${'member_srl9_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl9_argument'}->checkFilter('number');
${'member_srl9_argument'}->createConditionValue();
if(!${'member_srl9_argument'}->isValid()) return ${'member_srl9_argument'}->getErrorMessage();
} else
${'member_srl9_argument'} = NULL;if(${'member_srl9_argument'} !== null) ${'member_srl9_argument'}->setColumnType('number');
if(isset($args->priority_area)) {
${'priority_area10_argument'} = new ConditionArgument('priority_area', $args->priority_area, 'like_prefix');
${'priority_area10_argument'}->createConditionValue();
if(!${'priority_area10_argument'}->isValid()) return ${'priority_area10_argument'}->getErrorMessage();
} else
${'priority_area10_argument'} = NULL;if(${'priority_area10_argument'} !== null) ${'priority_area10_argument'}->setColumnType('varchar');
if(isset($args->used_month)) {
${'used_month11_argument'} = new ConditionArgument('used_month', $args->used_month, 'less');
${'used_month11_argument'}->createConditionValue();
if(!${'used_month11_argument'}->isValid()) return ${'used_month11_argument'}->getErrorMessage();
} else
${'used_month11_argument'} = NULL;if(${'used_month11_argument'} !== null) ${'used_month11_argument'}->setColumnType('number');
if(isset($args->item_status)) {
${'item_status12_argument'} = new ConditionArgument('item_status', $args->item_status, 'equal');
${'item_status12_argument'}->createConditionValue();
if(!${'item_status12_argument'}->isValid()) return ${'item_status12_argument'}->getErrorMessage();
} else
${'item_status12_argument'} = NULL;if(${'item_status12_argument'} !== null) ${'item_status12_argument'}->setColumnType('varchar');
if(isset($args->not_item_status)) {
${'not_item_status13_argument'} = new ConditionArgument('not_item_status', $args->not_item_status, 'notequal');
${'not_item_status13_argument'}->createConditionValue();
if(!${'not_item_status13_argument'}->isValid()) return ${'not_item_status13_argument'}->getErrorMessage();
} else
${'not_item_status13_argument'} = NULL;if(${'not_item_status13_argument'} !== null) ${'not_item_status13_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword14_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword14_argument'}->createConditionValue();
if(!${'search_keyword14_argument'}->isValid()) return ${'search_keyword14_argument'}->getErrorMessage();
} else
${'search_keyword14_argument'} = NULL;if(${'search_keyword14_argument'} !== null) ${'search_keyword14_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword15_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword15_argument'}->createConditionValue();
if(!${'search_keyword15_argument'}->isValid()) return ${'search_keyword15_argument'}->getErrorMessage();
} else
${'search_keyword15_argument'} = NULL;if(${'search_keyword15_argument'} !== null) ${'search_keyword15_argument'}->setColumnType('bigtext');
if(isset($args->search_keyword)) {
${'search_keyword16_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword16_argument'}->createConditionValue();
if(!${'search_keyword16_argument'}->isValid()) return ${'search_keyword16_argument'}->getErrorMessage();
} else
${'search_keyword16_argument'} = NULL;if(${'search_keyword16_argument'} !== null) ${'search_keyword16_argument'}->setColumnType('varchar');
if(isset($args->price_from)) {
${'price_from17_argument'} = new ConditionArgument('price_from', $args->price_from, 'more');
${'price_from17_argument'}->createConditionValue();
if(!${'price_from17_argument'}->isValid()) return ${'price_from17_argument'}->getErrorMessage();
} else
${'price_from17_argument'} = NULL;if(${'price_from17_argument'} !== null) ${'price_from17_argument'}->setColumnType('number');
if(isset($args->price_to)) {
${'price_to18_argument'} = new ConditionArgument('price_to', $args->price_to, 'less');
${'price_to18_argument'}->createConditionValue();
if(!${'price_to18_argument'}->isValid()) return ${'price_to18_argument'}->getErrorMessage();
} else
${'price_to18_argument'} = NULL;if(${'price_to18_argument'} !== null) ${'price_to18_argument'}->setColumnType('number');

${'page21_argument'} = new Argument('page', $args->{'page'});
${'page21_argument'}->ensureDefaultValue('1');
if(!${'page21_argument'}->isValid()) return ${'page21_argument'}->getErrorMessage();

${'page_count22_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count22_argument'}->ensureDefaultValue('10');
if(!${'page_count22_argument'}->isValid()) return ${'page_count22_argument'}->getErrorMessage();

${'list_count23_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count23_argument'}->ensureDefaultValue('20');
if(!${'list_count23_argument'}->isValid()) return ${'list_count23_argument'}->getErrorMessage();

${'sort_index19_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index19_argument'}->ensureDefaultValue('documents.list_order');
if(!${'sort_index19_argument'}->isValid()) return ${'sort_index19_argument'}->getErrorMessage();

${'order_type20_argument'} = new SortArgument('order_type20', $args->order_type);
${'order_type20_argument'}->ensureDefaultValue('asc');
if(!${'order_type20_argument'}->isValid()) return ${'order_type20_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`items`.*')
,new SelectExpression('`documents`.*')
));
$query->setTables(array(
new Table('`xe_marketplace_items`', '`items`')
,new JoinTable('`xe_documents`', '`documents`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`documents`.`document_srl`','`items`.`document_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`documents`.`module_srl`',$module_srl6_argument,"in")
,new ConditionWithArgument('`documents`.`category_srl`',$category_srl7_argument,"in", 'and')
,new ConditionWithArgument('`items`.`item_condition`',$item_condition8_argument,"in", 'and')
,new ConditionWithArgument('`documents`.`member_srl`',$member_srl9_argument,"equal", 'and')
,new ConditionWithArgument('`items`.`priority_area`',$priority_area10_argument,"like_prefix", 'and')
,new ConditionWithArgument('`items`.`used_month`',$used_month11_argument,"less", 'and')
,new ConditionWithArgument('`items`.`item_status`',$item_status12_argument,"equal", 'and')
,new ConditionWithArgument('`items`.`item_status`',$not_item_status13_argument,"notequal", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`documents`.`title`',$search_keyword14_argument,"like", 'or')
,new ConditionWithArgument('`documents`.`content`',$search_keyword15_argument,"like", 'or')
,new ConditionWithArgument('`items`.`product_name`',$search_keyword16_argument,"like", 'or')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`items`.`price`',$price_from17_argument,"more", 'and')
,new ConditionWithArgument('`items`.`price`',$price_to18_argument,"less", 'and')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index19_argument'}, $order_type20_argument)
));
$query->setLimit(new Limit(${'list_count23_argument'}, ${'page21_argument'}, ${'page_count22_argument'}));
return $query; ?>