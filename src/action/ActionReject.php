<?php

    declare(strict_types = 1);

    namespace htmlacademy\action;

    use htmlacademy\ex\ActionParamsException;

    class ActionReject extends Action
    {

        public function __construct()
        {
            $this->actionName = 'Отказаться';
            $this->innerName = 'reject_action';
        }

        public function getPublicName() : string
        {
            return $this->actionName;
        }

        public function getInnerName() : string
        {
            return $this->innerName;
        }

        public function checkAccess(int $employerId, int $employeeId, int $userId) : bool
        {
            $requiredType = 'integer';
            $validParams = gettype($employerId) === $requiredType or gettype($employeeId) === $requiredType or
            gettype($userId) === $requiredType;

            if (!$validParams) {
                throw new ActionParamsException('Only Integer types are allowed');
            }
            return $employeeId === $userId and $employerId !== $userId;
        }
    }
