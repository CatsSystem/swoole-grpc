<?php
/*******************************************************************************
 *  This file is part of swoole-grpc.
 *
 *  swoole-grpc is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  swoole-grpc is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *******************************************************************************
 * Author: Lidanyang  <simonarthur2012@gmail.com>
 ******************************************************************************/

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/../vendor/autoload.php";

require_once __DIR__ . "/rpc_grpc_pb.php";

$client = new \App\Service\TestServiceClient("0.0.0.0:9501", [
    'credentials' => \Grpc\ChannelCredentials::createInsecure(),
]);

$request = new \App\Service\TestRequest();
$request->setName("Name");
$request->setId(1);
$request->setFlag(true);

list($reply, $status) = $client->Test($request)->wait();
var_dump($reply);
var_dump($reply->getStatus());