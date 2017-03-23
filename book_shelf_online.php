<?php  ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>BookShelfOnlineトップ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css">
    <link rel="stylesheet" href="book_shelf_online.css">

  </head>
  <body>
    <header>
      <div class="header_flex">
        <div class="top_title_block">
          <h1>BookShelfOnline</h1>
        </div>
        <div class="search_form_block">
          <form name="search" method="post">
            <input type="hidden" name="login_name" value=<?php if(!empty($user_name)){print $user_name;} ?>>
            <dl class="search">
              <dt><input type="text" name="comment" placeholder="検索する.."></dt>
              <dd><button><span>送信</span></button></dd>
            </dl>
          </form>
        </div>
        <div class="member_regist_block">
          <a href="#">
            <h4>会員登録</h4>
            <p>contentscontents</p>
          </a>
        </div>
      </div>
      <nav>
        <a href="#">TOP</a>
        <a href="#">Search</a>
        <a href="#">Euclid</a>
        <a href="#">MyFeeling</a>
        <a href="#">HELP</a>
      </nav>
    </header>
    <nav>

    </nav>
    <main>

    </main>
    <aside>

    </aside>
    <footer>

    </footer>
  </body>
</html>
