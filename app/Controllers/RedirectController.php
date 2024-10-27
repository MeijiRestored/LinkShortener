<?php

namespace Meiji\LinkShortener\Controllers;

use eftec\bladeone\BladeOne;

class RedirectController
{
  protected BladeOne $blade;
  protected array $mappings;

  public function __construct(BladeOne $blade)
  {
    $this->blade = $blade;
    $this->loadMappings();
  }

  protected function loadMappings(): void
  {
    $json = file_get_contents(__DIR__ . '/../Config/config.json');
    $this->mappings = json_decode($json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      $this->mappings = [];
    }
  }

  public function handleRedirect($id): void
  {
    if (isset($this->mappings[$id])) {
      $url = $this->mappings[$id];

      header("HTTP/1.1 301 Moved Permanently");
      header("Location: $url");
      exit();
    } else {
      http_response_code(404);
      echo $this->blade->run('404');
    }
  }
}
