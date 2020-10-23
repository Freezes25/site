<?php
    session_start();
    require_once('db.php');
    $score = $_POST['score'];
    $id = $_SESSION['users']['id'];
    //В запросе на обновление и добавление используются именованные параметры
    $sql = 'UPDATE `users` SET `score` = :score WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    // Именованные параметры подставляются в виде ассоциативного массива
    $query->execute([
        'score'=>$score,
        'id'=>$id
    ]);

    //Чтобы нормально отработал аякс, нужно результат возвращать через echo
    echo json_encode(['success'=>true]);
    //Phpшные редиректы через аякс не работают
    //header('Location: ../game.php');
