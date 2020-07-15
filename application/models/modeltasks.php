<?php


class ModelTasks extends Model
{


    public function tasks_list($limit,$offset,$sort='id',$order='ASC'){


        $offset = ' OFFSET '.$offset;
        $limit= ' LIMIT '.$limit;


        $sort= ' ORDER BY '.$sort .' '.$order;
        return $this->sql('SELECT * FROM tasks '.$sort.$limit.$offset);
    }

    public function count_task(){


        return count($this->sql('SELECT * FROM tasks '));
    }
    public function task($id){


        return $this->sql('SELECT * FROM tasks where id =?',[$id])[0];
    }
    public function savetask($task_id,$text,$done,$edited){


        return $this->update('UPDATE `tasks` SET `text` =:text , done=:done, admin_edit=:edited WHERE `id` = :id',[
            'text'=>$text,
            'done'=>$done,
            'edited'=>$edited,
            'id'=>$task_id]);
    }
    public function createtask($user,$email,$text){

        return $this->create('INSERT INTO `tasks` SET `user` = :user, `email` = :email, `text` = :text',[
            'user'=>$user,
            'email'=>$email,
            'text'=>$text]);
    }
}