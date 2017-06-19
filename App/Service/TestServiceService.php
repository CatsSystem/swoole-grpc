<?php
// GENERATED CODE -- DO NOT EDIT!

namespace App\Service {

  abstract class TestServiceService {

    public function __construct() {
    }

    /**
     * @param \App\Message\TestRequest $argument input argument
     * @return \App\Message\TestResponse output argument
     **/
    abstract protected function Test(\App\Message\TestRequest $argument);

    /**
     * @param \mixed $data input data
     * @return \string output data
     **/
    public function runTest($data) {
      $argument = new \App\Message\TestRequest();
      if (method_exists($argument, 'decode')) {
        $argument->decode($data);
      } else {
        $argument->mergeFromString($data);
      }
      $output = $this->Test($argument);
      if (method_exists($output, 'encode')) {
        return $output->encode();
      } else if(method_exists($output, 'serializeToString')){
        return $output->serializeToString();
      }
      return '';
    }

  }

}
