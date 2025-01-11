<?php

namespace Core;

class Session
{
    public static function has($key)
    {
        return (bool)static::get($key);
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function flush()
    {
        // clear session superglobal
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();

        // delete session file in temp (where? php --info | find "session.save_path")
        session_destroy();

        // delete cookie (in browser)
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}


