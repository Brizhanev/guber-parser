<?php

namespace GuberParser;

class JSON implements StorageInterface
{

  private $filename;
  private $fileHandle;

  public function __construct($filename)
  {
    $this->filename = $filename;
  }

  private function open()
  {
    if (is_null($this->fileHandle)) {
      $this->fileHandle = fopen($this->filename, "w");
    }
  }

  public function close()
  {
    if ($this->fileHandle) {
      fclose($this->fileHandle);
      $this->fileHandle = null;
    }
  }

  public function save($records)
  {
    $this->open();
    fwrite($this->fileHandle, json_encode($records, JSON_UNESCAPED_UNICODE) . PHP_EOL);
  }

  public function __destruct()
  {
    $this->close();
  }

}