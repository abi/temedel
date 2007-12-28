<?php 
class TreeHelper extends Helper
{
  var $listcom = array();

  function get($name, $data)
  {
    list($modelName, $fieldName) = explode('/', $name);
    
    $this->list_element($data, $modelName, $fieldName, 0);
    
    debug($this->listcom);
    
    return $this->listcom;
  }
  
  function list_element($data, $modelName, $fieldName, $level)
  {

    foreach ($data as $key=>$val)
    {
      
      //debug($this->renderElement('comment', array("comment" => $val, "indent" => $level)));
      
      $val[$modelName]['indent'] = $level;
      array_push($this->listcom, $val[$modelName]);

      if(isset($val['children'][0]))
      {
         $this->list_element($val['children'], $modelName, $fieldName, $level+1);
      }
      else
      {
      }
    }
    
    return 0;
  }
}
?> 

