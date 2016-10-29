<?php
$lang->marketplace='게시판';
$lang->except_notice='공지사항 제외';
$lang->cmd_manage_menu='메뉴관리';
$lang->list_target_item='대상 항목';
$lang->list_display_item='표시 항목';
$lang->summary='요약';
$lang->thumbnail='섬네일';
$lang->click='클릭';
$lang->last_post='최종 글';
$lang->marketplace_management='장터 관리';
$lang->search_result='검색결과';
$lang->secret='비밀글 기능';
$lang->thisissecret='비밀글입니다.';
$lang->admin_mail='관리자 메일';
$lang->cmd_marketplace_list='게시판 목록';
$lang->cmd_module_config='게시판 공통 설정';
$lang->cmd_marketplace_info='게시판 정보';
$lang->cmd_list_setting='목록설정';
$lang->cmd_marketplace_setting='장터설정';
$lang->cmd_item_condition_setting='제품 구분(상태) 설정';
$lang->cmd_premium_ad_setting='프리미엄 광고 설정';
$lang->msg_alreay_scrapped='이미 찜 한 상품입니다.';
$lang->msg_cannot_insert_anymore='더 이상 등록할 수 없습니다.';
$lang->msg_already_exist_keyword='이미 존재하는 키워드입니다.';
$lang->msg_thumbnail_exceeds_limit_size='물품사진이 허용된 용량을 초과하여 첨부가 되지 않았습니다.';
$lang->msg_thumbnail_image_file_only='물품사진은 이미지만 업로드하실 수 있습니다.';
$lang->ask_change_soldout='상품 상태를 판매완료로 변경하겠습니까?';
$lang->ask_change_cancel='상품 판매를 중단하시겠습니까?';
$lang->ask_change_selling='상품을 다시 판매하시겠습니까?';
$lang->cmd_create_marketplace='마켓플레이스 등록';
$lang->cmd_manage_selected_marketplace='선택한 게시판 관리';
$lang->about_marketplace_condition_setup='판매 상품의 상태를 구분합니다. 콤마(,)를 이용하여 작성해주세요. (기본 값 : 새 제품, 중고 제품, 리퍼비시 제품)';
$lang->about_premium_ad_setup='판매자가 자신의 상품을 포인트를 사용하여 광고할 수 있는 기능입니다.';
$lang->about_layout_setup='블로그의 레이아웃 코드를 직접 수정할 수 있습니다. 위젯 코드를 원하는 곳에 삽입하시거나 관리하세요';
$lang->about_marketplace_category='분류를 만들 수 있습니다. 분류가 오동작을 할 경우 캐시파일 재생성을 수동으로 해주시면 해결이 될 수 있습니다.';
$lang->about_except_notice='목록 상단에 늘 나타나는 공지사항을 일반 목록에서 공지사항을 출력하지 않도록 합니다.';
$lang->about_use_anonymous='글쓴이의 정보를 없애고 익명으로 게시판 사용을 할 수 있게 합니다. 스킨설정에서 글쓴이 정보등을 보이지 않도록 하시면 더욱 유용합니다. 추가설정의 문서 히스토리 사용이 꺼져있지 않으면 문서 수정시 작성자가 표시될 수 있습니다.';
$lang->about_marketplace='게시판을 생성하고 관리할 수 있습니다.';
$lang->about_secret='게시판 및 댓글의 비밀글 기능을 사용할 수 있도록 합니다.';
$lang->about_admin_mail='글이나 댓글이 등록될때 등록된 메일주소로 메일이 발송됩니다. 콤마(,)로 연결시 다수의 메일주소로 발송할 수 있습니다.';
$lang->about_list_config='게시판의 목록형식 사용시 원하는 항목들로 배치를 할 수 있습니다. 단 스킨에서 지원하지 않는 경우 불가능합니다. 대상항목/ 표시항목의 항목을 더블클릭하면 추가/ 제거가 됩니다.';
$lang->about_use_status='글 작성 시 선택할 수 있는 상태를 지정해주세요.';
$lang->msg_not_enough_point='포인트가 부족합니다';
$lang->write_comment='댓글 쓰기';
$lang->msg_not_allow_comment='해당 글의 댓글 쓰기가 잠겨있습니다.';
$lang->no_marketplace_instance='생성된 게시판이 없습니다.';
$lang->choose_marketplace_instance='관리할 게시판을 선택해 주세요.';
$lang->comment_status='댓글';
$lang->category_settings='분류 설정';
$lang->hide_category='분류 숨기기';
$lang->about_hide_category='임시로 분류를 사용하지 않으려면 체크하세요.';
$lang->protect_content='글 보호 기능';
$lang->about_protect_content='판매 글에 댓글이 작성된 경우 글 작성자는 해당 글을 수정하거나 삭제 할 수 없도록 합니다. ';
$lang->msg_protect_content='댓글이 작성된 게시물의 글을 수정 또는 삭제 할 수 없습니다.';
if(!is_array($lang->time_gap)){
	$lang->time_gap = array();
}
$lang->time_gap['just_now']='방금';
$lang->time_gap['second']='%d초 전';
$lang->time_gap['seconds']='%d초 전';
$lang->time_gap['min']='%d분 전';
$lang->time_gap['mins']='%d분 전';
$lang->time_gap['hour']='%d시간 전';
$lang->time_gap['hours']='%d시간 전';
$lang->time_gap['day']='%d일 전';
$lang->time_gap['days']='%d일 전';
$lang->time_gap['week']='%d주일 전';
$lang->time_gap['weeks']='%d주일 전';
$lang->time_gap['month']='%d개월 전';
$lang->time_gap['months']='%d개월 전';
$lang->time_gap['year']='%d년 전';
$lang->time_gap['years']='%d년 전';
$lang->invalid_category='카테고리를 선택해주시기 바랍니다.';
$lang->msg_find_keyword_title='키워드 [%s]를 포함한 상품이 발견되었습니다.';
$lang->msg_find_keyword_content='회원님께서 찾고계시는 키워드를 포함한 상품이 발견되었습니다.<br />지금 바로 확인하시겠습니까?';
$lang->success_changed='변경되었습니다.';
$lang->add_content_time='%s에 내용 추가';
$lang->guide_reinsert='
			이 상품은 %s 부터 재 등록하실 수 있습니다.
					(글 작성 혹은 재 등록 이후 %d일 이후)
		';
