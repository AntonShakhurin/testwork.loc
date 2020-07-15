<?php

include "application/models/modeltasks.php";

class ControllerMain extends Controller{


    public function action_sort(){

        //Сохранение сортировки
        $sort= $_GET['sort'];
        $order= $_GET['order'];
        session_start();
        $_SESSION['sort']=$sort;
        $_SESSION['order']=$order;

        header("Location: /");
        die();

    }

    public function action_remsort(){

        //Удаление сортировки
        session_unset();

        header("Location: /");
        die();

    }


    function action_index()
    {

        //Вывод задач
        $limit = 3;
        $page =1;
        if (isset($_GET['page'])) $page = $_GET['page'];

        $sort = $_SESSION['sort']?$_SESSION['sort']:'id';
        $order = $_SESSION['order']?$_SESSION['order']:'asc';

        $offset = $page*$limit-$limit;
        $tasks_model = new ModelTasks();
        $tasks_list = $tasks_model->tasks_list($limit,$offset,$sort,$order);
        $count = $tasks_model->count_task();
        $pages = ceil($count/$limit);


        //Формирование строчки для Сортировки

        $cur_sort='';
        switch ($sort){
            case 'user':
                $cur_sort = 'Имя пользователя';
                break;
            case 'email':
                $cur_sort = 'Email';
                break;
            case 'done':
                $cur_sort = 'Статус';
                break;
        }

        if (!empty($cur_sort)){
            switch ($order){
                case 'ASC':
                    $cur_sort.=' &uarr;';
                    break;
                case 'DESC':
                    $cur_sort.=' &darr;';
                    break;
            }
        }
        else{
            $cur_sort= 'Сортировка';
        }



        $this->view->render('main.php',['sort'=>$cur_sort,'tasks'=>$tasks_list,'page'=>$page,'pages'=>$pages]);

    }
    function action_createtask()
    {
        //Создание новой задачи

        $user= $_POST['user'];
        $email= $_POST['email'];
        $text= $_POST['text'];
        $tasks_model = new ModelTasks();

        $tasks_model->createtask($user,$email,$text);

        //Вывод задачи
        $limit = 3;

        $page =1;
        if (isset($_GET['page'])){

            $page = $_GET['page'];
        }

        $sort = $_SESSION['sort']?$_SESSION['sort']:'id';
        $order = $_SESSION['order']?$_SESSION['order']:'asc';


        $offset = $page*$limit-$limit;
        $tasks_model = new ModelTasks();

        $tasks_list = $tasks_model->tasks_list($limit,$offset,$sort,$order);
        $count = $tasks_model->count_task();



        $pages = ceil($count/$limit);



        $cur_sort='';
        switch ($sort){
            case 'user':
                $cur_sort = 'Имя пользователя';
                break;
            case 'email':
                $cur_sort = 'Email';
                break;
            case 'done':
                $cur_sort = 'Статус';
                break;
        }


        if (!empty($cur_sort)){
            switch ($order){
                case 'ASC':
                    $cur_sort.=' &uarr;';
                    break;
                case 'DESC':
                    $cur_sort.=' &darr;';
                    break;

            }
        }
        else{
            $cur_sort= 'Сортировка';
        }



        $this->view->render('main.php',['tasks'=>$tasks_list,'message'=>'Задача создана','page'=>$page,'pages'=>$pages]);

    }
}