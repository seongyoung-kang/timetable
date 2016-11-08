
외주 제목 : 자동 추천 시간표 만들기

외주 내용 : 자동으로 시간표를 추천받고 싶습니다.

요청 사항 : 프로젝트의 내용이 exe파일 보다는 웹에 적합하여 웹으로 하자고 했으나 exe파일을 더 선호한다고 해서 그냥 exe파일로 만들었습니다.
(교과목 업데이트가 되면 그에 따라 자동으로 db실시간 업데이트가 쉬운점, 확장성이 좋은 점, UI구성이 더 쉬운점이 그 이유였습니다.)

외주요청 세부사항 : 요청 사항이 매우 심플했습니다. 1. exe파일이어야 한다.
 2. txt로 과목을 받는다. 따라서 역할을 나누고 작업을 시작했습니다.

담당 분야별로 메뉴얼을 만들겠습니다.
A. web part    B. algorithm part    C. search part  D. GUI part

A. web part 담당 : 김명수
요청사항에 있지는 않았지만 버전관리가 필요해서 만들었습니다.
예를들어 2015년도의 교과목과 2016년도의 교과목은 다를 가능성이 있습니다.
하지만 exe파일이 단독으로 돌아다닌다면 버전관리가 힘들지요.
따라서 이를 관리해주는 website를 만들었습니다. 
개발 기간을 고려하여 프로토타입을 만든다는 느낌으로 개발을 하였습니다.
외국의 서버를 사용하였고 호스팅했습니다. XE를 써서 개발시간을 단축시켰습니다.
소셜 로그인 기능을 지원하여 간편 로그인이 가능하고 에브리 타임을 참고했습니다.
국민장터 : 서로 중고물품을 등록하고 거래할 수 있습니다.
문제창고 : 학우들끼리 문제를 서로 내고 풀 수 있는 페이지입니다.
국민대토론장 : 토론을 하면서 찬,반 현황을 알 수 있는 페이지입니다.
자유/익명게시판 : 말 그대로 자유게시판 입니다.
시간표는 메인 페이지에서 버전관리를 할 예정입니다.
prototype site -> unitime.xyz
(프로토 타입이라 xe를 사용했고 추후에는 django와 bootstrap을 사용할 예정입니다.)
(이번 겨울방학에 네이버 대학생/대학원생 지원 프로그램을 응모해서 추가개발 할 예정입니다.)

그리고 파싱을 해야했습니다. 
교과목이 수많은 페이지에 걸쳐서 있는 데다가 고정 URL이라서 고민을 했습니다.
결국 post형식으로 보내는 인자값을 따온 뒤에 자바스크립트로 UI를 짜서 
원하는 과목의 정보를 보여준 뒤에 txt파일에 자동 저장해주는 방식을
사용하기로 했습니다.
우선 파싱 대상을 지정할 UI를 개발했습니다.
이곳에서는 파싱할 데이터를 선택하고 서버로 전송합니다.
snoopy를 써서(php 외부 소켓 클래스 입니다.) 파싱을 했습니다.
국민대학교 가상대학에서 정보를 가져오고 자동으로 서버에 txt파일을 생성하여
원하는 만큼 데이터를 배열 형태로 저장할 수 있습니다.
파싱 UI는 kmuni.epizy.com/parsing 에서 볼 수 있습니다.
파싱 서버 주소는 kmuni.epizy.com/index.php 입니다.
txt는 자신이 입력한 곳에 저장됩니다.
예를 들어 kiki.txt 라고 입력을 했다면 kmuni.epizy.com/kiki.txt 입니다.

서버는 apache 2.4.178을 쓰고있고 os는 centos(3.2.40 kernel) 입니다.
db는 mysql 5.1.73 이고 php는 5.6.23 버전 입니다.
git에 모든 파일을 다 올리지는 않았습니다.
host팀이나 교수님에게 ftp 정보를 제공할 생각입니다.

B. algorithm part 담당 강성영

본인이 원하는 맞춤형 시간표 알고리즘을 제작했습니다.
DFS 알고리즘을 바탕으로 200과목 기준으로 최대 약 4과목정도를 탐색할수 있게 구현했습니다.

사용자에게 여태 수강했던과목을 받아서, 탐색에서 제외 시키고
본인이 원하는 공강시간과 원하는 과목 비율에 따라서 점수를 매겨서 시간표를 추천합니다

공강 점수는 공강점수가 15분일때마다 1점씩 깎아서 최대 100점 까지 받을수 있습니다
이 점수에 사용자에게 입력받은 공강시간비율을 곱한것이 공강시간 점수입니다.

과목 점수는 사용자에게 (과목 선호도 * 학점 * 과목비율 ) 이값을 과목 점수로 환산합니다

두개의 환산점수를 합한것이 과목 SET의 총점수이며, 포인터 배열을 사용해 30개 SET의
과목 정보를 출력해줍니다.

