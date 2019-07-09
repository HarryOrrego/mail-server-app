<?php
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Http\Request;
class ApiController extends Controller
{	
    public function CreateUserAction()
    {
        $response = new Response();
        $response->setContentType('application/json', 'UTF-8');
        $data_response = new DataResponse();

        $json_request = $this->request->getJsonRawBody();

        $user = new User();
        $user->name = $json_request->name;
        $user->email = $json_request->email;
        $user->password = $json_request->password;      
        

        if(!$user->save()){
            $data_response->success = false;
            $data_response->message = "No se pudo guardar";            
        }else{
            $data_response->success = true;
            $data_response->message = "Guardado correctamente";     
        }

        $response->setStatusCode(200 , 'Ok');
        $response->setJsonContent($data_response);
        return $response;
    }


    public function SendEmailAction()
    {
        $response = new Response();
        $response->setContentType('application/json', 'UTF-8');
        $data_response = new DataResponse();
        $emailService = new EmailController();

        $json_request = $this->request->getJsonRawBody();

        $email = new Email();
        $email->subject = $json_request->email->subject;
        $email->body = $json_request->email->body;
        $email->date = Utilities::GetDate();

        if(!$email->save()){
            $data_response->success = false;
            $data_response->message = Utilities::GetErrorMessage($email);
        }else{
            $data_response = $emailService->SendEmail($json_request->sender ,$json_request->receiverList,$email->id );

        }       

        $response->setStatusCode(200 , 'Ok');
        $response->setJsonContent($data_response);
        return $response;
    }





}