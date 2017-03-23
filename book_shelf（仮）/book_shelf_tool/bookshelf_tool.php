<?php
  $host     = 'localhost';
  $username = 'root';   // MySQLのユーザ名
  $password = 'root';   // MySQLのパスワード
  $dbname   = 'book_shelf';   // MySQLのDB名

  // MySQL用のDNS文字列
  $dns = 'mysql:dbname='.$dbname.';host='.$host;

  $img_dir    = './book_image/';   // アップロードした画像ファイルの保存ディレクトリ
  $data       = [];
  $err_msg    = [];         // エラーメッセージ
  $new_img_filename = '';   // アップロードした新しい画像ファイル名

  // tf判定
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title_tf = title_tof('new_book_title');
    $author = author_tof('new_book_author');
    $price_tf = price_tof('new_book_price');
    //$status_tf = status_tof('new_status');
    if(!empty($_POST['update_stock'])) {
      $stock_tf = stock_tof('update_stock');
    } else {
      $stock_tf = stock_tof('new_stock');
    }
  }

  // アップロード画像ファイルの保存
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($title_tf === TRUE) && ($price_tf === TRUE)) {
    // HTTP POST でファイルがアップロードされたかどうかチェック
    if (is_uploaded_file($_FILES['new_img']['tmp_name']) === TRUE) {
      // 画像の拡張子を取得
      $extension = pathinfo($_FILES['new_img']['name'], PATHINFO_EXTENSION);
      // 指定の拡張子であるかどうかチェック
      if ($extension === 'jpg' || $extension === 'jpeg') {
        // 保存する新しいファイル名の生成（ユニークな値を設定する）
        $new_img_filename = sha1(uniqid(mt_rand(), true)). '.' . $extension;
        // 同名ファイルが存在するかどうかチェック
        if (is_file($img_dir . $new_img_filename) !== TRUE) {
          // アップロードされたファイルを指定ディレクトリに移動して保存
          if (move_uploaded_file($_FILES['new_img']['tmp_name'], $img_dir . $new_img_filename) !== TRUE) {
              $err_msg[] = 'ファイルアップロードに失敗しました';
          }
        } else {
          $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
        }
      } else {
        $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。';
      }
    } else {
      $err_msg[] = 'ファイルを選択してください';
    }
  }

  // アップロードした新しい画像ファイル名の登録、既存の画像ファイル名の取得
  try {
    // データベースに接続
    $dbh = new PDO($dns, $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // エラーがなければ、アップロードした新しい画像ファイル名を保存
    if (count($err_msg) === 0 && $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      if ($_POST["submit"] === "本を追加") {
        var_dump('check1');
        // トランザクション開始
        $dbh->beginTransaction();
        try {
          $add_title = $_POST['new_book_title'];
          $add_author = $_POST['new_book_author'];
          $add_price = $_POST['new_book_price'];
          $add_stock = $_POST['new_book_stock'];
          $add_status = ((int)$_POST['new_status']);
          // 商品情報テーブルにデータ作成
          // SQL文を作成
          $sql  = "INSERT INTO book_shelf_master(book_title, book_author, book_price, img, status)";
          $sql .= " VALUES('{$add_title}', ";
          $sql .= "'{$add_author}', ";
          $sql .= "'{$add_price}', ";
          $sql .= "'{$new_img_filename}', ";
          $sql .= "'{$add_status}');";
          // SQL文を実行する準備
          $stmt = $dbh->prepare($sql);
          // SQLを実行
          $stmt->execute();
          // 直近で追加したidを取得
          $added_id = $dbh->lastInsertId('book_id');
          // 在庫情報テーブルにデータ作成
          // SQL文を作成
          $sql  = "INSERT INTO book_shelf_stock(book_id, book_stock) ";
          $sql .= "VALUES('{$added_id}', '{$add_stock}');";
          // SQL文を実行する準備
          $stmt = $dbh->prepare($sql);
          // SQLを実行
          $stmt->execute();
          $dbh->commit();
        } catch (PDOException $e) {
          // ロールバック処理
          $dbh->rollback();
          // 例外をスロー
          throw $e;
        }
        var_dump("check1_End");
        //在庫数を変更するプログラム
      } else if ($_POST["submit"] === "変更") {
        var_dump('check2');
        try {
          $upd_stock = $_POST['update_stock'];
          $upd_id = $_POST['book_id'];
          // SQL文を作成
          $sql = "UPDATE book_shelf_stock SET book_stock={$upd_stock} WHERE book_id={$upd_id}";
          // SQL文を実行する準備
          $stmt = $dbh->prepare($sql);
          // SQLを実行
          $stmt->execute();
          // レコードの取得
          // $rows = $stmt->fetchAll();
          // // 1行ずつ結果を配列で取得
          // foreach ($rows as $row) {
          //   $data[] = $row;
          // }
        } catch (PDOException $e) {
          throw $e;
        }
        var_dump('check2_End');
      } else {
        try {
          $upd_status = ((int)$_POST['status']);
          $upd_id = ((int)$_POST['book_id']);
          $new_apd_status;
          switch ($upd_status) {
            case 0:
              $new_upd_status = 1;
              break;
            case 1:
              $new_upd_status = 0;
              break;
          }
          // SQL文を作成
          $sql = "UPDATE book_shelf_master SET status={$new_upd_status} WHERE book_id={$upd_id}";
          // SQL文を実行する準備
          $stmt = $dbh->prepare($sql);
          // SQLを実行
          $stmt->execute();
        } catch (PDOException $e) {
          throw $e;
        }
      }
    }

    // 既存のアップロードされた画像ファイル名の取得
    try {
      // SQL文を作成
      $sql = "SELECT book_shelf_master.book_id, book_title, book_author, book_price, img, book_stock, status FROM book_shelf_master, book_shelf_stock WHERE book_shelf_master.book_id = book_shelf_stock.book_id";
      // SQL文を実行する準備
      $stmt = $dbh->prepare($sql);
      // SQLを実行
      $stmt->execute();
      // レコードの取得
      $rows = $stmt->fetchAll();
      // 1行ずつ結果を配列で取得
      foreach ($rows as $row) {
        $data[] = $row;
      }
    } catch (PDOException $e) {
      throw $e;
    }
  } catch (PDOException $e) {
    // 接続失敗した場合
    $err_msg['db_connect'] = 'DBエラー：'.$e->getMessage();
  }

  // tf判定
  function title_tof ($tmp_name){
    $bool = false;
    if(!empty($_POST[$tmp_name])){
      $bool = true;
      return $bool;
    } else {
      return $bool;
    }
    return $bool;
  }
  function author_tof ($tmp_author){
    $bool = false;
    if(!empty($_POST[$tmp_author])) {
      $bool = true;
      return $bool;
    } else {
      return $bool;
    }
    return $bool;
  }
  function price_tof ($tmp_price){
    $bool = false;
    if(!empty($_POST[$tmp_price])){
      $bool = true;
      return $bool;
    } else {
      return $bool;
    }
    return $bool;
  }
  function stock_tof ($tmp_stock){
    $bool = false;
    if(!empty($_POST[$tmp_stock])){
      $bool = true;
      return $bool;
    } else {
      return $bool;
    }
    return $bool;
  }
  function status_tof ($tmp_status){
    $bool = false;
    if(!empty($_POST[$tmp_status])){
      $bool = true;
      return $bool;
    } else {
      return $bool;
    }
    return $bool;
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>書籍管理ツール</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/4.1.0/sanitize.min.css"> -->
    <link rel="stylesheet" href="bookshelf_tool.css">
  </head>
  <body>
    <?php foreach ($err_msg as $value) { ?>
      <p><?php print $value; ?></p>
    <?php } ?>
    <h1>BookShelfOnline管理ツール</h1>
    <!-- 本を追加 -->
    <div class="add_new_book">
      <h2>新規商品追加</h2>
      <form method="post" enctype="multipart/form-data">
        <div>名前: <input type="text" name="new_book_title"></div>
        <div>著者: <input type="text" name="new_book_author"></div>
        <div>値段: <input type="text" name="new_book_price"></div>
        <div>個数: <input type="text" name="new_book_stock"></div>
        <div><input type="file" name="new_img"></div>
        <div>
          <select name="new_status">
            <option value="0">非公開</option>
            <option value="1">公開</option>
          </select>
        </div>
        <div>
          <input type="submit" name="submit" value="本を追加">
        </div>
      </form>
    </div>
    <!-- 本一覧 -->
    <div class="all_book">
      <table>
        <h2>商品一覧</h2>
        <tr>
          <th>書籍画像</th>
          <th>タイトル</th>
          <th>著者</th>
          <th>価格</th>
          <th>在庫数</th>
          <th>公開ステータス</th>
        </tr>
        <?php foreach ($data as $value)  { ?>
          <tr>
            <td><img src="<?php print $img_dir . $value['img']; ?>" width="80" height="80"></td>
            <td><?php print $value['book_title']; ?></td>
            <td><?php print $value['book_author']; ?></td>
            <td><?php print $value['book_price']; ?>円</td>
            <td>
              <form method="post">
                <div>
                  <input type="hidden" name="book_id" value="<?php print $value['book_id']; ?>">
                  <input type="text" name="update_stock" value="<?php print $value['book_stock']; ?>">個
                  <input type="submit" name="submit" value="変更">
                </div>
              </form>
            </td>
        <?php
          $status_num = $value['status'];
          $status_message = '';
          switch ($status_num) {
            case 0:
              $status_message = '非公開→公開';
              break;
            case 1:
              $status_message = '公開→非公開';
              break;
          }
        ?>
            <td>
              <form method="post">
                <input type="hidden" name="book_id" value="<?php print $value['book_id']; ?>">
                <input type="hidden" name="status" value="<?php print $value['status']; ?>">
                <input type="submit" name="submit" value="<?php print $status_message; ?>">
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
    <!-- ページング -->
    <div class="page_send_block">
      <ul class="pageNavi">
        <li><a href="#">&laquo; 前</a></li>
        <li><a href="#">１</a></li>
        <li><span>２</span></li>
        <li><a href="#">３</a></li>
        <li><a href="#">４</a></li>
        <li><a href="#">５</a></li>
        <li><a href="#">６</a></li>
        <li><a href="#">次 &raquo;</a></li>
      </ul>
    </div>
  </body>
</html>
