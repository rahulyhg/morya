<?php
class EmailCommand extends CConsoleCommand
{
   public function run() {
		$criteria=new CDbCriteria;
		$criteria->order = 'priority DESC';
		$emails =  Email::model()->findAll($criteria);
			 
		// Get mailer
		$SM = Yii::app()->swiftMailer;
	 
		// Get config
		$mailHost = Yii::app()->params['smtp'];
		$mailPort = Yii::app()->params['smtpPort']; // Optional
	 
		// New transport
		$Transport = $SM->smtpTransport($mailHost, $mailPort)
					  ->setUsername(Yii::app()->params['doNotReplyEmail'])
					  ->setPassword(Yii::app()->params['doNotReplyPass']);
		// Mailer
		$Mailer = $SM->mailer($Transport);
		 
		foreach($emails as $email)
		{
			// New message
		$Message = $SM
			->newMessage($email->subject)
			->setFrom(array(Yii::app()->params['doNotReplyEmail']))
			->setTo(array(Yii::app()->params['email_to']))
			->addPart($email->body_html, 'text/html')
			->setBody($email->body_plain);
	
		// Send mail
		$result = $Mailer->send($Message);
		}
	}
}