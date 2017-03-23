<?php  ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>BookShelfOnline</title>
    <link rel="stylesheet" href="book_shelf_item_list.css">
  </head>
  <body>
    <!-- ヘッダー項目 -->
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

    <div class="contents_flex">
      <div class="side_nav_block">
        <nav>
          <ul>
            <li><a href="#">Navigation1</a></li>
            <li><a href="#">Navigation2</a></li>
            <li><a href="#">Navigation3</a></li>
            <li><a href="#">Navigation4</a></li>
            <li><a href="#">Navigation5</a></li>
            <li><a href="#">Navigation6</a></li>
            <li><a href="#">Navigation7</a></li>

          </ul>
        </nav>
      </div>
      <div class="center_main_block">
        <!-- メインブロック -->
        <main>
          <h2>BookList</h2>
          <nav>
            <div class="navi_flex_block">
              <div class="category_block">
                <table>
                  <p>カテゴリーで探す</p>
                  <tr>
                    <td><a href="#">歴史小説</a></td>
                    <td><a href="#">時代小説</a></td>
                    <td><a href="#">経済小説</a></td>
                  </tr>
                  <tr>
                    <td><a href="#">ミステリー</a></td>
                    <td><a href="#">サスペンス</a></td>
                    <td><a href="#">SF</a></td>
                  </tr>
                  <tr>
                    <td><a href="#">ホラー</a></td>
                    <td><a href="#">ファンタジー</a></td>
                    <td><a href="#">ロマンス</a></td>
                  </tr>
                </table>
              </div>
              <div class="author_block">
                <table>
                  <p>受賞作品から探す</p>
                  <tr>
                    <td><a href="#">芥川賞</a></td>
                    <td><a href="#">直木賞</a></td>
                    <td><a href="#">すばる文学賞</a></td>
                  </tr>
                  <tr>
                    <td><a href="#">小説すばる新人賞</a></td>
                    <td><a href="#">吉川英治文学新人賞</a></td>
                    <td><a href="#">吉川英治文学賞</a></td>
                  </tr>
                  <tr>
                    <td><a href="#">野間文芸賞</a></td>
                    <td><a href="#">山本周五郎賞</a></td>
                    <td><a href="#">本屋大賞</a></td>
                  </tr>
                </table>
              </div>
              <div class="publisher_block">
                <table>
                  <p>出版社から探す</p>
                  <tr>
                    <td><a href="#">新潮社</a></td>
                    <td><a href="#">集英社</a></td>
                    <td><a href="#">小学館</a></td>
                  </tr>
                  <tr>
                    <td><a href="#">文藝春愁</a></td>
                    <td><a href="#">光文社</a></td>
                    <td><a href="#">河出書房新社</a></td>
                  </tr>
                  <tr>
                    <td><a href="#">白泉社</a></td>
                    <td><a href="#">八木書店</a></td>
                    <td><a href="#">本阿弥書店</a></td>
                  </tr>
                </table>
              </div>
            </div>
          </nav>
        </main>
      </div>
      <div class="aside_block">
        <!-- 広告ブロック -->
        <aside>
          <p><a href="#"><img src="book_shelf_register_images/contents/advert1.png"></a></p>
          <p><a href="#"><img src="book_shelf_register_images/contents/advert2.png"></a></p>
        </aside>
      </div>
    </div>

    <!-- フッターブロック -->
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
