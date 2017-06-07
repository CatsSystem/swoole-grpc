<?php
// GENERATED CODE -- DO NOT EDIT!

namespace App\Service {

  class TestServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
      parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \App\Service\TestRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Test(\App\Service\TestRequest $argument,
      $metadata = [], $options = []) {
      return $this->_simpleRequest('/App.Service.TestService/Test',
      $argument,
      ['\App\Service\TestResponse', 'decode'],
      $metadata, $options);
    }

  }

}
