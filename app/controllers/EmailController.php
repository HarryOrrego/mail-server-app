<?php

use Phalcon\Mvc\Controller;
class EmailController {

    public function SendEmail($sender,$receiverList, $email)
    {
        $dataResponse = new DataResponse();
        $userEmailSender = new UserEmail();
        $userEmailSender->id_user = $sender;
        $userEmailSender->id_email = $email;
        $userEmailSender->is_sender = 1;
        if(!$userEmailSender->save()){
            $dataResponse->success = false;
            $dataResponse->message = Utilities::GetErrorMessage($userEmailSender);
            return $dataResponse;
        }
        

        foreach($receiverList as $receiverId){
            $userEmailReceiver = new UserEmail();
            $userEmailReceiver->id_user = $receiverId;
            $userEmailReceiver->id_email = $email;
            $userEmailReceiver->is_sender = 0;
        
            if(!$userEmailReceiver->save()){
                $dataResponse->success = false;
                $dataResponse->message = Utilities::GetErrorMessage($userEmailReceiver);
                return $dataResponse;
            }
        }
        $dataResponse->success = true;
        $dataResponse->message = "Email enviado correctamente";
        return $dataResponse;

    }

}



?>