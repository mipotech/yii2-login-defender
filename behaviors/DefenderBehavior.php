<?php

namespace mipotech\loginDefender\behaviors;

use Yii;
use yii\base\Behavior;
use yii\base\Controller;

class DefenderBehavior extends Behavior
{
    /**
     * @var array $actions the actions relevant to this behavior.
     * If empty, the behavior will be applied to all actions.
     */
    public $actions = [];

    /**
     * @var integer $attemptsTimePeriod
     */
    public $attemptsTimePeriod = 10;

    /**
     * @var integer $blockDuration how long to block the user one he has reached the limit of `$maxAttempts`
     */
    public $blockDuration = 20;

    /**
     * @var integer $maxAttempts the maximum number of attempts allowed within `$attemptsTimePeriod` minutes
     */
    public $maxAttempts = 3;


    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'checkAccess',
        ];
    }

    /**
     *
     * @param yii\base\ActionEvent $event
     */
    public function checkAccess($event)
    {
        // Check if the action is relevant
        if (!empty($this->actions) && !in_array($event->action->id, $this->actions)) {
            return;
        }

        // @@@
    }
}
