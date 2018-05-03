<?php
/*** DB CLASS ***/
  class simple_json_db{
    public $path = '';
    public $db = array();

    public function __construct($path = "db.json"){
      //Set the path
      $this->path = $path;

      //Create the db, if it doesn't exists
      if(!file_exists($path)){
        $fp = fopen($path.".json", "wb");
        fwrite($fp, "{}"); // -> Empty json object
        fclose($fp);
      }

      //Get the contect of the current path
      $this->db = json_decode(file_get_contents($path), true);
    }

    //Save the db
    public function save(){
      $json = ($this->db == "{}") ? $this->db : json_encode($this->db);

      file_put_contents($this->path, $json);
    }

    //Add new
    public function insert($data, $key = ""){
      if($key != "")
        $this->db[$key] = $data;
      else
        $this->db[] = $data;

      //Save the db updated
      $this->save();
    }

    //Remove field
    public function delete($key){
      unset($this->db[$key]);

      //Save the db updated
      $this->save();
    }

    //Get single
    public function getSingle($key){
      return $this->db[$key];
    }

    //Get a list
    public function getList($conditions = array()){
      $result = array();

      //Missing conditions, select all
      if(empty($conditions)){
        $result = $this->db;
      }else{
        foreach($this->db as $key => $value){
          //If the result meets the requirements
          $requirements = true;

          foreach($conditions as $k => $v){
            if($value[$k] != $v){
                $requirements = false;
            }
          }

          if($requirements) $result[$key] = $value;
        }
      }

      return $result;
    }

    //Clear the db
    public function clear(){
      $this->db = "{}";

      $this->save();
    }
  }
/*** ./DB CLASS ***/
?>
