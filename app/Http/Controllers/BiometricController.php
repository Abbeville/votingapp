<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Finger;

class BiometricController extends Controller
{
    public static function getVerificationLink($id)
    {
        // $url = url('finger/verify/' . $id);
        // return 'finspot:FingerspotVer;' . base64_encode(url('finger/verify/' . $id));
        return 'finspot:FingerspotVer;' . base64_encode('localhost/votingapp/public/biometric/verification.php?user_id='.$id);
    }

    public static function getRegistrationLink($student_id)
     {
         return 'finspot:FingerspotReg;' . base64_encode(url('finger/register/' . $student_id));
     }

    public function checkreg($student_id, $current){
        $finger_temp = Finger::where('student_id', $student_id)->count();

        if (intval($finger_temp) > intval($current)) {
           $res['result'] = true;        
           // $res['current'] = intval($data1['ct']);         
           $res['current'] = intval($finger_temp);         
        }
        else
        {
           $res['result'] = false;
        }
        echo json_encode($res);
        // return Response::json($result, true);
    }

    public function registerFinger($student_id){
        echo $student_id.";SecurityKey;17;localhost/votingapp/public/biometric/process_register.php;".url('finger/ac');
        // Biometrik::getRegistrationLink($student_id);

    }

    /*From the user verification end*/
    public function verifyFinger($student_id){
        $finger_data = Finger::where('student_id', $student_id)->pluck();
        echo $student_id . ";". $finger_data.";SecurityKey;15;".'localhost/votingapp/public/biometric/process_verifcation.php' .";". url('finger/ac').";extraParams";
    }

    public function getac(){
       // if (isset($_GET['vc']) && !empty($_GET['vc'])) {
          
          // $data = DevCon::getDeviceAcSn($_GET['vc']);
          $devices = config('biometrik.devices');
          $device = [];
          foreach ($devices as $device) {
              if($device['vc'] === '95B4752CDA81802'){
                  // echo $device['ac'].$device['sn'];
                  $dev['ac']= $device['ac'];
                  $dev['sn']= $device['sn'];
              }
              break;
          }
          echo $dev['ac'].$dev['sn'];
          
       // }
    }

    public function message($msg){
       return $msg;
    }
}
