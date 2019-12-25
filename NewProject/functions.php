<?php
include 'connect.php';

function getAll($db, $id = FALSE)
{
    $sql = "SELECT * FROM user INNER JOIN user_message ON user.id = user_message.user_id ";

    if ($id) {
        if ($id == 'likes') {
            $sql = "SELECT * FROM user INNER JOIN user_message ON user.id = user_message.user_id ORDER BY count_like DESC";
        }
        if ($id == 'date') {
            $sql = "SELECT * FROM user INNER JOIN user_message ON user.id = user_message.user_id ORDER BY user_message.created_at DESC";
        }
        if ($id == 'countMess') {
            $sql = "SELECT * FROM user INNER JOIN user_message ON user.id = user_message.user_id ORDER BY user_message.user_id";
        }
        if ($id == 'users') {
            $sql = "SELECT * FROM user INNER JOIN user_message ON user.id = user_message.user_id ORDER BY name";
        }
    }
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id']] = $row;
    }
    return $result;
}

function sortByName($db, $id)
{
    $sql = "SELECT * FROM user, user_message WHERE test_task.user.id=$id AND user.id = user_message.user_id";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id']] = $row;
    }
    return $result;
}

function getAllNames($db)
{
    $sql = "SELECT test_task.user.id,test_task.user.name FROM user, user_message WHERE test_task.user.id=test_task.user_message.user_id";
    $res = array();

    $stmt = $db->prepare($sql);

    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[$row['name']] = $row;
    }

    return $res;

}

function addMessage($db, $userName, $userLast_name, $message)
{
    $sql = "INSERT INTO user( name, last_name) VALUES ( :name , :last_name);
            INSERT INTO user_message(user_id, message) VALUES (LAST_INSERT_ID(), :message);";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $userName, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $userLast_name, PDO::PARAM_STR);
    $stmt->bindValue(':message', $message, PDO::PARAM_STR);
    $stmt->execute();

}

function deleteMessage($db, $id)
{
    $sql = "DELETE FROM user WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}