<?php
namespace Panadas\Event;

class Event extends \Panadas\Kernel\AbstractKernelAware
{

    private $name;
    private $params;
    private $stopped;

    /**
     * @param \Panadas\Kernel\Kernel $kernel
     * @param string                 $name
     * @param array                  $params
     */
    public function __construct(\Panadas\Kernel\Kernel $kernel, $name, array $params = [])
    {
        parent::__construct($kernel);

        $this
            ->setStopped(false)
            ->setName($name)
            ->setParams(new \Panadas\DataStructure\HashDataStructure($params));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $name
     * @return \Panadas\Event\Event
     */
    protected function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \Panadas\DataStructure\HashDataStructure
     */
    protected function getParams()
    {
        return $this->params;
    }

    /**
     * @param  \Panadas\DataStructure\HashDataStructure $params
     * @return \Panadas\Event\Event
     */
    protected function setParams(\Panadas\DataStructure\HashDataStructure $params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isStopped()
    {
        return $this->stopped;
    }

    /**
     * @param  boolean $stopped
     * @return \Panadas\Event\Event
     */
    public function setStopped($stopped)
    {
        $this->stopped = (bool) $stopped;

        return $this;
    }

    /**
     * @param  string $name
     * @param  mixed  $default
     * @return mixed
     */
    public function get($name, $default = null)
    {
        return $this->getParams()->get($name, $default);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->getParams()->getAll();
    }

    /**
     * @return array
     */
    public function getNames()
    {
        return $this->getParams()->getNames();
    }

    /**
     * @param  string $name
     * @return boolean
     */
    public function has($name)
    {
        return $this->getParams()->has($name);
    }

    /**
     * @return boolean
     */
    public function hasAny()
    {
        return $this->getParams()->hasAny();
    }

    /**
     * @param  string $name
     * @return \Panadas\Event\Event
     */
    public function remove($name)
    {
        $this->getParams()->remove($name);

        return $this;
    }

    /**
     * @return \Panadas\Event\Event
     */
    public function removeAll()
    {
        $this->getParams()->removeAll();

        return $this;
    }

    /**
     * @param  string $name
     * @param  mixed  $value
     * @return \Panadas\Event\Event
     */
    public function set($name, $value)
    {
        $this->getParams()->set($name, $value);

        return $this;
    }

    /**
     * @param  array $args
     * @return \Panadas\Event\Event
     */
    public function replace(array $args)
    {
        $this->getParams()->replace($args);

        return $this;
    }

    /**
     * @return \Panadas\Event\Event
     */
    public function stop()
    {
        return $this->setStopped(true);
    }
}