<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Тестовое задание</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="/admin/logout">Выход</a>
            </li>

        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">

        <div class="col-12">

            <h1>Список задач</h1>
        </div>

     <?
     foreach ($tasks as   $task):
         ?>
        <div class="col-12">
                <div class="card mb-3" >
                        <div class="card-header">
                            <a href="/admin/edittask/?task=<?=$task['id']?>"> Редактировать</a><br>
                            <?=$task['user']?>
                            <h6 class="card-subtitle mb-2 text-muted"><?=$task['email']?></h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?=htmlspecialchars($task['text'])?></p>
                        </div>

                        <div class="card-footer text-muted" >
                            <?if($task['done']):?>
                            Выполнено
                            <?endif;?>
                            <div><?if($task['admin_edit']):?>
                                    Отредактировано администртором
                                <?endif;?></div>
                        </div>

                </div>
        </div>
     <?endforeach;?>

    </div>
</div>
