<?php  ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>BookShelfOnline 会員登録フォーム</title>
    <link rel="stylesheet" href="book_shelf_registration_form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  </head>
  <!-- フォームの入力チェック -->
  <script type="text/javascript">
    function formUserCheck() {
      var check = new Array();

      check[0] = formUserNameCheck();
      check[1] = formUserPassCheck();

      for (var i = 0; i < check.length; i++) {
        if(check[i] == false) {
          window . alert( '入力内容に不備があります。' ); // アラートを表示
          return false;
        }
      }
      return true;
    }
    // ユーザ名の文字数チェック
    function formUserNameCheck(){
      var flag = 0;

      // 入力文字数をチェック
      var input_text_1_length = document . regist_form . input_userid . value . length; // 入力文字数を、変数に格納
      if ( input_text_1_length < 6 ){ // 入力文字数が不足している場合
          flag = 1;
          document . getElementById( 'notice-input-text-1' ) . innerHTML = 6 - input_text_1_length + "文字不足しています。";
          document . getElementById( 'notice-input-text-1' ) . style . display = "block";
      }
      if ( input_text_1_length  > 12 ){ // 入力文字数が超過している場合
          flag = 1;
          document . getElementById( 'notice-input-text-1' ) . innerHTML = input_text_1_length - 20 + "文字オーバーしています。";
          document . getElementById( 'notice-input-text-1' ) . style . display = "block";
      }

      if( flag ){ // 入力文字数が、不足もしくは超過している場合
          window . alert( '入力内容に不備があります。' ); // アラートを表示
          console.log("flagCheck:1")
          return false; // 送信中止
      }else{ // 入力文字数が、不足もしくは超過していない場合
          document . getElementById( 'notice-input-text-1' ) . style . display = "none";
          console.log("flagCheck:0")
          return true; // 送信実行
      }
    }
    // パスワードの文字数チェック
    function formUserPassCheck(){
      var flag = 0;

      // 入力文字数をチェック
      var input_text_1_length = document . regist_form . input_password . value . length; // 入力文字数を、変数に格納
      if ( input_text_1_length < 6 ){ // 入力文字数が不足している場合
          flag = 1;
          document . getElementById( 'notice-input-text-2' ) . innerHTML = 6 - input_text_1_length + "文字不足しています。";
          document . getElementById( 'notice-input-text-2' ) . style . display = "block";
      }
      if ( input_text_1_length  > 16 ){ // 入力文字数が超過している場合
          flag = 1;
          document . getElementById( 'notice-input-text-2' ) . innerHTML = input_text_1_length - 20 + "文字オーバーしています。";
          document . getElementById( 'notice-input-text-2' ) . style . display = "block";
      }

      if( flag ){ // 入力文字数が、不足もしくは超過している場合
          console.log("flagCheck:1");
          return false; // 送信中止
      }else{ // 入力文字数が、不足もしくは超過していない場合
          document . getElementById( 'notice-input-text-2' ) . style . display = "none";
          console.log("flagCheck:0");

          return true; // 送信実行
      }
    }

    function checkForm() {
      var check = new Array();
      check[0] = checkUserId();
      check[1] = checkPassWord();
      check[2] = checkName();
      check[3] = checkEmail();
      check[4] = checkPostNumber();
      check[5] = checkPrefAdre();

      for (var i = 0; i < check.length; i++) {
        if(check[i] == false) {
          alert("未入力項目があります。");
          return false;
        }
      }
      return true;
    }
    // ユーザIDの入力チェック
    function checkUserId() {
      if(document.regist_form.input_userid.value == "") {
        return false;
      } else {
        return true;
      }
    }
    // パスワードの入力チェック
    function checkPassWord() {
      console.log("check2");
      var checkPass = checkPassRe();
      if (checkPass == true) {
        var checkEquiv = checkPassEquiv();
        return checkEquiv;
      } else {
        return false;
      }
    }
    // 再入力パスワードが合っているかチェック
    function checkPassEquiv() {
      console.log("check3");
      if (document.regist_form.input_password.value == document.regist_form.input_password_re.value) {
        return true;
      } else {
        alert("パスワードが一致しません。");
        return false;
      }
    }
    // 入力されたパスワードが未入力かチェック
    function checkPassRe() {
      console.log("check4");
      if(document.regist_form.input_password.value == "" || document.regist_form.input_password_re.value == "") {
        return false;
      } else {
        return true;
      }
    }
    // 名前の入力チェック
    function checkName() {
      console.log("check5");
      if (document.regist_form.input_first_name.value == "" || document.regist_form.input_last_name.value == "") {
        return false;
      } else {
        return true;
      }
    }
    // Emailの入力チェック
    function checkEmail() {
      console.log("check6");
      if (document.regist_form.input_email.value == "") {
        return false;
      } else {
        return true;
      }
    }
    // 郵便番号の入力チェック
    function checkPostNumber() {
      console.log("check7");
      if (document.regist_form.zip01.value == "") {
        return false;
      } else {
        return true;
      }
    }
    // 住所の入力チェック
    function checkPrefAdre() {
      console.log("check8");
      if (document.regist_form.pref01.value == "" || document.regist_form.addr01.value == "") {
        return false;
      } else {
        return true;
      }
    }
  </script>
  <script>
    $(function() {
        $('.js-button').click(function(){
            AjaxZip3.zip2addr('zip01', '', 'pref01', 'addr01');
        });
    });
  </script>
  <body>
    <!-- ヘッダー要素 -->
    <header>
      <h1><span>B</span>ook<span>S</span>helf<span>O</span>nline</h1>
      <nav>
        <ul>
          <li><a href="#">TOP</a></li>
          <li><a href="#">STORE</a></li>
          <li><a href="#">MyShelf</a></li>
          <li><a href="#">Feeling</a></li>
          <li><a href="#">HELP</a></li>
        </ul>
      </nav>
    </header>

    <div class="flex_contents_block">
      <!-- メインコンテンツブロック -->
      <div class="main_block">
        <main>
          <form method="post" name="regist_form" action="book_shelf_registration_result.php" onsubmit="return formUserCheck();">
            <table>
              <h2>会員情報登録フォーム</h2>
              <tr>
                <td class="item">ユーザー名：</td>
                <td>
                  <input type="text" size="50" name="input_userid" value="">&nbsp;&nbsp;※ 6文字以上12文字以下
                  <p id="notice-input-text-1" style="display: none; color: red;"></p>
                </td>
              </tr>
              <tr>
                <td class="item">パスワード：</td>
                <td>
                  <input type="password" size="50" name="input_password" value="">&nbsp;&nbsp;※ 6文字以上16文字以下
                  <p id="notice-input-text-2" style="display: none; color: red;"></p>
                </td>
              </tr>
              <tr>
                <td class="item">パスワード(再入力)：</td>
                <td><input type="password" size="50" name="input_password_re" value="">&nbsp;&nbsp;※ 再入力</td>
              </tr>
              <tr>
                <td class="item">氏名：</td>
                <td>
                  姓：<input type="text" size="25" name="input_first_name" value="">
                  名：<input type="text" size="25" name="input_last_name" value="">
                </td>
              </tr>
              <tr>
                <td class="item">E-mail：</td>
                <td><input type="text" size="50" name="input_email" value=""></td>
              </tr>
              <tr>
                <td class="item">郵便番号：</td>
                <td>
                  <!-- onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" -->
                  〒<input type="text" name="zip01" size="10" maxlength="8"><button type="button" class="js-button">自動入力</button>
                </td>
              </tr>
              <tr>
                <td class="item">都道府県：</td>
                <td><input type="text" name="pref01" size="20"></td>
              </tr>
              <tr>
                <td class="item">住所１：</td>
                <td><input type="text" name="addr01" size="50">&nbsp;&nbsp;※ 番地まで</td>
              </tr>
              <tr>
                <td class="item">住所２：</td>
                <td><input type="text" name="addr02" size="50">&nbsp;&nbsp;※ アパート名、部屋番号など</td>
              </tr>
            </table>
            <div><input type="submit" value=" 送 信 " onclick="return checkForm();"></div>
          </form>
        </main>
      </div>
      <!-- 広告ブロック -->
      <div class="aside_block">
        <aside>
          <p><a href="#"><img src="book_shelf_register_images/contents/advert1.png"></a></p>
          <p><a href="#"><img src="book_shelf_register_images/contents/advert2.png"></a></p>
        </aside>
      </div>
    </div>
    <!-- フッター要素 -->
    <footer>
      <nav>
        <table>
          <tr>
            <td width="250"><a href="#">BookShelfOnline</a></td>
            <td width="250"><a href="#">Store</a></td>
            <td width="250"><a href="#">Euclid</a></td>
            <td width="250"><a href="#">HELP</a></td>
          </tr>
          <tr>
            <td><a href="#">My Page</a></td>
            <td><a href="#">Category</a></td>
            <td><a href="#">Now Feelind</a></td>
            <td><a href="#">Site MAP</a></td>
          </tr>
        </table>
      </nav>
      <!-- コピーライト -->
      <p><small>Copyright&copy;CodeCamp All Rights Reserved.</small></p>
    </footer>
  </body>
</html>
