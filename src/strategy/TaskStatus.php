<?php
    /**
    *
    * Класс для определения активного статуса задания
    * @author <sevostyanova@gmail.com>
    */

    namespace YiiTaskForce\Strategy;

    use YiiTaskForce\Actions\Action;
    use YiiTaskForce\Actions\ActionCancel;
    use YiiTaskForce\Actions\ActionRespond;
    use YiiTaskForce\Actions\ActionFinish;
    use YiiTaskForce\Actions\ActionPay;
    use YiiTaskForce\Actions\ActionRefuse;


    class TaskStatus
    {
    // роли пользователей
       public const CLIENT = 'client';
       public const DOER = 'executor';

    // статусы задания
        public const STATUS_NEW = 'new';
        public const STATUS_CANCEL = 'cancel';
        public const STATUS_INPROCESS = 'inprogress';
        public const STATUS_FINISH = 'finished';
        public const STATUS_PAID = 'paid';
        public const STATUS_FAILED = 'failed';

    // действия заказчика и исполнителя
        public const ACTION_ORDER = 'create';
        public const ACTION_CANCEL = 'cancel';
        public const ACTION_PAY = 'pay';
        public const ACTION_DO ='respond';
        public const ACTION_FINISH = 'job_is_done';

    // свойства класса TaskStatus
        public $clientId = 0; //id заказчика
        public $doerId = 0; //id исполнителя
        public $taskFinishDate = ""; //дата окончания работы по заказу
        public $activeStatus = 'new'; // активный статус заказа

        private static $actions = [
                        1 => self::ACTION_ORDER,
                        2 => self::ACTION_CANCEL,
                        3 => self::ACTION_DO,
                        4 => self::ACTION_FINISH,
                        5 => self::ACTION_PAY
                        ];

        private static $statuses = [
                        1 => self::STATUS_NEW,
                        2 => self::STATUS_CANCEL,
                        3 => self::STATUS_INPROCESS,
                        4 => self::STATUS_FINISH,
                        5 => self::STATUS_PAID,
                        6 => self::STATUS_FAILED
                        ];

    // методы класса TaskStatus

        public function getActions ()
        { //получение массива действий
            return self::$actions;
        }

        public function getStatuses ()
        { //получение массива статусов задания
            return self::$statuses;
        }

        public function getActiveStatus (string $act)
        { // определяем активный статус
            switch ($act) {

                case ActionCancel::getClassName():
                    return self::STATUS_CANCEL;

                case ActionRespond::getClassName():
                    return self::STATUS_INPROCESS;

                case  ActionFinish::getClassName():
                    return self::STATUS_FINISH;

                case ActionPay::getClassName():
                    return self::STATUS_PAID;

                case ActionRefuse::getClassName():
                    return self::STATUS_FAILED;
            }

                return $this->activeStatus;
        }
    }
