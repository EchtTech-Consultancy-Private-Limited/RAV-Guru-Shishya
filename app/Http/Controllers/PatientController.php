<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Patient;
use App\Models\User;
use App\Models\Remark;
use App\Models\PatientHistoryLog;
use App\Models\FollowUpPatient;
use App\Models\FollowUpHistoryLog;
use Auth;
use Redirect;
use Mail;
use App\Mail\SendMail;
use App\Mail\SendPhr;
use App\Mail\SendPhrAdmin;
use App\Mail\PhrAdmin;
use App\Mail\PhrGuruShishya2;
use App\Mail\PhrGuruShishya;
use Carbon\Carbon;
use PDF;

use DB;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
       /*  $this->middleware('permission:patient-list|patient-create|patient-edit|patient-delete', ['only' => ['index','show']]);
         $this->middleware('permission:patient-create', ['only' => ['create','store']]);
         $this->middleware('permission:patient-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:patient-delete', ['only' => ['destroy']]);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patients = Patient::latest()->paginate(5);
        return view('patients.index',compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')
                        ->with('success','Patient created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patients.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //dd("$patient");
        return view('patients.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')
                        ->with('success','Phr details update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
                        ->with('success','Patient deleted successfully');
    }

    /*public function patients_history()
    {
        return view("patients.patients-history");
    }


    public function manage_history_sheet()
    {
        $guru=get_guru_list(Auth::user()->guru_id);
        return view("patients.manage-history-sheet",['guru'=>$guru]);
    }*/

    public function new_patient_registration(Request $request , $id ='')
    {
        $shishyaId = ($id == '' ? Auth::user()->id : $id);
        $data=Patient::with('patientHistory')->where(['shishya_id'=>$shishyaId,'soft_delete' => 0]);
        if(!empty($request->prno))$data->where('patients.registration_no',$request->prno);
        if(!empty($request->from_date))$data->where('patients.registration_date','>=',date("Y-m-d",strtotime($request->from_date)));
        if(!empty($request->to_date))$data->where('patients.registration_date','<=',date("Y-m-d",strtotime($request->to_date)));
        $patientlist=$data->orderby('updated_at','Desc')->get();
        $guru=get_guru_list(Auth::user()->guru_id);
        return view("patients.new-patient-registration",['guru'=>$guru],compact("patientlist"));
    }

    public function add_history_sheet()
    {
        /*$guru=get_guru_list(Auth::user()->guru_id);*/
        $guru_id=Auth::user()->guru_id;
        //$guru=User::find($guru_id);

        $guru=DB::table('users')->where('users.id',$guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        return view("patients.add-history-sheet",['guru'=>$guru]);
    }

    public function follow_up_patients(Request $request)
    {
        $data=FollowUpPatient::with('followUpHistory')->select('follow_up_patients.*','patients.patient_name', 'students.firstname as shishya_firstname','students.lastname as shishya_lastname', 'gurus.firstname as guru_firstname','gurus.lastname as guru_lastname')
        ->leftJoin('patients', 'patients.id', '=', 'follow_up_patients.patient_id')->leftJoin('users as students', 'students.id', '=', 'follow_up_patients.shishya_id')->leftJoin('users as gurus', 'gurus.id', '=', 'follow_up_patients.guru_id');

        if(Auth::user()->user_type==3){
            $data->where('follow_up_patients.shishya_id',Auth::user()->id);
        } elseif(Auth::user()->user_type==2){
            $data->where('follow_up_patients.guru_id',Auth::user()->id);
            
        } elseif(Auth::user()->user_type==1){
            if(isset($request->guru_id)) $data->where('follow_up_patients.guru_id',$request->guru_id);
            // $data->where('follow_up_patients.send_to_admin',1);
        }
        
        if(!empty($request->prno)){            
            $data->where('follow_up_patients.registration_no',$request->prno);
        }
       
        if(!empty($request->from_date)){
            $data->where('follow_up_patients.follow_up_date','>=',date("d-m-Y",strtotime($request->from_date)));
        }
       
        if(!empty($request->to_date)){
            $data->where('follow_up_patients.follow_up_date','<=',date("d-m-Y",strtotime($request->to_date)));
        }
        if(!empty($request->report_type))
        {
            $data->where('follow_up_patients.report_type',$request->report_type);
        }
        $data=$data->orderby('updated_at','Desc')->paginate(10);
        $guru=get_guru_list(Auth::user()->guru_id);
        $gurus=get_guru_list();
        return view("patients.follow-up-patients",['guru'=>$guru,'gurus'=>$gurus,'data'=>$data])->with('i', (request()->input('page', 1) - 1) * 10);;
    }

    public function find_phr_registration(Request $request)
    {        
        if(empty($request->registration_no)){
            return Response::json(['message'   => 'Enter registration no.']);
        }
        $alreayFollowUp = FollowUpPatient::where('registration_no',$request->registration_no)->where('shishya_id',Auth::user()->id)->first();
        if($alreayFollowUp){
            return Response::json(['message'   => 'This registration no. already follow !']);
        }
        $data=Patient::where('registration_no',$request->registration_no)->where('shishya_id',Auth::user()->id)->get();
        if(count($data)>0){
            $data=$data->first();
            return Response::json(['id' =>encrypt($data->id) ,'firstname'=>$data->firstname,'middlename'=>$data->middlename,'lastname'=>$data->lastname ,'message'   => 'This registration no. is found in recorsd.']);
        } else {
            return Response::json(['message'   => 'This registration no. is not found in record.']);
        }

    }
    public function follow_up_sheet(Request $request,$patientid,$fdate=0,$tdate=0,$rtype='0')
    {

        if($patientid!=0)$patientid=decrypt($patientid);

        if(empty($patientid)||$patientid==0){
            return redirect('/follow-up-patients')->with('error', 'Patient registration not found.');
        }

        $patient=Patient::find($patientid);

        if(isset($patient)){
            $data=Array();
            $guru=User::find($patient->guru_id);
            $shishya=User::find($patient->shishya_id);
            $data=FollowUpPatient::select('follow_up_patients.*', 'students.firstname as shishya_firstname','students.lastname as shishya_lastname', 'gurus.firstname as guru_firstname','gurus.lastname as guru_lastname')
        ->leftJoin('users as students', 'students.id', '=', 'follow_up_patients.shishya_id')->leftJoin('users as gurus', 'gurus.id', '=', 'follow_up_patients.guru_id');


        if(Auth::user()->user_type==3){
            $data->where('follow_up_patients.shishya_id',Auth::user()->id);
        } if(Auth::user()->user_type==2){
            $data->where('follow_up_patients.guru_id',Auth::user()->id);
        }

        if($patientid>0)$data->where('follow_up_patients.patient_id',$patientid);
        if($fdate>0)$data->where('follow_up_patients.follow_up_date','>=',date("Y-m-d",strtotime($fdate)));
        if($tdate>0)$data->where('follow_up_patients.follow_up_date','<=',date("Y-m-d",strtotime($tdate)));
        if(!empty($rtype) && $rtype!=0)$data->where('follow_up_patients.report_type',$rtype);


            $data=$data->orderby('id','Desc')->get();
            return view("patients.follow-up-sheet",compact('guru','shishya','patient','data'));
        } else {
            return redirect('/follow-up-patients')->with('error', 'Patient registration not found.');
        }

    }
    public function view_follow_up_sheet(Request $request,$id=0)
    {
        if($id!=0)$id=decrypt($id);
           $data=Array();
            if($id>0){
                $data=FollowUpPatient::find($id);

                if(Auth::user()->user_type==2 && $data->read_by_guru=='0')FollowUpPatient::where('id',$id)->update(['read_by_guru'=>1]);
                elseif(Auth::user()->user_type==3 && $data->read_by_shishya=='0')FollowUpPatient::where('id',$id)->update(['read_by_shishya'=>1]);
                elseif(Auth::user()->user_type==1 && $data->read_by_admin=='0')FollowUpPatient::where('id',$id)->update(['read_by_admin'=>1]);

                $guru=DB::table('users')->where('users.id',$data->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
                $shishya=User::find($data->shishya_id);

                 $patient=Patient::find($data->patient_id);
                 $remarks=Remark::where('followup_id',$id)->orderby('id','Desc')->get();

                 return view("patients.view-follow-up-sheet",compact('guru','shishya','patient','data','remarks'));


            } else {
                return redirect('/follow-up-patients')->with('error', 'Patient registration not found.');
            }

    }
    public function viewFollowUpRemarKHistory(Request $request,$id=0)
    {
        if($id!=0)$id=decrypt($id);
           $data=Array();
            if($id>0){
                $data=FollowUpPatient::find($id);

                if(Auth::user()->user_type==2 && $data->read_by_guru=='0')FollowUpPatient::where('id',$id)->update(['read_by_guru'=>1]);
                elseif(Auth::user()->user_type==3 && $data->read_by_shishya=='0')FollowUpPatient::where('id',$id)->update(['read_by_shishya'=>1]);
                elseif(Auth::user()->user_type==1 && $data->read_by_admin=='0')FollowUpPatient::where('id',$id)->update(['read_by_admin'=>1]);

                $guru=DB::table('users')->where('users.id',$data->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
                $shishya=User::find($data->shishya_id);

                 $patient=Patient::find($data->patient_id);
                 $remarks=Remark::where('followup_id',$id)->orderby('id','Desc')->get();

                 return view("patients.view-follow-up-remark-history",compact('guru','shishya','patient','data','remarks'));


            } else {
                return redirect('/follow-up-patients')->with('error', 'Patient registration not found.');
            }

    }
    public function add_follow_up_sheet(Request $request,$patientid,$id=0)
    {
        if($patientid!=0)$patientid=decrypt($patientid);
        if($id!=0)$id=decrypt($id);

        if(empty($patientid)||$patientid==0){
            return redirect('/follow-up-patients')->with('error', 'Patient registration not found.');
        }

        $patient=Patient::find($patientid);

        if(isset($patient)){
            $data=Array();
            $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
            $shishya=User::find($patient->shishya_id);
            if($id>0){
                $data=FollowUpPatient::find($id);
            }
            return view("patients.add-follow-up-sheet",compact('guru','shishya','patient','data'));
        } else {            
            return redirect('/follow-up-patients')->with('error', 'Patient registration not found.');
        }

    }
    public function save_follow_up_sheet(Request $request)
    {
        request()->validate([
            'guru_id' => 'required',
            'patient_id' => 'required',
            'shishya_id' => 'required',
            'registration_no' => 'required',
            'follow_up_date' => 'required',
            'report_type' => 'required',
            'progress' => 'required',
            'treatment' => 'required',
        ]);


            if(!empty($request->id)){
                $data=[
                    'guru_id'=>$request->guru_id,
                    'shishya_id'=>$request->shishya_id,
                    'registration_no'=>$request->registration_no,
                    'patient_id'=>$request->patient_id,
                    'follow_up_date'=>$request->follow_up_date,
                    'report_type'=>$request->report_type,
                    'progress'=>$request->progress,
                    'treatment'=>$request->treatment,
                ];
                // Find the data before updating
                $beforeUpdateFollowup=FollowUpPatient::find($request->id);
                // $followup->update($data);
                FollowUpPatient::where('id', $request->id)->update($data);
                // Find the data after updating
                $afterUpdateFollowup = FollowUpPatient::find($request->id);
                // Check for changes
                if ($beforeUpdateFollowup && $afterUpdateFollowup) {
                    $changedFields = array_diff_assoc($afterUpdateFollowup->getAttributes(), $beforeUpdateFollowup->getAttributes());
                    unset($changedFields['updated_at']);
                    if(!empty($changedFields)){
                        $changesData = json_encode($changedFields);
                        FollowUpHistoryLog::updateOrCreate(
                            [
                                'follow_up_id'   => $request->id

                            ],
                            [
                                'data' => $changesData,
                                'follow_up_id' => $request->id,
                                'user_id' => Auth::id(),
                                'user_type' => Auth::user()->user_type,
                            ]
                        );
                    }else{
                        FollowUpHistoryLog::where('follow_up_id',$request->id)->delete();
                    }
                }

                return redirect('/follow-up-patients')->with('success', 'Patient follow up updated successfully.');
            }
            else {

                $data=[
                    'guru_id'=>$request->guru_id,
                    'shishya_id'=>$request->shishya_id,
                    'registration_no'=>$request->registration_no,
                    'patient_id'=>$request->patient_id,
                    'follow_up_date'=>$request->follow_up_date,
                    'report_type'=>$request->report_type,
                    'progress'=>$request->progress,
                    'treatment'=>$request->treatment,
                    'send_to_shishya' => '1',
                ];
                FollowUpPatient::create($data);
                return redirect('/follow-up-patients')->with('success', 'Patient follow up saved successfully! ');
            }




    }

    public function save_follow_up_remark(Request $request)
    {
        request()->validate([
            'guru_id' => 'required',
            'shishya_id' => 'required',
            'followup_id' => 'required',
            'remark' => 'required',
        ]);
        $data = [
            'guru_id' => $request->guru_id,
            'shishya_id' => $request->shishya_id,
            'followup_id' => $request->followup_id,
            'remarks' => $request->remark,
            'send_by' => Auth::user()->user_type,
            'send_to' => $request->send_to,
        ];
        Remark::create($data);
        if(Auth::user()->user_type==3){
            $data=FollowUpPatient::where('id',$request->followup_id)->where('shishya_id',Auth::user()->id)->where('send_to_shishya',1)->first();
            $data1=FollowUpPatient::where('id',$request->followup_id)->where('shishya_id',Auth::user()->id)->where('send_to_shishya',1)->update(['send_to_guru'=>1,'send_to_shishya'=>0,'read_by_guru'=>0]);
            //Mail sending script start here

            $shishya=User::find(Auth::user()->id);
            $guru=User::find($shishya->guru_id);
                $follow_up_data = [
                'title' => 'Your Shishya shared a remark on Follow Up ('.format_patient_id($data->patient_id).') with you.',
                'send'=> $data->patient_id,
                'body' => 'Dear ' .$guru->firstname.',',
                'paragraph' => 'Your Shishya '.$shishya->firstname.'  shared a remark on Follow Up for PHR having No. '.format_patient_id($data->patient_id).' with you. Kindly have a look at it and provide your valuable feedback <br> Remark:<br>'.$request->remark,
                ];

                Mail::to($guru->email)->send(new SendPhr($follow_up_data));

            //Mail sending script ends here
            return redirect('/view-follow-up-sheet/'.encrypt($request->followup_id))->with('success', 'Remark for follow up, send to guru successfully.');

        } elseif(Auth::user()->user_type==2){
            if($request->send_to==1){
                $data=FollowUpPatient::where('id',$request->followup_id)->where('guru_id',Auth::user()->id)->where('send_to_guru',1)->first();
                $data1=FollowUpPatient::where('id',$request->followup_id)->where('guru_id',Auth::user()->id)->where('send_to_guru',1)->update(['send_to_admin'=>1,'send_to_guru'=>0,'read_by_admin'=>0]);

                //Mail sending script start here

                    $guru=User::find(Auth::user()->id);
                    $follow_up_data = [
                    'title' => 'Guru shared a remark on Follow Up ('.format_patient_id($data->patient_id).') with you.',
                    'guruname'=>$guru->firstname,
                    'send'=> $data->patient_id,
                    'body' => 'Dear Admin, ',
                    'paragraph' => 'Guru '.$guru->firstname.' shared a remark on Follow Up for PHR having No. ( '.format_patient_id($data->patient_id).') with you. <br> Remark:<br>'.$request->remark,
                    ];
                    //$admin_email='satish.pawar@echttech.com';
                    $admin_email='satish@yopmail.com';
                    Mail::to($admin_email)->send(new SendPhr($follow_up_data));

                //Mail sending script ends here

                return redirect('/view-follow-up-sheet/'.encrypt($request->followup_id))->with('success', 'Remark for follow up, send to admin successfully.');
            } elseif($request->send_to==3){
                $data=FollowUpPatient::where('id',$request->followup_id)->where('guru_id',Auth::user()->id)->where('send_to_guru',1)->first();
                $data1=FollowUpPatient::where('id',$request->followup_id)->where('guru_id',Auth::user()->id)->where('send_to_guru',1)->update(['send_to_shishya'=>1,'read_by_shishya'=>0]);

                //Mail sending script start here

                $guru=User::find(Auth::user()->id);
                $shishya=User::find($data->shishya_id);
                $follow_up_data = [
                'title' => 'Guru shared a remark on Follow Up ('.format_patient_id($data->patient_id).') with you.',
                'guruname'=>$guru->firstname,
                'send'=> $data->patient_id,
                'body' => 'Dear Shishya, ',
                'paragraph' => 'Guru '.$guru->firstname.' shared a remark on Follow Up for PHR having No. ( '.format_patient_id($data->patient_id).') with you. <br> Remark:<br>'.$request->remark,
                ];
                Mail::to($shishya->email)->send(new SendPhr($follow_up_data));

                //Mail sending script ends here
                return redirect('/view-follow-up-sheet/'.encrypt($request->followup_id))->with('success', 'Remark for follow up, send to shishya successfully.');
            }

        } elseif(Auth::user()->user_type==1){
            $data=FollowUpPatient::where('id',$request->followup_id)->where('send_to_admin',1)->first();

            if(isset($request->remark_type) && $request->remark_type==1){
                $data1=FollowUpPatient::where('id',$request->followup_id)->where('send_to_admin',1)->update(['send_to_guru'=>1,'read_by_guru'=>0]);
            } else {
                $data1=FollowUpPatient::where('id',$request->followup_id)->where('send_to_admin',1)->update(['read_by_guru'=>0]);
            }

            //Mail sending script start here

                $guru=User::find($data->guru_id);
                $follow_up_data = [
                    'title' => 'Admin shared a remark on Follow Up ('.format_patient_id($data->patient_id).') with you.',
                    'send'=> $data->patient_id,
                    'body' => 'Dear ' .$guru->firstname.',',
                    'paragraph' => 'Admin shared a remark on Follow Up for PHR having No. '.format_patient_id($data->patient_id).' with you. Kindly have a look at it <br> Remark:<br>'.$request->remark,
                    ];
                Mail::to($guru->email)->send(new SendPhr($follow_up_data));

            //Mail sending script ends here

            return redirect('/view-follow-up-sheet/'.encrypt($request->followup_id))->with('success', 'Remark for follow up, send to guru successfully.');

        }


    }

    public function delete_follow_up_sheet($id)
    {

        if($id!=0)$id=decrypt($id);
        if(Auth::user()->user_type==1){
            if(FollowUpPatient::where('id',$id)->where('send_to_admin','1')->delete())
            return redirect('/follow-up-patients')->with('success', 'Patient follow up deleted successfully.');
            else return redirect('/follow-up-patients')->with('success', 'You are not allowed to delete this patient follow up.');

        }elseif(Auth::user()->user_type==2){
            if(FollowUpPatient::where('id',$id)->where('guru_id',Auth::user()->id)->where('send_to_admin','!=','1')->delete())
            return redirect('/follow-up-patients')->with('success', 'Patient follow up deleted successfully.');
            else return redirect('/follow-up-patients')->with('success', 'You are not allowed to delete this patient follow up.');

        }elseif(Auth::user()->user_type==3){
            if(FollowUpPatient::where('id',$id)->where('shishya_id',Auth::user()->id)->where('send_to_shishya','1')->where('send_to_admin','!=','1')->where('send_to_guru','!=','1')->delete())
            return redirect('/follow-up-patients')->with('success', 'Patient follow up deleted successfully.');
            else return redirect('/follow-up-patients')->with('success', 'You are not allowed to delete this patient follow up.');

        }
    }

    public function send_follow_up_sheet(Request $request)
    {
        $followup_ids=Array();

        if($request->followup_ids){
            $followup_ids=$request->followup_ids;

            if(Auth::user()->user_type==3){
                $data=FollowUpPatient::whereIn('id',$followup_ids)->where('shishya_id',Auth::user()->id)->where('send_to_shishya',1)->get();

                $data1=FollowUpPatient::whereIn('id',$followup_ids)->where('shishya_id',Auth::user()->id)->where('send_to_shishya',1)->update(['send_to_guru'=>1,'send_to_shishya'=>0,'read_by_guru'=>0]);
               //Mail sending script start here

                $shishya=User::find(Auth::user()->id);
                $guru=User::find($shishya->guru_id);

                 foreach($data as $phr){
                     $follow_up_data = [
                    'title' => 'Your Shishya shared a Follow Up ('.format_patient_id($phr->patient_id).') with you.',
                    'send'=> $phr->patient_id,
                    'body' => 'Dear ' .$guru->firstname.',',
                    'paragraph' => 'Your Shishya '.' '.$shishya->firstname.' '.'shared a Follow Up for PHR having No. '.format_patient_id($phr->patient_id).' with you. Kindly have a look at it and provide your valuable feedback',
                    ];

                    Mail::to($guru->email)->send(new SendPhr($follow_up_data));
                }
                //Mail sending script ends here


                return redirect('/follow-up-patients')->with('success', 'Follow up send to guru successfully.');
            } elseif(Auth::user()->user_type==2){
                $data=FollowUpPatient::whereIn('id',$followup_ids)->where('guru_id',Auth::user()->id)->where('send_to_guru',1)->get();
                $data1=FollowUpPatient::whereIn('id',$followup_ids)->where('guru_id',Auth::user()->id)->where('send_to_guru',1)->update(['send_to_admin'=>1,'send_to_guru'=>0,'read_by_admin'=>0]);
                //Mail sending script start here
                $guru=User::find(Auth::user()->id);
                //$shishya=User::find($data->shishya_id);

                 foreach($data as $phr){
                    $follow_up_data = [
                    'title' => 'Guru shared a Follow Up for PHR ('.format_patient_id($phr->patient_id).') with you.',
                    'guruname'=>$guru->firstname,
                    'send'=> $phr->patient_id,
                    'body' => 'Dear Admin, ',
                    'paragraph' => 'Guru '.$guru->firstname.' a Follow Up for PHR ( '.format_patient_id($phr->patient_id).') with you.',
                    ];
                    //$admin_email='satish.pawar@echttech.com';
                    $admin_email='satish@yopmail.com';
                    Mail::to($admin_email)->send(new SendPhr($follow_up_data));
                }
                //Mail sending script ends here
                return redirect('/follow-up-patients')->with('success', 'Follow up send to admin successfully.');
            }

        } else {
            return redirect('/follow-up-patients')->with('error', 'Patient registration not found.');
        }
    }



    // add new patients
    public function register_patients(Request $request)
    {
        $request->validate(
            [
              'patient_name'   => 'required|max:100|min:2',
              'patient_type' => ['required'],
              'registration_no' => ['required','unique:patients'],
              'age'   => 'required|numeric',
              'gender'   => 'required',
              'age_group'   => 'required',
              'occupation'   => 'required',
              'marital_status'   => 'required',
              'address'   => 'required|max:250',
            ]);
        $input = $request->all();
        $input['phr_a_status']=0;
        $input['phr_g_status']=0;
        $input['phr_s_status']=1;        
        //dd($input['phr_s_status']);
        $patient = Patient::create($input);
        return redirect('/new-patient-registration')->with('success', 'Patient Registered Successfully');
    }

    public function view_patient(Request $request, $id)
    {
        if($id!=0)$id=decrypt($id);        
        $patient=Patient::find($id);
        $patient->read_by_shishya=1;
        $patient->save();
        //$guru=User::where('id',$patient->guru_id)->first();

        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();

        return view("patients.view-patients",compact('patient','guru'));
    }

    public function generatePdf($id)
    {
        $patient=Patient::find($id);
        $patient->read_by_shishya=1;
        $patient->save();
        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
         
        $pdf = PDF::loadView('patients.patient-pdf', ['patient' => $patient,'guru' => $guru]);
    
        return $pdf->download('patient.pdf');
    }

    public function edit_patient(Request $request, $id)
    {
        if($id!=0)$id= decrypt($id);
        $patient=Patient::find($id);
        //$guru=User::where('id',$patient->guru_id)->first();

        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        $shishya=User::where('id',$patient->shishya_id)->first();
        $patientHistoryLog = PatientHistoryLog::where('patient_id',$id)->first();
        return view("patients.edit-patients",compact('patient','guru','shishya','patientHistoryLog'));
    }

    public function update_patients(Request $request)
    {
         $request->validate(
            [
              'patient_name'   => 'required',
              'patient_type' => ['required'],
              'registration_no' => ['required'],
              'age'   => 'required',
              'gender'   => 'required',
              'age_group'   => 'required',
              'occupation'   => 'required',
              'marital_status'   => 'required',
              'address'   => 'required',
            ]);

        $input = $request->all();
        $id=$request->patient_id;
        unset($input['_token']);
        unset($input['patient_id']);
       // Find the data before updating
        $modelBeforeUpdate = Patient::find($id);
        // Update the model
        Patient::where('id', $id)->update($input);
        // Find the data after updating
        $modelAfterUpdate = Patient::find($id);

        // Check for changes
        if ($modelBeforeUpdate && $modelAfterUpdate) {
            $changedFields = array_diff_assoc($modelAfterUpdate->getAttributes(), $modelBeforeUpdate->getAttributes());
            unset($changedFields['updated_at']);
            if(!empty($changedFields)){
                $changesData = json_encode($changedFields);
                PatientHistoryLog::updateOrCreate(
                    [
                        'patient_id'   => $id

                    ],
                    [
                        'data' => $changesData,
                        'patient_id' => $id,
                        'user_id' => Auth::id(),
                        'user_type' => Auth::user()->user_type,
                    ]
                );
            }else{
                PatientHistoryLog::where('patient_id',$id)->delete();
            }
        }
        if(Auth::user()->user_type==2){
            return redirect('/guru-patient-list')->with('success', 'Patient history updated successfully !');
        }else{
            return redirect('/new-patient-registration')->with('success', 'Patient history updated successfully !');
        }

    }

    public function send_phr_to_guru(Request $request)
    {
        $phrarray=$request->send_phr_to_guru;
        if(!empty($phrarray)){
            
            foreach($phrarray as $key=>$phrarrayvalues)
            {
                $patient=Patient::where('id',$phrarrayvalues)->where('phr_s_status',1)->first();
                if($patient)
                {
                    //dd("$patient");
                    $patient->phr_g_status=1;
                    $patient->phr_s_status=0;
                    $patient->read_by_guru=0;
                    $patient->save();

                    /*phr mail to guru*/
                    $patient_id=$patient->id;
                    $guru_id=$patient->guru_id;
                    $guru=User::find($guru_id);
                    $guruname=$guru->firstname;
                    $gurumail=$guru->email;

                    $shishya_id=$patient->shishya_id;
                    $shishya=User::find($shishya_id);
                    $shishyaname=$shishya->firstname;

                    $phrData = [
                    'title' => 'Your Shishya shared a PHR ('.format_patient_id($patient_id).') with you.',
                    'send'=> $patient_id,
                    'body' => 'Dear ' .$guruname.',',
                    'paragraph' => 'Your Shishya '.' '.$shishyaname.' '.'shared a PHR having No. '.format_patient_id($patient_id).' with you. Kindly have a look at it and provide your valuable feedback',
                    ];

                    Mail::to($gurumail)->send(new SendPhr($phrData));
                }
            }
            return redirect('/new-patient-registration')->with('success', 'This record Sent to guru successfully! now you can not change this record');          
        }
        return redirect('/new-patient-registration')->with('error', 'Please select a patient !');
       
    }

    public function send_patient_to_guru($id,$guru_id)
    {
        if($id!=0)$id= decrypt($id);
        if($guru_id!=0)$guru_id= decrypt($guru_id);
        $gururecord=User::find($guru_id);
        $gurumail=$gururecord->email;


        //dd("$gururecord->email");
        $id=$id;
        $patient=Patient::find($id);

        $patient->phr_g_status=1;
        $patient->phr_s_status=0;
        $patient->read_by_guru=0;
        $patient->save();


        $patient_id=$patient->id;
        //dd("$patient_id");
        //Mail sending scripts starts here


        $guru_id=$patient->guru_id;
        $guru=User::find($guru_id);
        $guruname=$guru->firstname;

        $shishya_id=$patient->shishya_id;
        $shishya=User::find($shishya_id);
        $shishyaname=$shishya->firstname;

            $phrData = [
            'title' => 'Your Shishya shared a PHR ('.format_patient_id($patient_id).') with you.',
            'send'=> $patient_id,
            'body' => 'Dear ' .$guruname.',',
            'paragraph' => 'Your Shishya '.' '.$shishyaname.' '.'shared a PHR having No. '.format_patient_id($patient_id).' with you. Kindly have a look at it and provide your valuable feedback',
            ];

            Mail::to($gurumail)->send(new SendPhr($phrData));
        //Mail sending script ends here

        return redirect('/new-patient-registration')->with('success', 'This record Sent to guru successfully! now you can not change this record');
    }


    public function guru_patient_list()
    {
        $guru_id=Auth::user()->id;
        $patientlist=Patient::with('patientHistory')->orderby('updated_at','Desc')->where(['guru_id'=>$guru_id,'soft_delete' => 0])->get();
        return view("patients.guru.patient-list",compact("patientlist"));
    }
    
    //this phr record show only 24 hours after view by guru
    public function notify_guru_patient_list()
    {
         $read_time = date('Y-m-d H:i:s',(time()-(24*60*60)));

         $guru_id=Auth::user()->id;
         $patientlist=Patient::orderBy('id','DESC')->where('phr_g_status',1)->where('guru_id',$guru_id)
        ->where(function ($query) use ($read_time) {
            $query->where('read_time', '>=', $read_time)
                  ->orWhere('read_by_guru', '=', 0);
        })
        ->get();
            
         
        return view("patients.guru.patient-list",compact("patientlist"));
    }

    public function guru_phr_history_sheet()
    {
        $guru_id=Auth::user()->id;
        $patientlist=Patient::orderBy('id','DESC')->where('phr_g_status',1)->where('guru_id',$guru_id)->get();

        return view("patients.guru.patient-list",compact("patientlist"));
    }

    public function guru_view_patient(Request $request,$id)
    {
        if($id!=0)$id= decrypt($id);
        $patient=Patient::find($id);
        $patient->read_by_guru=1;
        $current_date = date('Y-m-d H:i:s');
        $patient->read_time=$current_date;
        $patient->save();
        //$guru=User::where('id',$patient->guru_id)->first();

        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        $shishya=User::where('id',$patient->shishya_id)->first();
        return view("patients.guru.guru-view-patients",compact('patient','guru','shishya'));
    }

    public function generateGuruPdf($id)
    {
        $patient=Patient::find($id);
        $patient->read_by_shishya=1;
        $patient->save();
        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        $shishya=User::where('id',$patient->shishya_id)->first();
        $pdf = PDF::loadView('patients.guru.guru-patient-pdf', ['patient' => $patient,'guru' => $guru,'shishya' => $shishya]);
    
        return $pdf->download('patient.pdf');
    }

    public function remarks_from_guru($id)
    {
        if($id!=0)$id= decrypt($id);
        $user=User::where('user_type',3)->where('guru_id',Auth::user()->id)->orWhere('id',1)->get();
        $patient=Patient::find($id);
        if(Auth::user()->user_type == 2){
            if($patient->phr_g_status == 1){
                return view("patients.guru.remarks",compact('user','patient'));
            }else{
                return redirect('/guru-patient-list');
            }
        }
        if(Auth::user()->user_type == 1){
            if($patient->phr_a_status == 1){
                return view("patients.guru.remarks",compact('user','patient'));
            }else{
                return redirect('/patients/In-Patient');
            }
        }
        if(Auth::user()->user_type == 3){
            if($patient->phr_s_status == 1){
                return view("patients.guru.remarks",compact('user','patient'));
            }else{
                return redirect('/new-patient-registration');
            }
        }
    }

    public function guru_remarks(Request $request)
    {
        $remark= new Remark;
        $remark->guru_id=$request->guru_id;
        $remark->shishya_id=$request->shishya_id;
        $remark->phr_id=$request->patient_id;
        $remark->send_by=Auth::user()->user_type;
        $remark->send_to=$request->user_type;

        $remark->remarks=$request->remarks;
        $remark->save();

        $id=$request->patient_id;
        $patient=Patient::find($id);
        if($request->user_type==1)
        {
           //Mail sending scripts starts here

            $guru_id=$patient->guru_id;
            $guru=User::find($guru_id);
            $guruname=$guru->firstname;

            $shishya_id=$patient->shishya_id;
            $shishya=User::find($shishya_id);
            $shishyaname=$shishya->firstname;
            $admin=User::where('user_type',1)->first();
            $adminname=$admin->firstname;

            $patient_id=$patient->id;

            $phrData = [
            'title' => 'Your Shishya shared a PHR ('.format_patient_id($patient_id).') with you.',
            'send'=> $patient_id,
            'body' => 'Dear ' .$shishyaname.',',
            'paragraph' => 'Your PHR  Number '.format_patient_id($patient_id).'  has successfully been submitted to the Admin. This is just for your information.',
            ];

            $adminmail="vishal@yopmail.com";
            Mail::to($shishya->email)->send(new PhrAdmin($phrData));


            $phrData1 = [
            'guruname'=>$guruname,
            'send'=> $patient_id,
            'body' => 'Dear Admin,',
            'paragraph' => 'Guru '.$guruname.' shared a PHR ( '.format_patient_id($patient_id).') with you.'
            ];
            Mail::to($adminmail)->send(new PhrGuruShishya2($phrData1));

           //Mail sending script ends here

           $patient->phr_a_status=1;
           $patient->phr_g_status=0;
           $patient->phr_s_status=0;
           $patient->read_by_admin=0;

           $patient->save();
           if(Auth::user()->user_type == 1){
            return redirect('/patients/In-Patient')->with('success', 'Your remark has been sent to guru successfully');
        }
        if(Auth::user()->user_type == 3){
            return redirect('/new-patient-registration')->with('success', 'Your remark has been sent to guru successfully');
        }
        if(Auth::user()->user_type == 2){
            return redirect('guru-patient-list')->with('success', 'Your remark has been send to admin successfully');
        }
        }else if($request->user_type==2){
            $guru_id=$patient->guru_id;
            $guru=User::find($guru_id);
            $guruname=$guru->firstname;

            $patient_id=$patient->id;
            $shishya_id=$patient->shishya_id;
            $shishya=User::find($shishya_id);
            $shishyaname=$shishya->firstname;

           $phrData = [
            'title' => 'Your Guru gives valuable feedbacks on your PHR  Number ('.format_patient_id($patient_id).').',
            'send'=> $patient_id,
            'body' => 'Dear ' .$shishyaname.',',
            'paragraph' => 'Your Guru  '.$guruname.' give valuable feedback on your PHR  Number '.format_patient_id($patient_id).'.  Please login to the portal and check the Notifications section for further details.',
            ];


            Mail::to($shishya->email)->send(new PhrGuruShishya($phrData));

           $patient->phr_g_status=1;
           $patient->phr_s_status=0;
           $patient->phr_a_status=0;
           $patient->read_by_shishya=0;
           $patient->save();
            if(Auth::user()->user_type == 1){
                return redirect('/patients/In-Patient')->with('success', 'Your remark has been sent to guru successfully');
            }
            if(Auth::user()->user_type == 3){
                return redirect('/new-patient-registration')->with('success', 'Your remark has been sent to guru successfully');
            }
            if(Auth::user()->user_type == 2){
                return redirect('guru-patient-list')->with('success', 'Your remark has been send to admin successfully');
            }
        }else
        {
            $guru_id=$patient->guru_id;
            $guru=User::find($guru_id);
            $guruname=$guru->firstname;

            $patient_id=$patient->id;
            $shishya_id=$patient->shishya_id;
            $shishya=User::find($shishya_id);
            $shishyaname=$shishya->firstname;

           $phrData = [
            'title' => 'Your Guru gives valuable feedbacks on your PHR  Number ('.format_patient_id($patient_id).').',
            'send'=> $patient_id,
            'body' => 'Dear ' .$shishyaname.',',
            'paragraph' => 'Your Guru  '.$guruname.' give valuable feedback on your PHR  Number '.format_patient_id($patient_id).'.  Please login to the portal and check the Notifications section for further details.',
            ];


            Mail::to($shishya->email)->send(new PhrGuruShishya($phrData));

           $patient->phr_g_status=0;
           $patient->phr_s_status=1;
           $patient->phr_a_status=0;
           $patient->read_by_shishya=0;
           $patient->save();
            if(Auth::user()->user_type == 1){
                return redirect('/patients/In-Patient')->with('success', 'Your remark has been sent to guru successfully');
            }
            if(Auth::user()->user_type == 3){
                return redirect('/new-patient-registration')->with('success', 'Your remark has been sent to guru successfully');
            }
            if(Auth::user()->user_type == 2){
                return redirect('guru-patient-list')->with('success', 'Your remark has been send to admin successfully');
            }

        }



    }



    public function guru_remark_history(Request $request,$phr_id)
    {
        if($phr_id!=0)$phr_id= decrypt($phr_id);        
        $remark_history=Remark::orderby('id','Desc')->where('phr_id',$phr_id)->get();
        return view('patients.guru.remark-history',compact('remark_history'));

    }

     public function remark_history(Request $request,$phr_id)
    {   
        if($phr_id!=0)$phr_id= decrypt($phr_id);
        $remark_history=Remark::orderby('id','Desc')->where('phr_id',$phr_id)->get();
        return view('patients.remark-history',compact('remark_history'));

    }

    public function admin_patient_list()
    {
        $guru_id=Auth::user()->id;
        $patientlist=Patient::orderBy('id','DESC')->where('phr_a_status',1)->get();

        return view("patients.admin.patient-list",compact("patientlist"));
    }


    public function admin_remark_history(Request $request,$phr_id)
    {
        $remark_history=Remark::orderby('id','Desc')->where('phr_id',$phr_id)->get();
        return view('patients.admin.remark-history',compact('remark_history'));

    }

    public function admin_edit_patient(Request $request, $id)
    {
        $patient=Patient::find($id);
        $shishya=User::where('id',$patient->shishya_id)->first();
        $patientHistoryLog = PatientHistoryLog::where('patient_id',$id)->first();
        //$guru=User::where('id',$patient->guru_id)->first();
        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        return view("patients.admin.edit-patients",compact('patient','guru','shishya','patientHistoryLog'));
    }

    public function admin_update_patients(Request $request)
    {
        $this->validate($request, [
                'patient_name' => 'required',
                'registration_no' => 'required',
                'age' => 'required|numeric',
                'patient_type' => 'required',
                'gender' => 'required',
                'age_group' => 'required',
                'occupation' => 'required',
                'marital_status' => 'required',
                'address' => 'required',
        ]);       
        $input = $request->all();
        $id=$request->patient_id;
        unset($input['_token']);
        unset($input['patient_id']);
        unset($input['previous_url']);
        // Find the data before updating
        $modelBeforeUpdate = Patient::find($id);
        // Update the model
        Patient::where('id', $id)->update($input);
        // Find the data after updating
        $modelAfterUpdate = Patient::find($id);
        // Check for changes
        if ($modelBeforeUpdate && $modelAfterUpdate) {
            $changedFields = array_diff_assoc($modelAfterUpdate->getAttributes(), $modelBeforeUpdate->getAttributes());
            unset($changedFields['updated_at']);         
            if(!empty($changedFields)){
                $changesData = json_encode($changedFields);
                PatientHistoryLog::updateOrCreate(
                    [
                        'patient_id'   => $id

                    ],
                    [
                        'data' => $changesData,
                        'patient_id' => $id,
                        'user_id' => Auth::id(),
                        'user_type' => Auth::user()->user_type,
                    ]
                );
            }else{
                PatientHistoryLog::where('patient_id',$id)->delete();
            }
        }
        
        return redirect($request->previous_url)->with('success', 'Phr details update successfully');
        
         

    }

    public function admin_view_patient(Request $request,$id)
    {
        //dd("yes");
        $patient=Patient::find($id);
        $patient->read_by_admin=1;
        $patient->save();
        $shishya=User::where('id',$patient->shishya_id)->first();
        //$guru=User::where('id',$patient->guru_id)->first();
        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        return view("patients.admin.admin-view-patients",compact('patient','guru','shishya'));
    }

    public function generateAdminPdf($id)
    {
        $patient=Patient::find($id);
        $patient->read_by_shishya=1;
        $patient->save();
        $guru=DB::table('users')->where('users.id',$patient->guru_id)->select('users.*','cities.name as city_name','states.name as state_name')->join('cities','users.city', '=', 'cities.id')->join('states','users.state', '=', 'states.id')->first();
        $shishya=User::where('id',$patient->shishya_id)->first();
        $pdf = PDF::loadView('patients.admin.admin-patient-pdf', ['patient' => $patient,'guru' => $guru,'shishya' => $shishya]);
    
        return $pdf->download('patient.pdf');
    }


    public function delete_phr($id)
    {
        $drugpart = Patient::find($id);
        $drugpart->delete();
        return redirect()->back()->with('success', 'Patient history deleted successfully');
    }

    function delete_patient_remark(Request $request)
    {
        Patient::where(['id' => $request->patient_id])->update([
            'delete_remark' => $request->delete_remark,
            'soft_delete' => '1'
        ]);
        return redirect()->back()->with('success', 'Patient history deleted successfully');
    }


    public function in_patients($phr_type)
    {
        if($phr_type=="In-Patient")
        {
            $patientlist=Patient::with('patientHistory')->orderBy('updated_at','DESC')->where(['patient_type' => $phr_type,'soft_delete' => 0])->get();
            //dd($patientlist);
        }
        elseif($phr_type=="OPD-Patient")
        {
           $patientlist=Patient::with('patientHistory')->orderBy('updated_at','DESC')->where(['patient_type' => $phr_type,'soft_delete' => 0])->get();
        }
        return view("patients.admin.patient-list",compact("patientlist"));      
         
    }


        

       


}
