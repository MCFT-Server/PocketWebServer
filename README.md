# PocketWebServer
You can run your web server on Pocketmine

---

## 목적 / Goals
포켓마인에서 플러그인으로 웹 서버를 열기위한 플러그인입니다.  
A plugin for opening web servers with plugins from Pocketmine.  
  
## TODO
- 기본 웹페이지 작성
- 라라벨 적용
- 플러그인들과 상호작용 할 수 있는 API 작성
- 유저가 커스텀 가능한 웹페이지

## 생각할것
php web 이 아니라 php-cli 에서 실행되기 때문에  
서버쪽 소스 실행 (echo 라던가..) 에 문제가 생김.
외부 플러그인이 서버 쪽 소스를 마음대로 접근 가능하게  
웹페이지에서 request 시  이벤트 발생 필요