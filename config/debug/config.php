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


return [
    'project' => [
        'project_name'  => 'swoole-grpc',
        'pid_path'      => dirname(dirname(__DIR__)),

        'main_server'   => '\\grpc\\server\\MainServer',
    ],

    'server' => [
        'host'          => '0.0.0.0',
        'port'          => '9501',
        'socket_type'   => 'http2',
        'enable_ssl'    => false,

        'setting'   => [
            'worker_num'    => 1,
            'dispatch_mode' => 2,

            'daemonize'     => 0,
        ]
    ]
];