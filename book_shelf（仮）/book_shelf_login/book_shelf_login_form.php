<?php  ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>BookShelfOnline ログインページ</title>
    <link rel="stylesheet" href="book_shelf_login_form.css">
  </head>
  <body>
    <!-- ヘッダーコンテンツ -->
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
    <!-- メインコンテンツ -->
    <main>
      <div class="flex_main_contents">
        <!-- メインブロック１ -->
        <div class="left_main_block">
          <h3>ログインフォーム</h3>
          <form method="post" action="#">
            <table>
              <tr>
                <td class="item">ユーザID：</td>
              </tr>
              <tr>
                <td><input type="text" size="40" name="login_user_id" value=""></td>
              </tr>
              <tr>
                <td class="item">パスワード：</td>
              </tr>
              <tr>
                <td><input type="password" size="40" name="login_user_pass" value=""></td>
              </tr>
              <tr>
                <td><input type="submit" name="submit" value="LOGIN"></td>
              </tr>
            </table>
          </form>
          <p><small><a href="book_shelf_registration_form.php">&gt; 新規会員登録</a></small></p>
          <p><small><a href="#">&gt; 利用規約</a></small></p>
        </div>
        <!-- メインブロック２ -->
        <div class="right_main_block">
          <h3>会員コンテンツ</h3>
          <p>Contents1：書籍の購入</p>
          <p>Contents2：新作情報を入手</p>
          <p>Contents3：おすすめ本を入手</p>
          <p>Contents4：お気に入り書籍の登録</p>
          <p>Contents5：<a href="#">感情に合わせた本を探す</a></p>
          <p>Contents6：その他</p>
        </div>
      </div>
    </main>
    <!-- フッターコンテンツ -->
    <footer>
      <nav>
        <table>
          <tr>
            <td width="250"><a href="#">BookShelfOnline</a></td>
            <td width="250"><a href="#">Store</a></td>
            <td width="250"><a href="#">Euclid Dist</a></td>
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
