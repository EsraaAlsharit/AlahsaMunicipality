<?php

     
        include 'DB.php';

        //delete
        $date= date("Y-m-d");//today
            $Day= date("l");//day
            $sqlb="DELETE FROM `booking` WHERE`schedule_id` IN( SELECT `schedule_id` FROM `schedules` WHERE `schedule_date`<'$date' );";
            mysqli_query($con, $sqlb);
            $sqlq="DELETE FROM schedules WHERE schedule_date < '$date'";
       mysqli_query($con, $sqlq);        
        
        
        //insert
        
        $flg=1;
         $sql="select * from areas";
        $result= mysqli_query($con, $sql);
       
        
         while ($row = mysqli_fetch_array($result)) {
             
             
             $Q="insert into schedules (schedule_date,schedule_time,area_id,schedule_state) VALUES ";
             $are= $row['area_id'];
             $time=array("8:00ص","8:30ص","9:00ص","9:30ص","10:00ص","10:30ص","11:00ص","11:30ص","12:00م","12:30م","1:00م","1:30م");
             
             $date_min= date("Y-m-d");//today
            $Day_min= date("l");//day
             $arrayDay=5;
             while ($arrayDay>0){
                
                 
                 if($Day_min=='Friday'){
                    $date1 = str_replace('-', '/', $date_min);
                        $date_min= date('Y-m-d',strtotime($date1 . "+2 days"));
                        $Day_min= date("l",strtotime($date_min));
                    
                }
                elseif($Day_min=='Saturday'){
                    $date1 = str_replace('-', '/', $date_min);
                        $date_min= date('Y-m-d',strtotime($date1 . "+1 days"));
                        $Day_min= date("l",strtotime($date_min));
                    
                }
                
                 $sql="select * from schedules where schedule_date='$date_min' AND area_id='$are'";
              $res= mysqli_query($con, $sql);
                $R = mysqli_num_rows($res);  
                
                    if($R==0){
                        
                        while ($flg){
                        
                        switch ($Day_min){

                        case 'Friday':
                        $date1 = str_replace('-', '/', $date_min);
                        $date_min= date('Y-m-d',strtotime($date1 . "+2 days"));
                        $Day_min= date("l",strtotime($date_min));
                        break;
                        case 'Saturday':
                          $date1 = str_replace('-', '/', $date_min);
                        $date_min = date('Y-m-d',strtotime($date1 . "+1 days"));
                        $Day_min= date("l",strtotime($date_min));
                        break;

                        case 'Sunday':
                        $arrayDay--;
                        foreach ($time as $t){

                        $Q.="('$date_min', '$t' , '$are', '1' ), ";
                        }
                        $date1 = str_replace('-', '/', $date_min);
                        $date_min = date('Y-m-d',strtotime($date1 . "+1 days"));
                        $Day_min= date("l",strtotime($date_min));
                        if($arrayDay==0){
                            $Day_min='none';
                        }
                        break;


                        case 'Monday':
                        $arrayDay--;
                        foreach ($time as $t){

                        $Q.="('$date_min', '$t' , '$are', '1' ), ";
                        }
                        $date1 = str_replace('-', '/', $date_min);
                        $date_min = date('Y-m-d',strtotime($date1 . "+1 days"));
                        $Day_min= date("l",strtotime($date_min));
                        if($arrayDay==0){
                            $Day_min='none';
                        }
                        break;

                        case 'Tuesday':
                        $arrayDay--;
                          //  echo $arrayDay;
                        foreach ($time as $t){

                        $Q.="('$date_min', '$t' , '$are', '1' ), ";
                        }
                        $date1 = str_replace('-', '/', $date_min);
                        $date_min = date('Y-m-d',strtotime($date1 . "+1 days"));
                        $Day_min= date("l",strtotime($date_min));
                        if($arrayDay==0){
                            $Day_min='none';
                        }
                        break;

                        case 'Wednesday':
                        $arrayDay--;
                        foreach ($time as $t){

                        $Q.="('$date_min', '$t' , '$are', '1' ), ";
                        }
                        $date1 = str_replace('-', '/', $date_min);
                        $date_min = date('Y-m-d',strtotime($date1 . "+1 days"));
                        $Day_min= date("l",strtotime($date_min));
                        if($arrayDay==0){
                            $Day_min='none';
                        }
                        break;

                        case 'Thursday':
                        $arrayDay--;
                        foreach ($time as $t){

                        $Q.="('$date_min', '$t' , '$are', '1' ), ";
                        }
                        $date1 = str_replace('-', '/', $date_min);
                        $date_min= date('Y-m-d',strtotime($date1 . "+3 days"));
                        $Day_min= date("l",strtotime($date_min));
                        if($arrayDay==0){
                            $Day_min='none';
                        }
                        break;



                        default:
                       
                            $flg=0;


                        }
                        
                        
                        }
                    }
                
                
                
                
                  $date1 = str_replace('-', '/', $date_min);
                  $date_min = date('Y-m-d',strtotime($date1 . "+1 days"));
                  $Day_min= date("l",strtotime($date_min));
                
                  $arrayDay--;
                 
             }//main
             
             $Q = substr($Q, 0, -2);
             $flg=1;
             $date_min= date("Y-m-d");//today
             $Day_min= date("l");//day 
                $update= mysqli_query($con, $Q);
         }
         
   