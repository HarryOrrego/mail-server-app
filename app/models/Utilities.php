<?php

class Utilities {
    public static function GetDate($format = "Y-m-d H:i:s")
    {
        date_default_timezone_set('America/Bogota');
        return date($format);
    }

    public static function GetErrorMessage($entity)
    {
        $errorMessage = "";
        foreach ($entity->getMessages() as $message) {
            $errorMessage = $errorMessage . " " . $message;
        }
        return $errorMessage;
    }
}

?>