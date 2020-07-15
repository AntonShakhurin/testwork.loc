<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Тестовое задание</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="/admin">Управление</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-toggle="modal" data-target="#exampleModal">Создать задачу</a>
            </li>

        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">

        <div class="col-12">

            <h1>Список задач</h1>
        </div>

        <? if (isset($message)):?>

            <div class="col-12">

                <div class="alert alert-success" role="alert">
                    <?=$message?>
                </div>
            </div>

        <?endif;?>
    </div>
        <div class="row mb-3">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$sort?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/main/sort?sort=user&order=ASC">Имя пользователя &uarr;</a>
                    <a class="dropdown-item" href="/main/sort?sort=user&order=DESC">Имя пользователя &darr;</a>
                    <a class="dropdown-item" href="/main/sort?sort=email&order=ASC">Email &uarr;</a>
                    <a class="dropdown-item" href="/main/sort?sort=email&order=DESC">Email &darr;</a>
                    <a class="dropdown-item" href="/main/sort?sort=done&order=ASC">Статус &uarr;</a>
                    <a class="dropdown-item" href="/main/sort?sort=done&order=DESC">Статус &darr;</a>
                </div>
            </div>
            <a href="/main/remsort" class="btn btn-primary">x</a>

        </div>
    <div class="row">
            <?
            foreach ($tasks as   $task):
                ?>
        <div class="col-12 mb-2">
                <div class="card" >
                        <div class="card-header">
                            имя пользователя: <?=$task['user']?>
                            <h6 class="card-subtitle mb-2 text-muted">email: <?=$task['email']?></h6>
                        </div>
                        <div class="card-body">

                            <p class="card-text">текст задачи: <br> <?=htmlspecialchars($task['text'])?></p>
                        </div>

                        <div class="card-footer text-muted">
                            <?if($task['done']):?>
                                статус: Выполнено
                            <?else:?>
                                статус: невыполнено
                            <?endif;?>
                        </div>

                </div>
        </div>
            <?endforeach;?>

    </div>
    <div class="row">
        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <? for ($i =1;$i<=$pages;$i++):?>
                <li class="page-item <?=($page==$i)?'active':''?>"><a class="page-link" href="/?page=<?=$i?>"><?=$i?></a></li>
                <? endfor;?>
            </ul>
        </nav>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание задачи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/main/createtask" id="newTask" method="POST">
                    <div class="form-group">
                        <label for="">Имя пользователя</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Задача</label>
                        <textarea name="text"  class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" form="newTask" class="btn btn-primary" >Сохранить</button>
            </div>
        </div>
    </div>
</div>