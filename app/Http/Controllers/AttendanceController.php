<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\User;
use App\Models\Attendance;
use Auth;
use Redirect;
use Mail;
use DB;
use Carbon\Carbon;
use DateTime;
//use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AttendanceController extends Controller
{
    //
    public function index(Request $request,$guruid=0)
    {

        $guru_id=0;
        $gurus=[];
        if(Auth::user()->user_type==1){
            if($guruid==0)$guru_id=$request->guru_id;
            else $guru_id=$guruid;
            $request->guru_id=$guru_id;
            $gurus=User::where('user_type','2')->where('status','1')->orderby('firstname','Asc')->get();
        } else if(Auth::user()->user_type==2){
            $guru_id=Auth::user()->id;
        }

        if($guru_id>0)$shishyas=User::where('guru_id',$guru_id)->where('user_type','3')->where('status','1')->orderby('firstname','Asc')->get();
        else $shishyas=User::where('user_type','3')->where('status','1')->orderby('firstname','Asc')->get();

        $data=Attendance::select('attendances.*', 'students.firstname as shishya_firstname','students.lastname as shishya_lastname', 'gurus.firstname as guru_firstname','gurus.lastname as guru_lastname')
        ->leftJoin('users as students', 'students.id', '=', 'attendances.shishya_id')->leftJoin('users as gurus', 'gurus.id', '=', 'attendances.guru_id');
       
        if(!empty($request->guru_id))$data->where('attendances.guru_id',$guru_id);
        if(!empty($request->shishya_id))$data->where('attendances.shishya_id',$request->shishya_id);
        if(!empty($request->from_date))$data->where('attendances.attendance_date','>=',date("Y-m-d",strtotime($request->from_date)));
        if(!empty($request->to_date))$data->where('attendances.attendance_date','<=',date("Y-m-d",strtotime($request->to_date)));
        if(!empty($request->attendance))$data->where('attendances.a0ttendance',$request->attendance);
        $data=$data->orderby('id','Desc')->paginate(10);

        $data->appends(['guru_id' => $request->guru_id,'shishya_id' => $request->shishya_id,'from_date' => $request->from_date,'to_date' => $request->to_date,'attendance' => $request->attendance]);
       
        return view('attendance.index',compact('data','gurus','shishyas'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function export_attendance(Request $request,$guruid=0)
    {

        $guru_id=0;
        $gurus=[];
        if(Auth::user()->user_type==1){
            if($guruid==0)$guru_id=$request->guru_id;
            else $guru_id=$guruid;
            $request->guru_id=$guru_id;
            $gurus=User::where('user_type','2')->where('status','1')->orderby('firstname','Asc')->get();
        } else if(Auth::user()->user_type==2){
            $guru_id=Auth::user()->id;
        }

        if($guru_id>0)$shishyas=User::where('guru_id',$guru_id)->where('user_type','3')->where('status','1')->orderby('firstname','Asc')->get();
        else $shishyas=User::where('user_type','3')->where('status','1')->orderby('firstname','Asc')->get();

        $data=Attendance::select('attendances.*', 'students.firstname as shishya_firstname','students.lastname as shishya_lastname', 'gurus.firstname as guru_firstname','gurus.lastname as guru_lastname')
        ->leftJoin('users as students', 'students.id', '=', 'attendances.shishya_id')->leftJoin('users as gurus', 'gurus.id', '=', 'attendances.guru_id');
       
        if(!empty($request->guru_id))$data->where('attendances.guru_id',$guru_id);
        if(!empty($request->shishya_id))$data->where('attendances.shishya_id',$request->shishya_id);
        if(!empty($request->from_date))$data->where('attendances.attendance_date','>=',date("Y-m-d",strtotime($request->from_date)));
        if(!empty($request->to_date))$data->where('attendances.attendance_date','<=',date("Y-m-d",strtotime($request->to_date)));
        if(!empty($request->attendance))$data->where('attendances.attendance',$request->attendance);
        $data=$data->orderby('id','Desc')->get();
 

        $data_array [] = array("Date", 	"Registration No.", "Shishya Name", "Guru Name", "Attendance" );
        foreach($data as $attendance)
        {
            $data_array[] = array(
                'attendance_date' =>date('d-m-Y',strtotime($attendance->attendance_date)),
                'registration_no' => 'RAVSH-'.$attendance->shishya_id.'-'.date('Y'),
                'shishya_name' => $attendance->shishya_firstname.' '.$attendance->shishya_lastname,
                'City' => $attendance->guru_firstname.' '.$attendance->guru_lastname,
                'PostalCode' => $attendance->attendance
            );
        }
        //return Excel::download($data_array, 'attendances.xlsx');
       
        //$this->ExportExcel($data_array);
        

    }

    public function ExportExcel($data){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($data);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="ShishyasAttendanceData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    public function add_attendance()
    {


        $data = User::select('users.*','gurus.firstname as guru_firstname','gurus.lastname as guru_lastname' )->leftJoin('users as gurus', 'gurus.id', '=', 'users.guru_id')->orderby('users.firstname','Asc')->orderBy('users.lastname','Asc')->where('users.user_type',"3")->where('users.guru_id',Auth::user()->id)->paginate(100);
   
        return view('attendance.add-attendance',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 100);

    }

    public function update_attendance(Request $request)
    {


        request()->validate([
            'guru_id' => 'required',
            'shishya_ids' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'attendance' => 'required',
        ]);

        $fdate = $request->from_date;
        $tdate = $request->to_date;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        for($i=0;$i<=$days;$i++){
            $date = Carbon::createFromFormat('Y-m-d',$request->from_date);
            $attendance_date = date("Y-m-d",strtotime($date->addDays($i)));  
            for($j=0;$j<count($request->shishya_ids);$j++){
                $data=[
                    'guru_id'=>$request->guru_id,
                    'shishya_id'=>$request->shishya_ids[$j],
                    'attendance_date'=>$attendance_date,
                    'attendance'=>$request->attendance,
                ];

                $attendance=Attendance::where('shishya_id',$request->shishya_ids[$j])->where('attendance_date',$attendance_date)->get()->first();
                if(!empty($attendance->id)){
                   $attendance->update($data);
                } else {
                    Attendance::create($data);
                }

            }

        }

        return redirect('/attendance-list')->with('success', 'Attendance updated successfully.');


    }


}
