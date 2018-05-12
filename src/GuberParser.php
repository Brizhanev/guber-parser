<?php

namespace GuberParser;

use phpQuery;

class GuberParser {

  private static $url = "http://www.presidentrussia.ru/gubernatory/";
  private $htmlMarkup;
  private $records = array();
  private $storage;

  function __construct() {
  }

  public function setStorage($storage) {
    $this->storage = $storage;
  }

  private function loadMarkup() {
    $this->htmlMarkup = file_get_contents(self::$url);
  }

  public function getRecords() {
    return $this->records;
  }

  public function run() {

    $this->loadMarkup();

    if ($this->htmlMarkup) {

      phpQuery::newDocumentHTML($this->htmlMarkup);

      $rows = pq('.content_body table tr:not(:first-child)');

      foreach ($rows as $row) {

        $this->records[] = array(
          "region" => mb_convert_encoding(pq($row)->find('td:first-child')->text(), "UTF-8"),
          "fullname" => mb_convert_encoding(pq($row)->find('td:last-child')->text(), "UTF-8")
        );

      }

      if ($this->records && $this->storage) {

        $this->storage->save($this->records);

      }

    }

  }


}