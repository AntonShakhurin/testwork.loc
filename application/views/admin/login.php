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

            <h1>Вход</h1>
        </div>


        <? if (isset($error)):?>

            <div class="col-12">

                <div class="alert alert-warning" role="alert">
                    <?=$error?>
                </div>
            </div>

        <?endif;?>
        <div class="col-8">
            <form action="/admin/login" method="POST">
                <div class="form-group">
                    <label for="">Имя пользователя</label>
                    <input type="text" name="name" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="">Пароль</label>
                    <input type="password" name="password" class="form-control" required >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Вход</button>
                </div>
            </form>
        </div>

    </div>
</div>
