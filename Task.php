<?php

class Task
{
    const STATUS_NEW = 'new';
    const STATUS_CANCELED = 'canceled';
    const STATUS_WORKING = 'working';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';

    const ACTION_CANCEL = 'cancel';
    const ACTION_WORK = 'work';
    const ACTION_COMPLETE = 'complete';
    const ACTION_FAIL = 'fail';

    const STATUSES_MAP = [
        self::STATUS_NEW => 'Новое',
        self::STATUS_CANCELED => 'Отменено',
        self::STATUS_WORKING => 'В работе',
        self::STATUS_COMPLETED => 'Выполнено',
        self::STATUS_FAILED => 'Провалено',
    ];

    const ACTIONS_MAP = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_WORK => 'Выполнять',
        self::ACTION_COMPLETE => 'Завершить',
        self::ACTION_FAIL => 'Отметить проваленным',
    ];

    const STATUSES_ACTIONS = [
        self::STATUS_NEW => [
            self::ACTION_CANCEL,
            self::ACTION_WORK,
        ],
        self::STATUS_WORKING => [
            self::ACTION_CANCEL,
            self::ACTION_FAIL,
        ],
    ];
    const ACTIONS_TARGET_STATUS = [
        self::ACTION_CANCEL => self::STATUS_CANCELED,
        self::ACTION_WORK => self::STATUS_WORKING,
        self::ACTION_COMPLETE => self::STATUS_COMPLETED,
        self::ACTION_FAIL => self::STATUS_FAILED,
    ];

    private int $contractorId;
    private int $customerId;
    private string $status;

    public function __construct(int $contractorId = 0, int $customerId = 0, string $status = self::STATUS_NEW)
    {
        $this->contractorId = $contractorId;
        $this->customerId = $customerId;
        $this->status = $status;
    }

    public function getContractorId(): int
    {
        return $this->contractorId;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getStatusesMap(): array
    {
        return self::STATUSES_MAP;
    }

    public function getActionsMap(): array
    {
        return self::ACTIONS_MAP;
    }

    public function getCurrentStatusActions(): array
    {
        $actions = [];
        if (isset(self::STATUSES_ACTIONS[$this->status])) {
            $actions = self::STATUSES_ACTIONS[$this->status];
        }

        return $actions;
    }

    public function getStatusActions(string $status = ''): array
    {
        $actions = [];
        if (isset(self::STATUSES_ACTIONS[$status])) {
            $actions = self::STATUSES_ACTIONS[$this->status];
        }

        return $actions;
    }

    public function getActionTargetStatus(string $action = ''): string
    {
        $targetStatus = '';
        if (isset(self::ACTIONS_TARGET_STATUS[$action])) {
            $targetStatus = self::ACTIONS_TARGET_STATUS[$action];
        }

        return $targetStatus;
    }

}
