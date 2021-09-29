<?php

use TaskForce\Task;

require_once "vendor/autoload.php";

if (!(php_sapi_name() == "cli")) {
    print '<pre>';
}
ini_set('zend.assertions', 1);

$task = new Task(5, 7);
assert($task->getContractorId() === 5);
assert($task->getCustomerId() === 7);
assert($task->getStatus() === Task::STATUS_NEW);
assert(count($task->getStatusesMap()) === 5);
assert(count($task->getActionsMap()) === 4);
assert(count($task->getCurrentStatusActions()) === 2);
assert(count($task->getStatusActions(Task::STATUS_FAILED)) === 0);
assert($task->getActionTargetStatus('any') === '');
assert($task->getActionTargetStatus(Task::ACTION_FAIL) === Task::STATUS_FAILED);

print 'Test finished.';
