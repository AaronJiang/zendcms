<?php

class Contact_Form_Contact extends Zend_Form
{

    public function init ()
    {
        // create new element
        $name = $this->createElement('text', 'name');
        $name->setLabel('Enter your name:');
        $name->setRequired(TRUE);
        $name->setAttrib('size', 40);
        $this->addElement($name);
        
        $email = $this->createElement('text', 'email');
        $email->setLabel('Enter your email address:');
        $email->setRequired(TRUE);
        $email->setAttrib('size', 40);
        $email->addValidator('EmailAddress');
        $email->addErrorMessage('Invalid email address!');
        $this->addElement($email);
        
        $subject = $this->createElement('text', 'subject');
        $subject->setLabel('Subject:');
        $subject->setRequired(TRUE);
        $subject->setAttrib('size', 60);
        $this->addElement($subject);
        
        $attachment = $this->createElement('file', 'attachment');
        $attachment->setLabel('Attach a file');
        $attachment->setRequired(FALSE);
        $attachment->setDestination(APPLICATION_PATH . '/../uploads');
        $attachment->addValidator('Count', false, 1);
        $attachment->addValidator('Size', false, 102400);
        $attachment->addValidator('Extension', false, 'jpg, png, gif');
        $this->addElement($attachment);
        
        $message = $this->createElement('textarea', 'message');
        $message->setLabel('Message:');
        $message->setRequired(TRUE);
        $message->setAttrib('cols', 14);
        $message->setAttrib('rows', 5);
        $this->addElement($message);
        
        // configure the captcha service
        $privateKey = '6Lf9K-ISAAAAALs9SfUSiBjovGOTyDQfqvc7H_D2';
        $publicKey = '6Lf9K-ISAAAAAAQE1xXOkP_SADi8OPjaarhBoUXi';
        $recaptcha = new Zend_Service_ReCaptcha($publicKey, $privateKey);
        // create the captcha control
        $captcha = new Zend_Form_Element_Captcha('captcha', 
                array(
                        'captcha' => 'ReCaptcha',
                        'captchaOptions' => array(
                                'captcha' => 'ReCaptcha',
                                'service' => $recaptcha
                        )
                ));
        // add captcha to the form
        $this->addElement($captcha);
        
        $submit = $this->addElement('submit', 'submit', 
                array(
                        'label' => 'Send Message',
                        'class' => 'btn'
                ));
        
        $this->setAttrib('enctype', 'multipart/form-data');
    }
}