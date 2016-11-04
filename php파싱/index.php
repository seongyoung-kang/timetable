
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <title>parsing complete</title>

  </head>
  <body>

  </body>

<?php
//including snoopy
include_once './Snoopy/Snoopy.class.php';



//파싱 대상 설정
$login_url = "https://ktis.kookmin.ac.kr/kmu/ucb.Ucb0162rAGet01.do";

//객체 만들기, 기본설정(설정값은 아래에...)
$snoopy = new snoopy;

$vars['gs_mode'] = $_POST["gs_mode"];
$vars['user_id'] = $_POST["user_id"];
$vars['gs_arg_group_num'] = $_POST["gs_arg_group_num"];
$vars['arg_txt_year'] = $_POST["arg_txt_year"];
$vars['arg_slct_smt'] = $_POST["arg_slct_smt"];
$vars['search_div'] = $_POST["search_div"];
$vars['arg_slct_coll_cd'] = $_POST["arg_slct_coll_cd"];
$vars['arg_slct_dept_cd'] = $_POST["arg_slct_dept_cd"];
$vars['arg_slct_comdiv_cd'] = $_POST["arg_slct_comdiv_cd"];
$vars['arg_slct_group_num'] = $_POST["arg_slct_group_num"];
$vars['arg_slct_group_num1'] = $_POST["arg_slct_group_num1"];
$vars['group_class_div'] = $_POST["group_class_div"];
$vars['arg_txt_curi_num'] = $_POST["arg_txt_curi_num"];
$vars['arg_txt_curi_nm'] = $_POST["arg_txt_curi_nm"];
$vars['arg_slct_gdept_cd'] = $_POST["arg_slct_gdept_cd"];
$vars['slct_total_page'] = "150";

/*  ---수동조작용
$vars['gs_mode'] = "L";
$vars['user_id'] = "null";
$vars['gs_arg_group_num'] = "08";
$vars['arg_txt_year'] = "2016";
$vars['arg_slct_smt'] = "20";
$vars['search_div'] = "5";
$vars['arg_slct_coll_cd'] = "20001";
$vars['arg_slct_dept_cd'] = "20003$01";
$vars['arg_slct_comdiv_cd'] = "";
$vars['arg_slct_group_num'] = "08";
$vars['arg_slct_group_num1'] = "11";
$vars['group_class_div'] = "01";
$vars['arg_txt_curi_num'] = "";
$vars['arg_txt_curi_nm'] = "";
$vars['arg_slct_gdept_cd'] = "xx";
$vars['slct_total_page'] = "150";
*/

//사이트로 해당 변수들 보내기
$snoopy->httpmethod = "POST";
$snoopy->submit($login_url,$vars);

//출력 (정규표현식 사용)
$txt = $snoopy->results;
<<<<<<< HEAD

$rex1="!<tr onmouseover(.*?)<\/tr>!is";
preg_match_all($rex1,$txt,$text);

//$rex2="!<a (.*?)<\/a>!is";
//preg_match_all($rex2,$text,$o);

print_r($text);
//$txt=preg_replace("!<tr onmouseover(.*?)<\/tr>!is","",$txt);


//print_r($txt);


//파일 다운로드 시키기



//print_r($txt);
=======
$txt=preg_replace("!<a href(.*?)<\/a>!is","",$txt);
$txt=preg_replace("!\=\"this(.*?)\">!is","",$txt);
//$txt=preg_replace("!<head(.*?)<\/head>!is","",$txt);
$rex="!<tr onmouseover(.*?)<\/tr>!is";

preg_match_all($rex,$txt,$text);


print_r($text[1]);
$fp = fopen('here.txt', 'a');
fwrite($fp, print_r($text[1], TRUE));
fclose($fp);

>>>>>>> 13-

/*
아래는 2학기 기준입니다.
1학기로 가고싶으면 $vars['arg_slct_smt'] = "20"; 을 $vars['arg_slct_smt'] = "10";으로 수정하세요!
*/


/* 교양설정 (컨트롤 f 로 원하는 교양 설정을 찾으세요...)
핵심교양 - 인문1, 인문2, 소통, 글로벌, 창의
자유교양 -

핵심교양 - 인문1
$vars['gs_mode'] = "L";
$vars['user_id'] = "null";
$vars['gs_arg_group_num'] = "08";
$vars['arg_txt_year'] = "2016";
$vars['arg_slct_smt'] = "20";
$vars['search_div'] = "5";
$vars['arg_slct_coll_cd'] = "20001";
$vars['arg_slct_dept_cd'] = "20003$01";
$vars['arg_slct_comdiv_cd'] = "";
$vars['arg_slct_group_num'] = "08";
$vars['arg_slct_group_num1'] = "11";
$vars['group_class_div'] = "01";
$vars['arg_txt_curi_num'] = "";
$vars['arg_txt_curi_nm'] = "";
$vars['arg_slct_gdept_cd'] = "xx";
$vars['slct_total_page'] = "150";

핵심교양 - 인문2 : 위 코드에서 $vars['arg_slct_group_num1'] = "12"; 로 수정
핵심교양 - 소통  : 위 코드에서 $vars['arg_slct_group_num1'] = "13"; 로 수정
핵심교양 - 글로벌  : 위 코드에서 $vars['arg_slct_group_num1'] = "14"; 로 수정
핵심교양 - 창의 : 위 코드에서 $vars['arg_slct_group_num1'] = "15"; 로 수정


자유교양 - 문학, 언어
$vars['gs_mode'] = "L";
$vars['user_id'] = "null";
$vars['gs_arg_group_num'] = "08";
$vars['arg_txt_year'] = "2016";
$vars['arg_slct_smt'] = "20";
$vars['search_div'] = "2";
$vars['arg_slct_coll_cd'] = "xx";
$vars['arg_slct_dept_cd'] = "xx";
$vars['arg_slct_comdiv_cd'] = "";
$vars['arg_slct_group_num'] = "01";
$vars['arg_slct_group_num1'] = "11";
$vars['group_class_div'] = "01";
$vars['arg_txt_curi_num'] = "";
$vars['arg_txt_curi_nm'] = "";
$vars['arg_slct_gdept_cd'] = "xx";
$vars['slct_total_page'] = "150";

자유교양 - 역사, 철학 : 위 코드에서 $vars['gs_arg_group_num'] = "01";  $vars['arg_slct_group_num'] = "02"; 로 수정
자유교양 - 정치, 경제, 사회, 세계 : $vars['gs_arg_group_num'] = "02";  $vars['arg_slct_group_num'] = "03"; 로 수정
자유교양 - 과학, 기술, 자연 : $vars['gs_arg_group_num'] = "03";  $vars['arg_slct_group_num'] = "04"; 로 수정
자유교양 - 예, 체능계 : $vars['gs_arg_group_num'] = "04";  $vars['arg_slct_group_num'] = "05"; 로 수정
자유교양 - 인성교육 : $vars['gs_arg_group_num'] = "05";  $vars['arg_slct_group_num'] = "08"; 로 수정
자유교양 - 교직 : $vars['gs_arg_group_num'] = "08";  $vars['arg_slct_group_num'] = "06"; 로 수정
자유교양 - 군사학 : $vars['gs_arg_group_num'] = "06";  $vars['arg_slct_group_num'] = "07"; 로 수정

*/





