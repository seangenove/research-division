<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 11/14/2017
 * Time: 6:51 PM
 */

namespace App\Http;


use App\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogUtility
{

    /**
     * Inserts a log entry on the Log model
     * @param $message Message on log
     * @param $user String that represents a user
     */
    public static function insertLog($message, $user)
    {
        // log message, ip, and user
        $log = new Log();
        $log->message = $message;
        $log->user = $user;
        $log->ip = '127.0.0.1 test'; // TODO
        $log->save();
    }
}