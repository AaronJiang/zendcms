<?php

class Contact_IndexController extends Zend_Controller_Action
{

    public function indexAction ()
    {
        $frmContact = new Contact_Form_Contact();
        if ($this->_request->isPost() && $frmContact->isValid($_POST)) {
            // get the posted data
            $sender = $frmContact->getValue('name');
            $email = $frmContact->getValue('email');
            $subject = $frmContact->getValue('subject');
            $message = $frmContact->getValue('message');
            
            // load the template
            $htmlMessage = $this->view->partial('templates/default.phtml', 
                    $frmContact->getValues());
            
            // Create using SMTP connection Object
            $configInfo = array(
                    'auth' => 'login',
                    'ssl' => 'ssl',
                    'username' => 'aaron.jijesoft@gmail.com',
                    'password' => 'jijesoft',
                    'port' => '465'
            );
            $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', 
                    $configInfo);
            
            $mail = new Zend_Mail();
            $mail->setSubject($subject);
            $mail->setFrom($email, $sender);
            $mail->addTo('jianglong14@gmail.com', 'webmaster');
            // add the file attachment
            $fileControl = $frmContact->getElement('attachment');
            if ($fileControl->isUploaded()) {
                $attachmentName = $fileControl->getFileName();
                $fileStream = file_get_contents($attachmentName);
                $attachment = $mail->createAttachment($fileStream);
                $attachment->filename = basename($attachmentName);
            }
            $mail->setBodyHtml($htmlMessage);
            $mail->setBodyText($message);
            // send the message
            $result = $mail->send($transport);
            // inform the view with the status
            $this->view->messageProcessed = true;
            if ($result) {
                $this->view->sendError = false;
            } else {
                $this->view->sendError = true;
            }
        }
        $frmContact->setAction('/contact');
        $frmContact->setMethod('post');
        $this->view->form = $frmContact;
    }
}