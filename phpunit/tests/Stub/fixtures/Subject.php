<?php
	class Subject
	{
		protected $observers = array();
		protected $name;

		public function __construct($name)
		{
			$this->name = $name;
		}

		public function getName()
		{
			return $this->name;
		}

		public function attach(Observer $observer)
		{
			$this->observers[] = $observer;
		}

		public function doSomething()
		{
			//do something...

			//notify observer
			$this->notify('something');
		}

		public function doSomethingBad()
		{
			foreach ($this->observers as $observer) {
				$observer->reportError(41, 'Something bad happend', $this);
			}
		}

		protected function notify($argument)
		{
			foreach ($this->observers as $observer) {
				$observer->update($argument);
			}
		}
	}