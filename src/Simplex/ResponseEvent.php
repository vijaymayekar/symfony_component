<?php

namespace Simplex;


use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseEvent extends Event {
  private $request;
  private $response;
  function __construct(Response $response, Request $request)
  {
    $this->request = $request;
    $this->response = $response;
  }

  function getResponse() {
    return $this->response;
  }
  function getRequest() {
    return $this->request;
  }
}