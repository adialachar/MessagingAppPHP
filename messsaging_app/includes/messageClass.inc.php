<?php

	session_start();
	class Message{


		public $sender;
		
		public $senderID;

		private $rID;

		private $recipient;
		
		public $message;

		public function __construct($sender, $senderId, $rID, $recipient, $message){

			$this->sender = $sender;
			$this->senderID = $senderID;
			$this->rID = $rid;
			$this->recipient = $recipient;
			$this->message = $message;
		}


		public function hello(){


			echo "Hi, I'm a message!";


		}




	}
