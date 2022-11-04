<?php

namespace App;

use App\Models\Todo;

class Task {
  
  public $id;
  public $name;
  public $content;
  public $is_checked;
  
  public function __construct($id =null, $name=null, $content=null, $is_checked=null){
    $this->id = $id;
    $this->name = $name;
    $this->content = $content;
    $this->is_checked = $is_checked;
  }
  
  public function all(){
    $todoModel = new Todo();
		$todos     = $todoModel->all();

		foreach ($todos as $task) {
			$tasks[] = new Task(
				$task['id'],
				$task['name'],
				$task['content'],
				$task['is_checked']
			);
		}
    // echo '<pre>';
    // var_dump($tasks);
    // echo '</pre>';
    return $tasks;
  }
  
    
}