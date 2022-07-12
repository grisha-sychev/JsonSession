<?php

class JsonSession
{
  private $path;
  private $array;

  public function file($file)
  {
    mkdir($_SERVER['DOCUMENT_ROOT'].'/src/JsonSession/', 0755);
    $this->path = $_SERVER['DOCUMENT_ROOT'].'/src/JsonSession/'.$file.'.json';
    $json = @file_get_contents($this->path);
    $array = (array) json_decode($json, true);
    return $this->array = $array;
  }

  public function set($key = [], $val = '')
  {
    $this->array[$key] = $val;
    $json = json_encode($this->array, JSON_UNESCAPED_UNICODE);
    file_put_contents($this->path, $json);
  }

  public function get($key = [])
  {
    return $this->array[$key];
  }


  public function del($key = [])
  {
    unset($this->array[$key]);
    $json = json_encode($this->array, JSON_UNESCAPED_UNICODE);
    file_put_contents($this->path, $json);
  }

}
