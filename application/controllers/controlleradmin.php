<?php

include "application/models/modeltasks.php";

class ControllerAdmin extends Controller
{


    function action_index()
    {

        //Проверка на админа
        $is_admin = $_COOKIE['is_admin'];
        if ($is_admin) {

            //Получить все задачи
            $limit = 99999;
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }
            $offset = $page * $limit - $limit;
            $tasks_model = new ModelTasks();
            $tasks_list = $tasks_model->tasks_list($limit, $offset);
            $this->view->render('admin/main.php', ['tasks' => $tasks_list]);
        } else {
            $this->view->render('admin/login.php');
        }

    }

    public function action_login()
    {
        $login = $_POST['name'];
        $password = $_POST['password'];
        //Провека на админа
        if ($login === 'admin' && $password === '123') {
            setcookie('is_admin', true);
            header("Location: /admin");
            die();
        } else {
            $this->view->render('admin/login.php', ['error' => 'Неверный логин или пароль']);
        }

    }


    public function action_logout()
    {
        setcookie('is_admin');
        header("Location: /admin");
        die();
    }

    public function action_savetask()
    {
        //Проверка на админа
        $is_admin = $_COOKIE['is_admin'];
        if ($is_admin) {

            //Сохранение изменений задачи
            $task_id = $_POST['task_id'];
            $text = $_POST['text'];
            $done = $_POST['done'];
            if ($done) {
                $done = 1;
            } else {
                $done = 0;
            }
            $tasks_model = new ModelTasks();
            $task = $tasks_model->task($task_id);

            //Проверка редактировалась ли запись
            if ($task['admin_edit'] == 0) {
                if ($task['text'] === $text) {
                    $edited = 0;
                } else {
                    $edited = 1;
                }
            } else {
                $edited = 1;
            }
            $tasks_model->savetask($task_id, $text, $done, $edited);
            header("Location: /admin");
            die();
        } else {

            $this->view->render('admin/login.php', ['error' => 'Выполните вход']);
        }
    }

    public function action_edittask()
    {
        //Проверка на админа
        $is_admin = $_COOKIE['is_admin'];
        if ($is_admin) {
            //Вывод формы для редактирования
            $task_id = $_GET['task'];
            $tasks_model = new ModelTasks();
            $task = $tasks_model->task($task_id);
            $this->view->render('admin/task.php', ['task' => $task]);
        } else {
            $this->view->render('admin/login.php', ['error' => 'Выполните вход']);
        }
    }
}