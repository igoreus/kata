<?php

namespace Kata\Util\StopWatch;

/**
 * @author Igor Veremchuk igor.veremchuk@rocket-internet.de
 */
class StopWatch
{
    const START_INDEX = 0;
    const STOP_INDEX = 1;
    const STOP_PAUSE_FLAG = 2;
    const STOP_FULL_TIME = 3;
    const DEFAULT_PRECISION = 3;

    /**
     * @var array
     */
    protected $events = [];

    /**
     * @param string $event
     * @return $this
     * @throws \Exception
     */
    public function start($event = 'default')
    {
        if ($this->isStarted($event) && !$this->isPaused($event)) {
            throw new \Exception('Event has been already started');
        }

        $this->events[$event] = [
            $this->getNow(),
            null,
            0,
            (isset($this->events[$event]) ? $this->events[$event][static::STOP_FULL_TIME] : 0),
            ];

        return $this;
    }

    /**
     * @param string $event
     * @return float
     * @throws \Exception
     */
    public function pause($event = 'default')
    {
        if ($this->isPaused($event)) {
            throw new \Exception('Event[' . $event . '] has been already paused. Please use start method');
        }

        if (!$this->isStarted($event)) {
            throw new \Exception('Event has not been already started');
        }

        $this->events[$event][static::STOP_FULL_TIME] +=
            $this->getNow() - $this->events[$event][static::START_INDEX];

        $this->events[$event][static::STOP_PAUSE_FLAG] = 1;

        return $this->getDuration($event);
    }

    /**
     * @param string $event
     * @return float
     * @throws \Exception
     */
    public function stop($event = 'default')
    {
        if (!$this->isStarted($event) || $this->isFinished($event)) {
            throw new \Exception($this, 'Event has not been started or already finished');
        }
        $this->events[$event][static::STOP_INDEX] = $this->getNow();

        $this->events[$event][static::STOP_FULL_TIME] +=
            !$this->isPaused() ? $this->events[$event][static::STOP_INDEX] - $this->events[$event][static::START_INDEX] : 0;

        return $this->getDuration($event);
    }

    /**
     * @param string $event
     * @return $this
     */
    public function reset($event = 'default')
    {
        unset($this->events[$event]);

        return $this;
    }

    /**
     * @param string $event
     * @return float
     */
    public function getDuration($event = 'default')
    {
        return $this->formatTime($this->events[$event][static::STOP_FULL_TIME]);
    }

    /**
     * @param $time
     * @param int $precision
     *
     * @return float
     */
    protected function formatTime($time, $precision = self::DEFAULT_PRECISION)
    {
        return round($time, $precision);
    }

    /**
     * @param string $event
     * @return bool
     */
    protected function isStarted($event = 'default')
    {
        return isset($this->events[$event]) && $this->events[$event][static::STOP_INDEX] === null;
    }

    /**
     * @param string $event
     * @return bool
     */
    protected function isPaused($event = 'default')
    {
        return isset($this->events[$event]) && $this->events[$event][static::STOP_PAUSE_FLAG] == 1;
    }

    /**
     * @param string $event
     * @return bool
     */
    protected function isFinished($event = 'default')
    {
        return isset($this->events[$event]) && $this->events[$event][static::STOP_INDEX] !== null;
    }

    /**
     * @return float
     */
    protected function getNow()
    {
        return microtime(true);
    }
}
