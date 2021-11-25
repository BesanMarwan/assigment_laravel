<?php
namespace App\Traits;


Trait ApiResponse{

    public function ApiResponse($message,$datakey,$data,$extraData=[],$errorsArray=[],$success=true,$statusCode=200){

        $Apidata=[
            'success'=>$success,
            'message'=>$message,
            "$datakey"=>$data
        ];
        foreach($extraData as $key=>$data){
            $Apidata[$key]=$data;
        }

        $errors = [];
        if(count($errorsArray)){
            foreach ($errorsArray as $key => $value) {
                if($key == 'email')
                    $key = 'message';
//                $errors[$key]=$valuee = is_array($value) ? implode(',', $value) : $value;
                $valuee = is_array($value) ? implode(',', $value) : $value;
                array_push($errors,$valuee);
                //implode is for when you have multiple errors for a same key
                //like email should valid as well as unique
            }
        }

        $Apidata['errors'] = $errors;

        return response()->json($Apidata,$statusCode);
    }

}