$lang->success_reinsert='상품이 재 등록 되었습니다.';
$lang->item_name='상품명';
$lang->item_price='상품 가격';
$lang->price='가격';
$lang->bid_price='입찰가';
$lang->balance='광고료 제한 금액';
$lang->product_name='상품명';
$lang->delivery='택배거래';
$lang->direct_dealing='직거래';
$lang->safe_dealing='안전거래';
$lang->original_price='상품 구매 가격';
$lang->item_condition='상품 구분';
$lang->used_month='사용 기간';
$lang->priority_area='우선 거래 지역';
if(!is_array($lang->item_status)){
	$lang->item_status = array();
}
$lang->item_status['selling']='판매중';
$lang->item_status['soldout']='판매 완료';
$lang->item_status['cancel']='판매 중단';
if(!is_array($lang->option_allow)){
	$lang->option_allow = array();
}
$lang->option_allow['Y']='가능';
$lang->option_allow['N']='불가능';
if(!is_array($lang->conditions)){
	$lang->conditions = array();
}
if(!is_array($lang->conditions['used'])){
	$lang->conditions['used'] = array();
}
$lang->conditions['used']['eid']='used';
$lang->conditions['used']['name']='중고 제품';
$lang->conditions['used']['short_name']='중고';
$lang->conditions['used']['desc']='이미 사용한 제품입니다.';
if(!is_array($lang->conditions['new'])){
	$lang->conditions['new'] = array();
}
$lang->conditions['new']['eid']='new';
$lang->conditions['new']['name']='새 제품';
$lang->conditions['new']['short_name']='새제품';
$lang->conditions['new']['desc']='한번도 사용하지 않은 새 제품입니다.';
if(!is_array($lang->conditions['refurbish'])){
	$lang->conditions['refurbish'] = array();
}
$lang->conditions['refurbish']['eid']='refurbish';
$lang->conditions['refurbish']['name']='리퍼비시 제품';
$lang->conditions['refurbish']['short_name']='리퍼비시';
$lang->conditions['refurbish']['desc']='리퍼를 받은 제품입니다.';
