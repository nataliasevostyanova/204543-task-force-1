<?php

    namespace YiiTaskForce\Actions;

    class ActionRefuse extends AbstractAction
    {
        public static function getClassName ()
        {
            return self::class;
        }

        public static function getInnerName ()
        {
            $innerName = 'to_refuse';

            return $innerName;
        }

        /**
        * функция проверки права пользователя на выполнение действия
        * @param $userId;
        * @param $clientId;
        * @param $executorId;
        * @return bool;
        */

        public static function checkUserAccess  (int $userId, int $clientId, int $executorId ) : bool {

           return $userId == $executorId;
        }
    }