/* arg_slct_coll_cd / arg_slct_dept_cd : 대학 / 학과 숫자로 구분
  나머지는 defualt값임 신경 ㄴㄴ해

기본 세팅 -
$vars['gs_mode'] = "L";
$vars['user_id'] = "null";
$vars['gs_arg_group_num'] = "07";
$vars['arg_txt_year'] = "2016";
$vars['arg_slct_smt'] = "20";
$vars['search_div'] = "1";
$vars['arg_slct_coll_cd'] = "20001";
$vars['arg_slct_dept_cd'] = "20003$01";
$vars['arg_slct_comdiv_cd'] = "";
$vars['arg_slct_group_num'] = "07";
$vars['arg_slct_group_num1'] = "11";
$vars['group_class_div'] = "01";
$vars['arg_txt_curi_num'] = "";
$vars['arg_txt_curi_nm'] = "";
$vars['arg_slct_gdept_cd'] = "xx";
$vars['slct_total_page'] = "150";



var deptCollection = new Array();
deptCollection[0] = new Dept("29998", "학과미배정", "29999$01", "학과미배정");
deptCollection[1] = new Dept("20001", "문과대학", "20003$01", "국어국문학과");
deptCollection[2] = new Dept("20001", "문과대학", "20004$01", "영어영문학과");
deptCollection[3] = new Dept("20001", "문과대학", "20416$01", "영어영문학부");
deptCollection[4] = new Dept("20001", "문과대학", "20417$01", "영어영문학부 영미어문전공");
deptCollection[5] = new Dept("20001", "문과대학", "20418$01", "영어영문학부 글로벌커뮤니케이션영어전공");
deptCollection[6] = new Dept("20001", "문과대학", "20005$01", "중어중문학과");
deptCollection[7] = new Dept("20001", "문과대학", "20006$01", "국사학과");
deptCollection[8] = new Dept("20001", "문과대학", "20009$01", "교육학과");
deptCollection[9] = new Dept("20001", "문과대학", "20004$02", "영어영문학과(야)");
deptCollection[10] = new Dept("20001", "문과대학", "20006$02", "국사학과(야)");
deptCollection[11] = new Dept("20010", "사회과학대학", "20012$01", "사회과학부");
deptCollection[12] = new Dept("20010", "사회과학대학", "20373$01", "행정정책학부");
deptCollection[13] = new Dept("20010", "사회과학대학", "20013$01", "사회과학부 행정학전공");
deptCollection[14] = new Dept("20010", "사회과학대학", "20374$01", "행정정책학부 행정학전공");
deptCollection[15] = new Dept("20010", "사회과학대학", "20014$01", "사회과학부 정치외교학전공");
deptCollection[16] = new Dept("20010", "사회과학대학", "20375$01", "행정정책학부 정책학전공");
deptCollection[17] = new Dept("20010", "사회과학대학", "20015$01", "사회과학부 사회학전공");
deptCollection[18] = new Dept("20010", "사회과학대학", "20016$01", "언론학부");
deptCollection[19] = new Dept("20010", "사회과학대학", "20273$01", "정치외교학과");
deptCollection[20] = new Dept("20010", "사회과학대학", "20017$01", "언론학부 언론학전공");
deptCollection[21] = new Dept("20010", "사회과학대학", "20018$01", "언론학부 광고학전공");
deptCollection[22] = new Dept("20010", "사회과학대학", "20019$01", "국제지역학부");
deptCollection[23] = new Dept("20010", "사회과학대학", "20274$01", "사회학과");
deptCollection[24] = new Dept("20010", "사회과학대학", "20020$01", "국제지역학부 러시아학전공");
deptCollection[25] = new Dept("20010", "사회과학대학", "20021$01", "국제지역학부 일본학전공");
deptCollection[26] = new Dept("20010", "사회과학대학", "20022$01", "국제지역학부 중국학전공");
deptCollection[27] = new Dept("20010", "사회과학대학", "20023$01", "언론정보학부");
deptCollection[28] = new Dept("20010", "사회과학대학", "20272$01", "행정학과");
deptCollection[29] = new Dept("20010", "사회과학대학", "20024$01", "언론정보학부 언론학전공");
deptCollection[30] = new Dept("20010", "사회과학대학", "20025$01", "언론정보학부 광고학전공");
deptCollection[31] = new Dept("20010", "사회과학대학", "20026$01", "국제학부");
deptCollection[32] = new Dept("20010", "사회과학대학", "20027$01", "국제학부 러시아학전공");
deptCollection[33] = new Dept("20010", "사회과학대학", "20272$02", "행정학과(야)");
deptCollection[34] = new Dept("20010", "사회과학대학", "20415$02", "행정정책학부 행정학전공 계약학과");
deptCollection[35] = new Dept("20010", "사회과학대학", "20028$01", "국제학부 일본학전공");
deptCollection[36] = new Dept("20010", "사회과학대학", "20029$01", "국제학부 중국학전공");
deptCollection[37] = new Dept("20010", "사회과학대학", "20448$01", "국제학부 글로벌한국학전공");
deptCollection[38] = new Dept("20010", "사회과학대학", "20030$01", "행정학과");
deptCollection[39] = new Dept("20010", "사회과학대학", "20031$01", "정치외교학과");
deptCollection[40] = new Dept("20010", "사회과학대학", "20032$01", "사회학과");
deptCollection[41] = new Dept("20010", "사회과학대학", "20278$01", "행정관리학과");
deptCollection[42] = new Dept("20010", "사회과학대학", "20012$02", "사회과학부(야)");
deptCollection[43] = new Dept("20010", "사회과학대학", "20013$02", "사회과학부 행정학전공(야)");
deptCollection[44] = new Dept("20010", "사회과학대학", "20014$02", "사회과학부 정치외교학전공(야)");
deptCollection[45] = new Dept("20010", "사회과학대학", "20015$02", "사회과학부 사회학전공(야)");
deptCollection[46] = new Dept("20010", "사회과학대학", "20037$02", "사회과학부 매스컴전공(야)");
deptCollection[47] = new Dept("20010", "사회과학대학", "20016$02", "언론학부(야)");
deptCollection[48] = new Dept("20010", "사회과학대학", "20017$02", "언론학부 언론학전공(야)");
deptCollection[49] = new Dept("20010", "사회과학대학", "20018$02", "언론학부 광고학전공(야)");
deptCollection[50] = new Dept("20010", "사회과학대학", "20041$02", "지역학부(야)");
deptCollection[51] = new Dept("20010", "사회과학대학", "20042$02", "지역학부(야) 러시아학전공(야)");
deptCollection[52] = new Dept("20010", "사회과학대학", "20043$02", "지역학부(야) 일본학전공(야)");
deptCollection[53] = new Dept("20010", "사회과학대학", "20044$02", "지역학부(야) 중국학전공(야)");
deptCollection[54] = new Dept("20010", "사회과학대학", "20030$02", "행정학과(야)");
deptCollection[55] = new Dept("20010", "사회과학대학", "20046$02", "과학사회학과(야)");
deptCollection[56] = new Dept("20047", "법과대학", "20049$01", "법학부");
deptCollection[57] = new Dept("20047", "법과대학", "20050$01", "법학부 공법학전공");
deptCollection[58] = new Dept("20047", "법과대학", "20051$01", "법학부 사법학전공");
deptCollection[59] = new Dept("20047", "법과대학", "20052$01", "법학과");
deptCollection[60] = new Dept("20047", "법과대학", "20049$02", "법학부(야)");
deptCollection[61] = new Dept("20047", "법과대학", "20054$02", "법학부 기업법학전공(야)");
deptCollection[62] = new Dept("20047", "법과대학", "20052$02", "법학과(야)");
deptCollection[63] = new Dept("20047", "법과대학", "20401$02", "법무학과");
deptCollection[64] = new Dept("20047", "법과대학", "20056$02", "기업법학과(야)");
deptCollection[65] = new Dept("20047", "법과대학", "20435$02", "기업융합법학과");
deptCollection[66] = new Dept("20057", "경상대학", "20059$01", "경제학부");
deptCollection[67] = new Dept("20057", "경상대학", "20376$01", "경제학과");
deptCollection[68] = new Dept("20057", "경상대학", "20060$01", "경제학부 경제학전공");
deptCollection[69] = new Dept("20057", "경상대학", "20061$01", "경제학부 국제통상학전공");
deptCollection[70] = new Dept("20057", "경상대학", "20062$01", "경영학부");
deptCollection[71] = new Dept("20057", "경상대학", "20377$01", "국제통상학과");
deptCollection[72] = new Dept("20057", "경상대학", "20063$01", "경영학부 경영학전공");
deptCollection[73] = new Dept("20057", "경상대학", "20262$01", "경영학부 경영학전공");
deptCollection[74] = new Dept("20057", "경상대학", "20322$01", "경영학부 경영학전공");
deptCollection[75] = new Dept("20057", "경상대학", "20064$01", "경영학부 회계정보학전공");
deptCollection[76] = new Dept("20057", "경상대학", "20065$01", "경영학부 정보관리학전공");
deptCollection[77] = new Dept("20057", "경상대학", "20066$01", "경영학부 국제경영전공");
deptCollection[78] = new Dept("20057", "경상대학", "20067$01", "경영학부 재무·금융전공");
deptCollection[79] = new Dept("20057", "경상대학", "20068$01", "경영학부 마케팅·생산전공");
deptCollection[80] = new Dept("20057", "경상대학", "20069$01", "경영학부 조직전략·국제경영전공");
deptCollection[81] = new Dept("20057", "경상대학", "20070$01", "경영학부 회계정보전공");
deptCollection[82] = new Dept("20057", "경상대학", "20071$01", "정보관리학부");
deptCollection[83] = new Dept("20057", "경상대학", "20072$01", "정보관리학부 경영정보전공");
deptCollection[84] = new Dept("20057", "경상대학", "20073$01", "정보관리학부 정보시스템전공");
deptCollection[85] = new Dept("20057", "경상대학", "20076$01", "비즈니스IT학부");
deptCollection[86] = new Dept("20057", "경상대학", "20077$01", "비즈니스IT학부 경영정보전공");
deptCollection[87] = new Dept("20057", "경상대학", "20078$01", "비즈니스IT학부 정보시스템전공");
deptCollection[88] = new Dept("20057", "경상대학", "20308$01", "비즈니스IT학부 비즈니스IT전공");
deptCollection[89] = new Dept("20057", "경상대학", "20369$01", "비즈니스IT학부 경영정보전공");
deptCollection[90] = new Dept("20057", "경상대학", "20370$01", "비즈니스IT학부 정보시스템전공");
deptCollection[91] = new Dept("20057", "경상대학", "20308$02", "비즈니스IT학부 비즈니스IT전공(야)");
deptCollection[92] = new Dept("20057", "경상대학", "20074$01", "e-비즈니스학부");
deptCollection[93] = new Dept("20057", "경상대학", "20075$01", "e-비즈니스학부 e-비즈니스전공");
deptCollection[94] = new Dept("20057", "경상대학", "20079$01", "경제학과");
deptCollection[95] = new Dept("20057", "경상대학", "20080$01", "국제통상학과");
deptCollection[96] = new Dept("20057", "경상대학", "20081$01", "경영학과");
deptCollection[97] = new Dept("20057", "경상대학", "20082$01", "회계정보학과");
deptCollection[98] = new Dept("20057", "경상대학", "20083$01", "정보관리학과");
deptCollection[99] = new Dept("20057", "경상대학", "20059$02", "경제학부(야)");
deptCollection[100] = new Dept("20057", "경상대학", "20060$02", "경제학부 경제학전공(야)");
deptCollection[101] = new Dept("20057", "경상대학", "20061$02", "경제학부 국제통상학전공(야)");
deptCollection[102] = new Dept("20057", "경상대학", "20062$02", "경영학부(야)");
deptCollection[103] = new Dept("20057", "경상대학", "20063$02", "경영학부 경영학전공(야)");
deptCollection[104] = new Dept("20057", "경상대학", "20322$02", "경영학부 경영학전공(야)");
deptCollection[105] = new Dept("20057", "경상대학", "20064$02", "경영학부 회계정보학전공(야)");
deptCollection[106] = new Dept("20057", "경상대학", "20065$02", "경영학부 정보관리학전공(야)");
deptCollection[107] = new Dept("20057", "경상대학", "20066$02", "경영학부 국제경영전공(야)");
deptCollection[108] = new Dept("20057", "경상대학", "20067$02", "경영학부 재무·금융전공(야)");
deptCollection[109] = new Dept("20057", "경상대학", "20068$02", "경영학부 마케팅·생산전공(야)");
deptCollection[110] = new Dept("20057", "경상대학", "20069$02", "경영학부 조직전략·국제경영전공(야)");
deptCollection[111] = new Dept("20057", "경상대학", "20070$02", "경영학부 회계정보전공(야)");
deptCollection[112] = new Dept("20057", "경상대학", "20071$02", "정보관리학부(야)");
deptCollection[113] = new Dept("20057", "경상대학", "20072$02", "정보관리학부 경영정보전공(야)");
deptCollection[114] = new Dept("20057", "경상대학", "20073$02", "정보관리학부 정보시스템전공(야)");
deptCollection[115] = new Dept("20057", "경상대학", "20076$02", "비즈니스IT학부(야)");
deptCollection[116] = new Dept("20057", "경상대학", "20077$02", "비즈니스IT학부 경영정보전공(야)");
deptCollection[117] = new Dept("20057", "경상대학", "20078$02", "비즈니스IT학부 정보시스템전공(야)");
deptCollection[118] = new Dept("20057", "경상대학", "20079$02", "경제학과(야)");
deptCollection[119] = new Dept("20057", "경상대학", "20081$02", "경영학과(야)");
deptCollection[120] = new Dept("20057", "경상대학", "20082$02", "회계정보학과(야)");
deptCollection[121] = new Dept("20057", "경상대학", "20083$02", "정보관리학과(야)");
deptCollection[122] = new Dept("20057", "경상대학", "20106$01", "무역학과");
deptCollection[123] = new Dept("20057", "경상대학", "20107$01", "회계학과");
deptCollection[124] = new Dept("20057", "경상대학", "20106$02", "무역학과(야)");
deptCollection[125] = new Dept("20057", "경상대학", "20107$02", "회계학과(야)");
deptCollection[126] = new Dept("20110", "공과대학", "20112$01", "금속재료공학부");
deptCollection[127] = new Dept("20110", "공과대학", "20113$01", "금속재료공학부 금속공학전공");
deptCollection[128] = new Dept("20110", "공과대학", "20114$01", "금속재료공학부 재료공학전공");
deptCollection[129] = new Dept("20110", "공과대학", "20128$01", "신소재공학부");
deptCollection[130] = new Dept("20110", "공과대학", "20131$01", "신소재공학부 프로세스디자인공학전공");
deptCollection[131] = new Dept("20110", "공과대학", "20130$01", "신소재공학부 재료공학전공");
deptCollection[132] = new Dept("20110", "공과대학", "20129$01", "신소재공학부 금속공학전공");
deptCollection[133] = new Dept("20110", "공과대학", "20230$01", "신소재공학부 신소재공학전공");
deptCollection[134] = new Dept("20110", "공과대학", "20115$01", "기계·자동차공학부");
deptCollection[135] = new Dept("20110", "공과대학", "20337$01", "기계·자동차공학부 기계자동차공학전공");
deptCollection[136] = new Dept("20110", "공과대학", "20116$01", "기계·자동차공학부 기계공학전공");
deptCollection[137] = new Dept("20110", "공과대학", "20117$01", "기계·자동차공학부 기계설계학전공");
deptCollection[138] = new Dept("20110", "공과대학", "20118$01", "기계·자동차공학부 자동차공학전공");
deptCollection[139] = new Dept("20110", "공과대학", "20378$01", "기계시스템공학부");
deptCollection[140] = new Dept("20110", "공과대학", "20379$01", "기계시스템공학부 기계시스템공학전공");
deptCollection[141] = new Dept("20110", "공과대학", "20437$01", "기계시스템공학부 융합기계공학전공");
deptCollection[142] = new Dept("20110", "공과대학", "20380$01", "자동차공학과");
deptCollection[143] = new Dept("20110", "공과대학", "20119$01", "토목환경공학부");
deptCollection[144] = new Dept("20110", "공과대학", "20120$01", "토목환경공학부 토목공학전공");
deptCollection[145] = new Dept("20110", "공과대학", "20121$01", "토목환경공학부 환경공학전공");
deptCollection[146] = new Dept("20110", "공과대학", "20122$01", "전자공학부");
deptCollection[147] = new Dept("20110", "공과대학", "20123$01", "전자공학부 전자공학전공");
deptCollection[148] = new Dept("20110", "공과대학", "20124$01", "전자공학부 정보통신공학전공");
deptCollection[149] = new Dept("20110", "공과대학", "20125$01", "건설시스템공학부");
deptCollection[150] = new Dept("20110", "공과대학", "20126$01", "건설시스템공학부 구조및지반전공");
deptCollection[151] = new Dept("20110", "공과대학", "20127$01", "건설시스템공학부 수자원및환경전공");
deptCollection[152] = new Dept("20110", "공과대학", "20270$01", "건설시스템공학부 건설시스템공학전공");
deptCollection[153] = new Dept("20110", "공과대학", "20132$01", "전자정보통신공학부");
deptCollection[154] = new Dept("20110", "공과대학", "20133$01", "전자정보통신공학부 전자정보공학전공");
deptCollection[155] = new Dept("20110", "공과대학", "20134$01", "전자정보통신공학부 정보통신공학전공");
deptCollection[156] = new Dept("20110", "공과대학", "20135$01", "전자정보통신공학부 전파통신공학전공");
deptCollection[157] = new Dept("20110", "공과대학", "20136$01", "기계공학부");
deptCollection[158] = new Dept("20110", "공과대학", "20137$01", "기계공학부 기계공학전공");
deptCollection[159] = new Dept("20110", "공과대학", "20138$01", "기계공학부 기계설계학전공");
deptCollection[160] = new Dept("20110", "공과대학", "20139$01", "금속재료공학과");
deptCollection[161] = new Dept("20110", "공과대학", "20140$01", "기계기설학과군");
deptCollection[162] = new Dept("20110", "공과대학", "20141$01", "자동차공학과");
deptCollection[163] = new Dept("20110", "공과대학", "20142$01", "토목환경공학과");
deptCollection[164] = new Dept("20110", "공과대학", "20143$01", "전자공학과");
deptCollection[165] = new Dept("20110", "공과대학", "20112$02", "금속재료공학부(야)");
deptCollection[166] = new Dept("20110", "공과대학", "20113$02", "금속재료공학부 금속공학전공(야)");
deptCollection[167] = new Dept("20110", "공과대학", "20114$02", "금속재료공학부 재료공학전공(야)");
deptCollection[168] = new Dept("20110", "공과대학", "20119$02", "토목환경공학부(야)");
deptCollection[169] = new Dept("20110", "공과대학", "20120$02", "토목환경공학부 토목공학전공(야)");
deptCollection[170] = new Dept("20110", "공과대학", "20121$02", "토목환경공학부 환경공학전공(야)");
deptCollection[171] = new Dept("20110", "공과대학", "20128$02", "신소재공학부(야)");
deptCollection[172] = new Dept("20110", "공과대학", "20129$02", "신소재공학부 금속공학전공(야)");
deptCollection[173] = new Dept("20110", "공과대학", "20130$02", "신소재공학부 재료공학전공(야)");
deptCollection[174] = new Dept("20110", "공과대학", "20131$02", "신소재공학부 프로세스디자인공학전공(야)");
deptCollection[175] = new Dept("20110", "공과대학", "20230$02", "신소재공학부 신소재공학전공(야)");
deptCollection[176] = new Dept("20110", "공과대학", "20139$02", "금속재료공학과(야)");
deptCollection[177] = new Dept("20110", "공과대학", "20142$02", "토목환경공학과(야)");
deptCollection[178] = new Dept("20110", "공과대학", "20153$01", "금속공학과");
deptCollection[179] = new Dept("20110", "공과대학", "20154$01", "토목공학과");
deptCollection[180] = new Dept("20110", "공과대학", "20306$02", "기계공학과(야)");
deptCollection[181] = new Dept("20110", "공과대학", "20307$02", "기계설계학과(야)");
deptCollection[182] = new Dept("20110", "공과대학", "20143$02", "전자공학과(야)");
deptCollection[183] = new Dept("20110", "공과대학", "20336$01", "공학교육혁신센터");
deptCollection[184] = new Dept("20158", "조형대학", "20160$01", "건축학과");
deptCollection[185] = new Dept("20158", "조형대학", "20161$01", "공업디자인학과");
deptCollection[186] = new Dept("20158", "조형대학", "20162$01", "시각디자인학과");
deptCollection[187] = new Dept("20158", "조형대학", "20163$01", "공예미술학과");
deptCollection[188] = new Dept("20158", "조형대학", "20166$01", "금속공예학과");
deptCollection[189] = new Dept("20158", "조형대학", "20167$01", "도자공예학과");
deptCollection[190] = new Dept("20158", "조형대학", "20164$01", "의상디자인학과");
deptCollection[191] = new Dept("20158", "조형대학", "20165$01", "실내디자인학과");
deptCollection[192] = new Dept("20158", "조형대학", "20371$01", "영상디자인학과");
deptCollection[193] = new Dept("20158", "조형대학", "20165$02", "실내디자인학과(야)");
deptCollection[194] = new Dept("20158", "조형대학", "20419$01", "자동차·운송디자인학과");
deptCollection[195] = new Dept("20158", "조형대학", "20453$01", "공간디자인학과");
deptCollection[196] = new Dept("20158", "조형대학", "20170$01", "국제디자인교육센터");
deptCollection[197] = new Dept("20171", "사범대학", "20173$01", "교육학과(사범)");
deptCollection[198] = new Dept("20171", "사범대학", "20174$01", "수학교육과");
deptCollection[199] = new Dept("20171", "사범대학", "20175$01", "물리교육과");
deptCollection[200] = new Dept("20171", "사범대학", "20176$01", "화학교육과");
deptCollection[201] = new Dept("20171", "사범대학", "20177$01", "가정교육과");
deptCollection[202] = new Dept("20171", "사범대학", "20178$01", "체육교육과");
deptCollection[203] = new Dept("20171", "사범대학", "20179$01", "체육학과");
deptCollection[204] = new Dept("20180", "삼림과학대학", "20265$01", "삼림과학대학");
deptCollection[205] = new Dept("20180", "삼림과학대학", "20265$02", "삼림과학대학(야)");
deptCollection[206] = new Dept("20180", "삼림과학대학", "20182$01", "산림자원학과");
deptCollection[207] = new Dept("20180", "삼림과학대학", "20381$01", "산림환경시스템학과");
deptCollection[208] = new Dept("20180", "삼림과학대학", "20183$01", "임산공학과");
deptCollection[209] = new Dept("20180", "삼림과학대학", "20382$01", "임산생명공학과");
deptCollection[210] = new Dept("20180", "삼림과학대학", "20182$02", "산림자원학과(야)");
deptCollection[211] = new Dept("20180", "삼림과학대학", "20183$02", "임산공학과(야)");
deptCollection[212] = new Dept("20180", "삼림과학대학", "20186$01", "임산가공학과");
deptCollection[213] = new Dept("20187", "자연과학대학", "20189$01", "기초과학부");
deptCollection[214] = new Dept("20187", "자연과학대학", "20190$01", "기초과학부 물리학전공");
deptCollection[215] = new Dept("20187", "자연과학대학", "20191$01", "기초과학부 화학전공");
deptCollection[216] = new Dept("20187", "자연과학대학", "20192$01", "기초과학부 수학전공");
deptCollection[217] = new Dept("20187", "자연과학대학", "20200$01", "테크노과학부");
deptCollection[218] = new Dept("20187", "자연과학대학", "20201$01", "테크노과학부 나노전자물리전공");
deptCollection[219] = new Dept("20187", "자연과학대학", "20202$01", "테크노과학부 생명나노화학전공");
deptCollection[220] = new Dept("20187", "자연과학대학", "20203$01", "테크노과학부 식품생명과학전공");
deptCollection[221] = new Dept("20187", "자연과학대학", "20198$01", "나노전자물리학과");
deptCollection[222] = new Dept("20187", "자연과학대학", "20199$01", "식품영양학과");
deptCollection[223] = new Dept("20187", "자연과학대학", "20193$01", "컴퓨터학부");
deptCollection[224] = new Dept("20187", "자연과학대학", "20213$01", "생명나노화학과");
deptCollection[225] = new Dept("20187", "자연과학대학", "20194$01", "컴퓨터학부 컴퓨터시스템전공");
deptCollection[226] = new Dept("20187", "자연과학대학", "20196$01", "컴퓨터학부 컴퓨터과학전공");
deptCollection[227] = new Dept("20187", "자연과학대학", "20195$01", "컴퓨터학부 컴퓨터응용전공");
deptCollection[228] = new Dept("20187", "자연과학대학", "20197$01", "컴퓨터학부 정보통신전공");
deptCollection[229] = new Dept("20187", "자연과학대학", "20204$01", "수학과");
deptCollection[230] = new Dept("20187", "자연과학대학", "20269$01", "식품영양학과");
deptCollection[231] = new Dept("20187", "자연과학대학", "20420$01", "바이오발효융합학과");
deptCollection[232] = new Dept("20187", "자연과학대학", "20205$01", "자연과학부");
deptCollection[233] = new Dept("20187", "자연과학대학", "20206$01", "자연과학부 전자물리학전공");
deptCollection[234] = new Dept("20187", "자연과학대학", "20207$01", "자연과학부 화학전공");
deptCollection[235] = new Dept("20187", "자연과학대학", "20208$01", "자연과학부 전산과학전공");
deptCollection[236] = new Dept("20187", "자연과학대학", "20209$01", "자연과학부 수학전공");
deptCollection[237] = new Dept("20187", "자연과학대학", "20264$01", "자연과학부 물리학전공");
deptCollection[238] = new Dept("20187", "자연과학대학", "20210$01", "물리학과");
deptCollection[239] = new Dept("20187", "자연과학대학", "20211$01", "화학과");
deptCollection[240] = new Dept("20187", "자연과학대학", "20212$01", "전산과학과");
deptCollection[241] = new Dept("20187", "자연과학대학", "20189$02", "기초과학부(야)");
deptCollection[242] = new Dept("20187", "자연과학대학", "20190$02", "기초과학부 물리학전공(야)");
deptCollection[243] = new Dept("20187", "자연과학대학", "20191$02", "기초과학부 화학전공(야)");
deptCollection[244] = new Dept("20187", "자연과학대학", "20192$02", "기초과학부 수학전공(야)");
deptCollection[245] = new Dept("20187", "자연과학대학", "20204$02", "수학과(야)");
deptCollection[246] = new Dept("20187", "자연과학대학", "20205$02", "자연과학부(야)");
deptCollection[247] = new Dept("20187", "자연과학대학", "20206$02", "자연과학부 전자물리학전공(야)");
deptCollection[248] = new Dept("20187", "자연과학대학", "20207$02", "자연과학부 화학전공(야)");
deptCollection[249] = new Dept("20187", "자연과학대학", "20209$02", "자연과학부 수학전공(야)");
deptCollection[250] = new Dept("20187", "자연과학대학", "20372$01", "발효융합학과");
deptCollection[251] = new Dept("20223", "예술대학", "20225$01", "음악학부");
deptCollection[252] = new Dept("20223", "예술대학", "20226$01", "음악학부 성악전공");
deptCollection[253] = new Dept("20223", "예술대학", "20227$01", "음악학부 피아노전공");
deptCollection[254] = new Dept("20223", "예술대학", "20228$01", "음악학부 관현악전공");
deptCollection[255] = new Dept("20223", "예술대학", "20229$01", "음악학부 작곡전공");
deptCollection[256] = new Dept("20223", "예술대학", "20231$01", "미술학부");
deptCollection[257] = new Dept("20223", "예술대학", "20232$01", "미술학부 회화전공");
deptCollection[258] = new Dept("20223", "예술대학", "20233$01", "미술학부 입체미술전공");
deptCollection[259] = new Dept("20223", "예술대학", "20234$01", "공연예술학부");
deptCollection[260] = new Dept("20223", "예술대학", "20235$01", "공연예술학부 연극영화전공");
deptCollection[261] = new Dept("20223", "예술대학", "20236$01", "공연예술학부 무용전공");
deptCollection[262] = new Dept("20223", "예술대학", "20421$01", "공연예술학부 연극전공");
deptCollection[263] = new Dept("20223", "예술대학", "20422$01", "공연예술학부 영화전공");
deptCollection[264] = new Dept("20223", "예술대학", "20225$02", "음악학부(야)");
deptCollection[265] = new Dept("20223", "예술대학", "20226$02", "음악학부 성악전공(야)");
deptCollection[266] = new Dept("20223", "예술대학", "20227$02", "음악학부 피아노전공(야)");
deptCollection[267] = new Dept("20223", "예술대학", "20228$02", "음악학부 관현악전공(야)");
deptCollection[268] = new Dept("20223", "예술대학", "20229$02", "음악학부 작곡전공(야)");
deptCollection[269] = new Dept("20223", "예술대학", "20231$02", "미술학부(야)");
deptCollection[270] = new Dept("20223", "예술대학", "20232$02", "미술학부 회화전공(야)");
deptCollection[271] = new Dept("20223", "예술대학", "20233$02", "미술학부 입체미술전공(야)");
deptCollection[272] = new Dept("20223", "예술대학", "20245$02", "연극영화과(야)");
deptCollection[273] = new Dept("20223", "예술대학", "20246$01", "예술대학 콘서트홀");
deptCollection[274] = new Dept("20223", "예술대학", "20247$01", "예술대학 공연장");
deptCollection[275] = new Dept("20248", "체육대학", "20250$01", "체육학부");
deptCollection[276] = new Dept("20248", "체육대학", "20251$01", "체육학부 체육학전공");
deptCollection[277] = new Dept("20248", "체육대학", "20252$01", "체육학부 스포츠산업학전공");
deptCollection[278] = new Dept("20248", "체육대학", "20253$01", "체육학부 생활체육전공");
deptCollection[279] = new Dept("20248", "체육대학", "20310$01", "체육학부 스포츠경영학전공");
deptCollection[280] = new Dept("20248", "체육대학", "20309$01", "체육학부 경기지도학전공");
deptCollection[281] = new Dept("20248", "체육대학", "20423$01", "체육학부 스포츠지도전공");
deptCollection[282] = new Dept("20248", "체육대학", "20424$01", "체육학부 스포츠산업·레저전공");
deptCollection[283] = new Dept("20248", "체육대학", "20425$01", "체육학부 스포츠건강재활전공");
deptCollection[284] = new Dept("20248", "체육대학", "20436$01", "체육학부 스포츠교육전공");
deptCollection[285] = new Dept("20254", "건축대학", "20257$01", "건축학부 건축설계전공");
deptCollection[286] = new Dept("20254", "건축대학", "20268$01", "건축학부(5년제) 건축설계전공(5년제)");
deptCollection[287] = new Dept("20254", "건축대학", "20389$01", "건축학부(5년제) 건축학전공");
deptCollection[288] = new Dept("20406", "건축학부", "20408$01", "건축학부 건축학전공");
deptCollection[289] = new Dept("20340", "경영대학", "20344$01", "경영학부 경영학전공");
deptCollection[290] = new Dept("20340", "경영대학", "20345$01", "경영학부 마케팅·생산전공");
deptCollection[291] = new Dept("20340", "경영대학", "20346$01", "경영학부 재무·금융전공");
deptCollection[292] = new Dept("20340", "경영대학", "20347$01", "경영학부 조직전략·국제경영전공");
deptCollection[293] = new Dept("20340", "경영대학", "20348$01", "경영학부 회계정보전공");
deptCollection[294] = new Dept("20340", "경영대학", "20354$01", "경영학부 e-비즈니스전공");
deptCollection[295] = new Dept("20340", "경영대학", "20383$01", "경영학부 경영분석·통계전공");
deptCollection[296] = new Dept("20340", "경영대학", "20426$01", "경영학부 빅데이터경영통계전공");
deptCollection[297] = new Dept("20260", "교양과정부", "20338$02", "국어교양교과");
deptCollection[298] = new Dept("20260", "교양과정부", "20332$02", "영어교양교과");
deptCollection[299] = new Dept("20260", "교양과정부", "20333$02", "수학교양교과");
deptCollection[300] = new Dept("20260", "교양과정부", "20334$02", "물리교양교과");
deptCollection[301] = new Dept("20260", "교양과정부", "20335$02", "화학교양교과");
deptCollection[302] = new Dept("20340", "경영대학", "20344$02", "경영학부 경영학전공(야)");
deptCollection[303] = new Dept("20340", "경영대학", "20345$02", "경영학부 마케팅·생산전공(야)");
deptCollection[304] = new Dept("20340", "경영대학", "20346$02", "경영학부 재무·금융전공(야)");
deptCollection[305] = new Dept("20340", "경영대학", "20347$02", "경영학부 조직전략·국제경영전공(야)");
deptCollection[306] = new Dept("20340", "경영대학", "20348$02", "경영학부 회계정보전공(야)");
deptCollection[307] = new Dept("20340", "경영대학", "20341$01", "경영학부");
deptCollection[308] = new Dept("20340", "경영대학", "20341$02", "경영학부(야)");
deptCollection[309] = new Dept("20340", "경영대학", "20386$02", "기업경영학부");
deptCollection[310] = new Dept("20340", "경영대학", "20387$02", "기업경영학부 기업경영전공");
deptCollection[311] = new Dept("20340", "경영대학", "20384$01", "경영정보학부");
deptCollection[312] = new Dept("20340", "경영대학", "20390$01", "경영정보학부 경영정보전공");
deptCollection[313] = new Dept("20340", "경영대학", "20388$01", "경영정보학부 정보시스템전공");
deptCollection[314] = new Dept("20340", "경영대학", "20385$01", "경영정보학부 전자상거래전공");
deptCollection[315] = new Dept("20340", "경영대학", "20283$01", "경영정보학부 비즈니스IT전공");
deptCollection[316] = new Dept("20340", "경영대학", "20413$01", "KMU International School");
deptCollection[317] = new Dept("20340", "경영대학", "20454$01", "KMU International Business School International Business");
deptCollection[318] = new Dept("20340", "경영대학", "20414$01", "KMU International School International Business");
deptCollection[319] = new Dept("20340", "경영대학", "20427$01", "파이낸스보험경영학과");
deptCollection[320] = new Dept("20340", "경영대학", "20452$01", "KMU International Business School");
deptCollection[321] = new Dept("20340", "경영대학", "20449$01", "파이낸스·회계학부");
deptCollection[322] = new Dept("20340", "경영대학", "20450$01", "파이낸스·회계학부 파이낸스보험경영학전공");
deptCollection[323] = new Dept("20340", "경영대학", "20451$01", "파이낸스·회계학부 회계학전공");
deptCollection[324] = new Dept("20360", "전자정보통신대학", "20363$01", "전자정보통신공학부");
deptCollection[325] = new Dept("20360", "전자정보통신대학", "20366$01", "전자정보통신공학부 전자정보공학전공");
deptCollection[326] = new Dept("20360", "전자정보통신대학", "20367$01", "전자정보통신공학부 정보통신공학전공");
deptCollection[327] = new Dept("20360", "전자정보통신대학", "20368$01", "전자정보통신공학부 전파통신공학전공");
deptCollection[328] = new Dept("20360", "전자정보통신대학", "20362$01", "컴퓨터학부");
deptCollection[329] = new Dept("20360", "전자정보통신대학", "20365$01", "컴퓨터학부 컴퓨터과학전공");
deptCollection[330] = new Dept("20360", "전자정보통신대학", "20364$01", "컴퓨터학부 컴퓨터응용전공");
deptCollection[331] = new Dept("20360", "전자정보통신대학", "20275$01", "전자공학부");
deptCollection[332] = new Dept("20360", "전자정보통신대학", "20276$01", "전자공학부 전자공학전공");
deptCollection[333] = new Dept("20360", "전자정보통신대학", "20280$01", "컴퓨터공학부");
deptCollection[334] = new Dept("20360", "전자정보통신대학", "20281$01", "컴퓨터공학부 컴퓨터공학전공");
deptCollection[335] = new Dept("20260", "교양과정부", "20261$01", "교양과정부");
deptCollection[336] = new Dept("20406", "건축학부", "20407$01", "건축학부");
deptCollection[337] = new Dept("20254", "건축대학", "20256$01", "건축학부");
deptCollection[338] = new Dept("20391", "건축대학", "20393$01", "건축학부");
deptCollection[339] = new Dept("20391", "건축대학", "20394$01", "건축학부 건축설계전공");
deptCollection[340] = new Dept("20391", "건축대학", "20395$01", "건축학부 건축시스템전공");
deptCollection[341] = new Dept("20254", "건축대학", "20263$01", "건축학부(5년제)");
deptCollection[342] = new Dept("20402", "KMU International School", "20403$01", "KMU International School");
deptCollection[343] = new Dept("20402", "KMU International School", "20404$01", "KMU International School International Business");
deptCollection[344] = new Dept("20402", "KMU International School", "20405$01", "KMU International School Information Technology");
deptCollection[345] = new Dept("20402", "KMU International School", "20411$01", "KMU International School 한국학전공");
deptCollection[346] = new Dept("20396", "자동차융합대학", "20399$01", "자동차공학과");
deptCollection[347] = new Dept("20396", "자동차융합대학", "20398$01", "자동차IT융합학과");
deptCollection[348] = new Dept("20428", "교양대학", "20429$01", "교양대학 교학팀");
deptCollection[349] = new Dept("20428", "교양대학", "20430$02", "영어교양교과");
deptCollection[350] = new Dept("20428", "교양대학", "20431$02", "수학교양교과");
deptCollection[351] = new Dept("20428", "교양대학", "20432$02", "물리교양교과");
deptCollection[352] = new Dept("20428", "교양대학", "20433$02", "화학교양교과");
deptCollection[353] = new Dept("20428", "교양대학", "20434$02", "국어교양교과");
deptCollection[354] = new Dept("20428", "교양대학", "20442$02", "영어회화교과");
deptCollection[355] = new Dept("20428", "교양대학", "20443$02", "인문영역교과");
deptCollection[356] = new Dept("20428", "교양대학", "20444$02", "소통영역교과");
deptCollection[357] = new Dept("20428", "교양대학", "20445$02", "글로벌영역교과");
deptCollection[358] = new Dept("20428", "교양대학", "20446$02", "창의영역교과");
deptCollection[359] = new Dept("20428", "교양대학", "20447$02", "자유교양교과");
deptCollection[360] = new Dept("20320", "연계전공", "20311$01", "중국통상");
deptCollection[361] = new Dept("20320", "연계전공", "20312$01", "일본경영");
deptCollection[362] = new Dept("20320", "연계전공", "20267$01", "산업재산권전공");
deptCollection[363] = new Dept("20320", "연계전공", "20266$01", "바이오산업개발");
deptCollection[364] = new Dept("20320", "연계전공", "20316$01", "디스플레이디자인");
deptCollection[365] = new Dept("20320", "연계전공", "20314$01", "공예제품디자인");
deptCollection[366] = new Dept("20320", "연계전공", "20313$01", "실내제품디자인");
deptCollection[367] = new Dept("20320", "연계전공", "20317$01", "패션제품및장신구");
deptCollection[368] = new Dept("20320", "연계전공", "20315$01", "도덕·윤리");
deptCollection[369] = new Dept("20320", "연계전공", "20328$01", "나노기술전공");
deptCollection[370] = new Dept("20320", "연계전공", "20329$01", "바이오기술전공");
deptCollection[371] = new Dept("20320", "연계전공", "20330$01", "유비쿼터스디자인매니지먼트전공");
deptCollection[372] = new Dept("20320", "연계전공", "20331$01", "UIT디자인·엔지니어링전공");
deptCollection[373] = new Dept("20320", "연계전공", "20356$01", "UIT공학전공");
deptCollection[374] = new Dept("20320", "연계전공", "20357$01", "나노바이오메카트로닉스");
deptCollection[375] = new Dept("20320", "연계전공", "20358$01", "Display공학");
deptCollection[376] = new Dept("20320", "연계전공", "20359$01", "에너지·환경");
deptCollection[377] = new Dept("20320", "연계전공", "20412$01", "해외건설");
deptCollection[378] = new Dept("20320", "연계전공", "20438$01", "자동차소프트웨어디자인전공");
deptCollection[379] = new Dept("20320", "연계전공", "20439$01", "CHC융합전공");
deptCollection[380] = new Dept("20320", "연계전공", "20440$01", "문화예술콘텐츠전공");
deptCollection[381] = new Dept("20320", "연계전공", "20441$01", "Entrepreneurship전공");
deptCollection[382] = new Dept("20110", "공과대학", "20306$01", "기계공학과");
deptCollection[383] = new Dept("20110", "공과대학", "20307$01", "기계설계학과");
deptCollection[384] = new Dept("20258", "학점교환생", "20259$01", "학점교환생");


*/

?>
</html>
