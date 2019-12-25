<?
include 'connect.php';
include 'functions.php';

if ($_GET['sort_id']) {
    $id = strip_tags($_GET['sort_id']);
    $users = getAll($db, $id);
} elseif (isset($_POST['submit'])) {
    $userId = $_POST['fscxvcx'];
    $users = sortByName($db, $userId);
} else {
    $users = getAll($db);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<header style="margin-top: 20px; margin-left: 10px; margin-right: 10px">
    <div id="fon"></div>
    <div id="load"></div>
    <div class="sort">
        <a href="index.php?sort_id=likes">
            <button>Сортировать по количеству лайков</button>
        </a>
        <a href="index.php?sort_id=date">
            <button id="date">Сортировать по дате</button>
        </a>
        <a href="index.php?sort_id=countMess">
            <button id="date">Сортировать по количеству сообщений</button>
        </a>
        <a href="index.php?sort_id=users">
            <button id="date">Сортировать по алфавиту</button>
        </a>
    </div>
    <div class="form-group">
        <form action="index.php" method="POST">
            <div class="form-group">
                <select class="custom-select" name="fscxvcx">
                    <?php
                    $names = getAllNames($db);
                    foreach ($names as $key => $value) {
                        echo "<option value=" . $value['id'] . ">" . $value['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit">submit</button>
        </form>
    </div>
    <?

    ?>
</header>

<div id="content" style="margin-top: 20px; margin-left: 10px; margin-right: 10px">
    <div class="usersTable">
        <table class="table table-bordered" border="1px">
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Текст</th>
                <th>Дата отправки сообщения</th>
                <th>Удалить</th>
            </tr>
            <?php
            foreach ($users as $user) { ?>
                <tr>
                    <td> <? echo $user['name']; ?></td>
                    <td><? echo $user['last_name']; ?></td>
                    <td><? echo $user['message']; ?></td>
                    <td><? echo $user['created_at']; ?></td>
                    <td><a class="btn btn-danger" href="delete.php?user_id=<? echo $user['user_id'] ?>"> Удалить </a>
                    </td>
                </tr>
            <? } ?>
        </table>
    </div>

    <form action="" method="post" style="margin-top: 20px; margin-left: 10px;">
        <div class="form-group">
            <input type="text" placeholder="Имя" name="newName" id="newName">
            <input type="text" placeholder="Фамилия" name="newLast_name" id="newLast_name">
            <p>Новое сообщение:</p><textarea cols=25 rows=3 name='newMessage' id="newMessage"></textarea>
            <button type='submit'>Добавить</button>
        </div>

        <?php
        $N_name = $_POST['newName'];
        $N_last_name = $_POST['newLast_name'];
        $NewMessage = $_POST['newMessage'];
        $addMessage = addMessage($db, $N_name, $N_last_name, $NewMessage)
        ?>
</div>
</form>
<footer style="margin-top: 20px; margin-left: 10px; margin-right: 10px">

</footer>
</body>
</html>
