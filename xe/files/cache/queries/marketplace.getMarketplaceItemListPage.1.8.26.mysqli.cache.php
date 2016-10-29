<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMarketplaceItemListPage");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl2_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->createConditionValue();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
} else
${'module_srl2_argument'} = NULL;if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl3_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'in');
${'category_srl3_argument'}->checkFilter('number');
${'category_srl3_argument'}->createConditionValue();
if(!${'category_srl3_argument'}->isValid()) return ${'category_srl3_argument'}->getErrorMessage();
} else
${'category_srl3_argument'} = NULL;if(${'category_srl3_argument'} !== null) ${'category_srl3_argument'}->setColumnType('number');
if(isset($args->item_condition)) {
${'item_condition4_argument'} = new ConditionArgument('item_condition', $args->item_condition, 'in');
${'item_condition4_argument'}->createConditionValue();
if(!${'item_condition4_argument'}->isValid()) return ${'item_condition4_argument'}->getErrorMessage();
} else
${'item_condition4_argument'} = NULL;if(${'item_condition4_argument'} !== null) ${'item_condition4_argument'}->setColumnType('varchar');
if(isset($args->member_srl)) {
${'member_srl5_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl5_argument'}->checkFilter('number');
${'member_srl5_argument'}->createConditionValue();
if(!${'member_srl5_argument'}->isValid()) return ${'member_srl5_argument'}->getErrorMessage();
} else
${'member_srl5_argument'} = NULL;if(${'member_srl5_argument'} !== null) ${'member_srl5_argument'}->setColumnType('number');
if(isset($args->priority_area)) {
${'priority_area6_argument'} = new ConditionArgument('priority_area', $args->priority_area, 'like_prefix');
${'priority_area6_argument'}->createConditionValue();
if(!${'priority_area6_argument'}->isValid()) return ${'priority_area6_argument'}->getErrorMessage();
} else
${'priority_area6_argument'} = NULL;if(${'priority_area6_argument'} !== null) ${'priority_area6_argument'}->setColumnType('varchar');
if(isset($args->used_month)) {
${'used_month7_argument'} = new ConditionArgument('used_month', $args->used_month, 'less');
${'used_month7_argument'}->createConditionValue();
if(!${'used_month7_argument'}->isValid()) return ${'used_month7_argument'}->getErrorMessage();
} else
${'used_month7_argument'} = NULL;if(${'used_month7_argument'} !== null) ${'used_month7_argument'}->setColumnType('number');
if(isset($args->item_status)) {
${'item_status8_argument'} = new ConditionArgument('item_status', $args->item_status, 'equal');
${'item_status8_argument'}->createConditionValue();
if(!${'item_status8_argument'}->isValid()) return ${'item_status8_argument'}->getErrorMessage();
} else
${'item_status8_argument'} = NULL;if(${'item_status8_argument'} !== null) ${'item_status8_argument'}->setColumnType('varchar');
if(isset($args->not_item_status)) {
${'not_item_status9_argument'} = new ConditionArgument('not_item_status', $args->not_item_status, 'notequal');
${'not_item_status9_argument'}->createConditionValue();
if(!${'not_item_status9_argument'}->isValid()) return ${'not_item_status9_argument'}->getErrorMessage();
} else
${'not_item_status9_argument'} = NULL;if(${'not_item_status9_argument'} !== null) ${'not_item_status9_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword10_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword10_argument'}->createConditionValue();
if(!${'search_keyword10_argument'}->isValid()) return ${'search_keyword10_argument'}->getErrorMessage();
} else
${'search_keyword10_argument'} = NULL;if(${'search_keyword10_argument'} !== null) ${'search_keyword10_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword11_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword11_argument'}->createConditionValue();
if(!${'search_keyword11_argument'}->isValid()) return ${'search_keyword11_argument'}->getErrorMessage();
} else
${'search_keyword11_argument'} = NULL;if(${'search_keyword11_argument'} !== null) ${'search_keyword11_argument'}->setColumnType('bigtext');
if(isset($args->search_keyword)) {
${'search_keyword12_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword12_argument'}->createConditionValue();
if(!${'search_keyword12_argument'}->isValid()) return ${'search_keyword12_argument'}->getErrorMessage();
} else
${'search_keyword12_argument'} = NULL;if(${'search_keyword12_argument'} !== null) ${'search_keyword12_argument'}->setColumnType('varchar');
if(isset($args->price_from)) {
${'price_from13_argument'} = new ConditionArgument('price_from', $args->price_from, 'more');
${'price_from13_argument'}->createConditionValue();
if(!${'price_from13_argument'}->isValid()) return ${'price_from13_argument'}->getErrorMessage();
} else
${'price_from13_argument'} = NULL;if(${'price_from13_argument'} !== null) ${'price_from13_argument'}->setColumnType('number');
if(isset($args->price_to)) {
${'price_to14_argument'} = new ConditionArgument('price_to', $args->price_to, 'less');
${'price_to14_argument'}->createConditionValue();
if(!${'price_to14_argument'}->isValid()) return ${'price_to14_argument'}->getErrorMessage();
} else
${'price_to14_argument'} = NULL;if(${'price_to14_argument'} !== null) ${'price_to14_argument'}->setColumnType('number');
if(isset($args->list_order)) {
${'list_order15_argument'} = new ConditionArgument('list_order', $args->list_order, 'less');
${'list_order15_argument'}->checkFilter('number');
${'list_order15_argument'}->createConditionValue();
if(!${'list_order15_argument'}->isValid()) return ${'list_order15_argument'}->getErrorMessage();
} else
${'list_order15_argument'} = NULL;if(${'list_order15_argument'} !== null) ${'list_order15_argument'}->setColumnType('number');
if(isset($args->rev_list_order)) {
${'rev_list_order16_argument'} = new ConditionArgument('rev_list_order', $args->rev_list_order, 'more');
${'rev_list_order16_argument'}->checkFilter('number');
${'rev_list_order16_argument'}->createConditionValue();
if(!${'rev_list_order16_argument'}->isValid()) return ${'rev_list_order16_argument'}->getErrorMessage();
} else
${'rev_list_order16_argument'} = NULL;if(${'rev_list_order16_argument'} !== null) ${'rev_list_order16_argument'}->setColumnType('number');
if(isset($args->update_order)) {
${'update_order17_argument'} = new ConditionArgument('update_order', $args->update_order, 'less');
${'update_order17_argument'}->checkFilter('number');
${'update_order17_argument'}->createConditionValue();
if(!${'update_order17_argument'}->isValid()) return ${'update_order17_argument'}->getErrorMessage();
} else
${'update_order17_argument'} = NULL;if(${'update_order17_argument'} !== null) ${'update_order17_argument'}->setColumnType('number');
if(isset($args->rev_update_order)) {
${'rev_update_order18_argument'} = new ConditionArgument('rev_update_order', $args->rev_update_order, 'more');
${'rev_update_order18_argument'}->checkFilter('number');
${'rev_update_order18_argument'}->createConditionValue();
if(!${'rev_update_order18_argument'}->isValid()) return ${'rev_update_order18_argument'}->getErrorMessage();
} else
${'rev_update_order18_argument'} = NULL;if(${'rev_update_order18_argument'} !== null) ${'rev_update_order18_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('count(`items`.`document_srl`)', '`count`')
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
new ConditionWithArgument('`documents`.`module_srl`',$module_srl2_argument,"in")
,new ConditionWithArgument('`documents`.`category_srl`',$category_srl3_argument,"in", 'and')
,new ConditionWithArgument('`items`.`item_condition`',$item_condition4_argument,"in", 'and')
,new ConditionWithArgument('`documents`.`member_srl`',$member_srl5_argument,"equal", 'and')
,new ConditionWithArgument('`items`.`priority_area`',$priority_area6_argument,"like_prefix", 'and')
,new ConditionWithArgument('`items`.`used_month`',$used_month7_argument,"less", 'and')
,new ConditionWithArgument('`items`.`item_status`',$item_status8_argument,"equal", 'and')
,new ConditionWithArgument('`items`.`item_status`',$not_item_status9_argument,"notequal", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`documents`.`title`',$search_keyword10_argument,"like", 'or')
,new ConditionWithArgument('`documents`.`content`',$search_keyword11_argument,"like", 'or')
,new ConditionWithArgument('`items`.`product_name`',$search_keyword12_argument,"like", 'or')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`items`.`price`',$price_from13_argument,"more", 'and')
,new ConditionWithArgument('`items`.`price`',$price_to14_argument,"less", 'and')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`documents`.`list_order`',$list_order15_argument,"less", 'and')
,new ConditionWithArgument('`documents`.`list_order`',$rev_list_order16_argument,"more", 'and')
,new ConditionWithArgument('`documents`.`update_order`',$update_order17_argument,"less", 'and')
,new ConditionWithArgument('`documents`.`update_order`',$rev_update_order18_argument,"more", 'and')),'and')
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>