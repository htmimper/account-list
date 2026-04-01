<?php
$pdo = new PDO(
  'mysql:host=localhost;dbname=di_blog;charset=utf8',
  'root',
  'mysql',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// GETでID取得
$id = $_GET['id'] ?? null;

// IDが無い場合
if (!$id) {
  echo "IDが指定されていません";
  exit;
}

// データ取得
$sql = "SELECT * FROM accounts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);

// データがない場合
if (!$account) {
  echo "データが存在しません";
  exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>アカウント削除</title>
</head>
<body>

<h2>アカウント削除画面</h2>

<p>以下の内容を削除しますか？</p>

<table border="1">
<tr>
  <th>ID</th>
  <td><?= $account['id'] ?></td>
</tr>
<tr>
  <th>姓</th>
  <td><?= $account['family_name'] ?></td>
</tr>
<tr>
  <th>名</th>
  <td><?= $account['last_name'] ?></td>
</tr>
<tr>
  <th>メール</th>
  <td><?= $account['mail'] ?></td>
</tr>
</table>

<br>

<!-- ダミーボタン（まだ削除しない） -->
<button onclick="alert('削除機能は未実装です');">削除</button>

<br><br>

<a href="list.php">一覧に戻る</a>

</body>
</html>