본인이 이미 정해놓은 과목들이 있을경우를 대비해서 , 본인이 정해놓은 과목을 입력하면
그것을 포함시키고 탐색을 진행할수 있게 해서 실용도를 높였습니다.

프로그램이 복잡한 관계로 코드일부에 주석을 처리하였으나, 언어로 풀어 쓰기 조금 복잡하고
난해한 부분이 있었고, 일반 DFS 알고리즘보다 난이도도 있었습니다.

처음은 파싱한 부분을 정규식 처리로 제가 원하는 형태의 구조체로 받는 역할을했으며
이미 짜놓은 탐색알고리즘과 마지막에 병합했습니다. (time table all)

testtime 함수를 만들어 현재 가지고 있는 혹은 탐색중이였던 과목과 겹치는 요소가 없는지
디테일 하게 확인도 해서 정확한 시간표 추천이 가능합니다.

사용설명 동영상과 사용 파일은 unitime.xyz 에 상세히 올렸습니다 확인하실수 있습니다.

C. search part 담당 :김승환
지금 가지고 있는 언어지식으로는 프로그래밍을 하기에는 부족하기에 별로 중요하지 않은것 같지만
저희가 하는 프로젝트에 꼭 필요한 자료를 찾았습니다. 요청사항에는 exe를 만들어 달라고 하였지만,
저희가 따로 웹쪽으로 발전시킬 의향이 있어서 웹사이트에 회원가입약관을 한국정보보호진흥원 에서 인용해
저희 사이트에 맞게 수정해서 올렸고 웹사이트 테마에 어울리는 사진을 사용해도 되는지 요청하여 허락을 받고
사희트에 올리게 되었고 이외 추가했으면 하는것들을 찾아보았습니다. 

C. search part 담당 : 강상준
UI에서 필요한 아이콘이이나 배너 등의 이미지를 검색 및 수집하였고, 추가로 필요한 아이콘, 배경사진, 폰트등을 수집했습니다. 또한  전체적인 코드리뷰와 버그를 찾아내는 작업을 했습니다. 
팀원들이 어려워하거나 모르는 지식들을 수집해 제공하고, 이외에 도움이 되는 여러가지 자료들을 탐색해 도움을 주려고 노력하였습니다.
 
D. GUI part 담당: 조민기
자바 swing을 다뤄 본 경험이 있어서 전체적인 GUI를 꾸미고 실행파일을 만드는 작업을 담당했습니다.
호스팅 팀에서 요구한 사항은 c++로 작성해서 위젯으로 exe 파일을 만들어 달라는 내용이었습니다.
처음에는 MFC를 사용하려 했지만 QT라는 GUI를 만드는 크로스플랫폼을 발견했습니다.
윈도우와 리눅스에서 둘 다 돌아갈 수 있어서 사용취지에 더 맞는 거 같아 채택하였습니다.
QT는 MFC처럼 ui를 미리 디자인(QML)할 수 있어 mainwindow.ui를 만들어 기본 토대를 만들었습니다.
또한 QT에는 시그널엔 슬롯이라는 편리한 기능이 있었지만 메인 윈도우 객체가 생성되기 이전에
이벤트를 줄 수 있는 방법이 없어서 현재 틀만 만들어진 상황입니다.
메인 프레임에 새로운 버튼을 생성하여 과목을 표시하게 되는데 기존에 알고있던 자바 swing이랑 다르게
각 객체 그래픽 안에 다른 객체를 포함할 수 있는 함수가 layout이라는 클래스 밖에 없어서 삽질을
많이 했습니다. 처음에 프레임을 요일별로 7칸 수직 레이아웃으로 나누고 또 다시 수직 레이아웃을
여러칸으로 나타내려 했지만 시작 시간과 끝마치는 시간이 다른 상황에서 너무 비효율적이었습니다.
또한 객체를 나타내는 함수인 show() 쓰면 다른 창이 생성이 됩니다. 테스트하실 분들은 위같이 하지
마시고 객체를 처음 생성할 때 부터 부모 위젯을 지정해주면 new Button(parent) 해결 됩니다....
swing에선 parent.add(Button)......
결과물인 exe파일은 단독으로 실행하면 안됩니다. QT는 LGPL이기 때문에 동적라이브러리를 사용해야 합니다.
즉, 다른 .dll파일들이 있어야 합니다. 정적라이브러리 사용시 QT라이브러리의 소스코드가 포함되기 때문에
소스공개의 의무가 있습니다. exe 실행시 뜨는 경고문대로 몇몇 파일을 QT가 설치된 경로에 사용할
컴파일러 크로스 플랫폼이므로 mingw 컴파일러 bin 폴더에서 찾으면 되지만 프로시저 파일을 찾지
못한다고 하는 경우에 libstdc++.dll 파일을 포함해야 합니다.
현재 알고리즘을 구현하는 파트와 합치는 작업을 하는 중입니다. qt creator에서는 헤더와 cpp파일을
따로 분리해주어야 인식이 됩니다.
