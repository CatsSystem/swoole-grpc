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

use grpc\Entrance;

function usage()
{
    echo "php run.php start | restart | stop | reload [-c config_path]\n";
}

if( !isset($argv[1]) )
{
    usage();
    exit;
}

$cmd = $argv[1];

if( isset($argv[2]) &&  $argv[2] == '-c' ) {
    $debug = $argv[3];
} else {
    $debug = "debug";
}

\core\component\config\Config::load(__DIR__ . "/config/{$debug}/");

$config = \core\component\config\Config::get('project');

$pid_path = $config['pid_path'] . '/' . $config['project_name'] . '_master.pid';
$manager_pid_path = $config['pid_path'] . '/' . $config['project_name'] . '_manager.pid';

switch($cmd)
{
    case 'start':
    {

        Entrance::run();
        break;
    }
    case 'restart':
    {

        shell_exec("kill -15 `cat {$manager_pid_path}`");
        shell_exec("kill -15 `cat {$pid_path}`");
        echo "restarting...\n";
        sleep(3);

        Entrance::run();
        break;
    }
    case 'stop':
    {
        shell_exec("kill -15 `cat {$manager_pid_path}`");
        shell_exec("kill -15 `cat {$pid_path}`");
        break;
    }
    case 'reload':
    {
        shell_exec("kill -USR1 `cat {$manager_pid_path}`");
        shell_exec("kill -USR1 `cat {$pid_path}`");
        break;
    }
}
