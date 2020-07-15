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

        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">

        <div class="col-12">

            <h1>Задание</h1>
        </div>

        <form action="/admin/savetask" method="POST">
            <input type="hidden" name="task_id" value="<?=$task['id']?>">
            <div class="form-group">
                <label for="">Задание</label>
                <textarea name="text" class="form-control" cols="30" rows="10"><?=htmlspecialchars($task['text'])?></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="checkbox_done" name="done" value="1" <?=($task['done'])?'checked':''?>>
                <label class="form-check-label" for="checkbox_done">Выполнено</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
