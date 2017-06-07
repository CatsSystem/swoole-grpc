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

namespace grpc;

use core\component\config\Config;
use core\server\IServer;
use core\server\SwooleServer;

class Entrance
{
    public static function run()
    {
        $server = new SwooleServer(Config::get('server'));

        $main_server_class = Config::getField('project', 'main_server');
        if(!class_exists($main_server_class))
        {
            throw new \Exception("No class {$main_server_class}");
        }
        $main_server = new $main_server_class(
            Config::getField('project', 'project_name'),
            Config::getField('project', 'pid_path')
        );
        if(!($main_server instanceof IServer))
        {
            throw new \Exception("{$main_server_class} is not IServer");
        }
        $server->run($main_server);
    }
}