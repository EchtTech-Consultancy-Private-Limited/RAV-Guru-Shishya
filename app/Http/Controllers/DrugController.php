<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\ChurnaYoga;
use App\Models\DrugChuranPart;
use Redirect;
use Session;
use Carbon\Carbon;
use Response;
use DB;
use App\Models\VatiYoga;
use App\Models\VatiYogaType;
use App\Models\Remark;
use App\Models\RasaYoga;
use App\Models\DrugRasaPart;
use App\Models\FollowUpPatient;
use App\Models\DrugHistoryLog;
use App\Models\TaliaYogas;
use App\Models\TaliaYogasType;
use App\Models\ArishtaYoga;
use App\Models\ArishtaYogaType;
use Auth;

class DrugController extends Controller
{
    public function add_drug_report()
    {
        if(Auth::user()->guru_id){           
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.add-drug-report",['guru'=>$guru]); 
        }
        return redirect()->back()->with('error', 'Your Guru not assigned !');
    }


    public function drug_report_history()
    {
        $guru=get_guru_list(Auth::user()->guru_id);
        return view("drugs.drugs-list",['guru'=>$guru]);
    }

    public function add_drug_details(Request $request)
    {
        $request->validate(
        [
            'churna_yoga_type_individual' => 'required',

        ]);
        $input = $request->all();
        $drug = ChurnaYoga::create($input);

        $name_of_the_ingredients=$request->name_of_the_ingredients;
        $part_used=$request->part_used;
        $quantity=$request->quantity;

        for($i=0; $i<count($name_of_the_ingredients); $i++)
        {
           $churanyogapart=new DrugChuranPart;
           $churanyogapart->name_of_the_ingredients=$name_of_the_ingredients[$i];
           $churanyogapart->part_used=$part_used[$i];
           $churanyogapart->quantity=$quantity[$i];
           $churanyogapart->drug_id=$drug->id;
           $churanyogapart->save();

        }

       return redirect()->back()->with('success', 'Drug Report Added Successfully');
    }

    public function filter_drug_report(Request $request)
    {
       $guru=get_guru_list(Auth::user()->guru_id);
       //dd("$guru->firstname");

       $shishya_id=Auth::user()->id;
       $from_date=$request->from_date;
       $to_date=$request->to_date;
       $yogas_type=$request->yogas_type;

            if(request()->yogas_type==1)
            {
                /* $drugslist = ChurnaYoga::whereBetween('created_at',[$from_date,$to_date])->where('shishya_id',$shishya_id)->get();*/
                $drugslist = ChurnaYoga::with('drugHistory')->where('date_of_yogas','>=',$from_date)->where('date_of_yogas','<=',$to_date)
                ->where('shishya_id',$shishya_id)->orderBy('updated_at','desc')->get();
            }
            elseif(request()->yogas_type==2)
            {
                $drugslist = RasaYoga::with('drugHistory')->where('date_of_yogas','>=',$from_date)->where('date_of_yogas','<=',$to_date)
                ->where('shishya_id',$shishya_id)->orderBy('updated_at','desc')->get();
            }
            elseif(request()->yogas_type==3)
            {
                $drugslist = VatiYoga::with('drugHistory')->where('date_of_yogas','>=',$from_date)->where('date_of_yogas','<=',$to_date)
                ->where('shishya_id',$shishya_id)->orderBy('updated_at','desc')->get();
            }
            elseif(request()->yogas_type==4)
            {
                $drugslist = TaliaYogas::with('drugHistory')->where('date_of_yogas','>=',$from_date)->where('date_of_yogas','<=',$to_date)
                ->where('shishya_id',$shishya_id)->orderBy('updated_at','desc')->get();
            }
            elseif(request()->yogas_type==5)
            {
                $drugslist = ArishtaYoga::with('drugHistory')->where('date_of_yogas','>=',$from_date)->where('date_of_yogas','<=',$to_date)
                ->where('shishya_id',$shishya_id)->orderBy('updated_at','desc')->get();
            }


            //return $data=strlen($drugslist);
            //dd("$drugslist");
            //return $drugslist[0]->yoga_type;
           return view('drugs.drugs-list',compact('drugslist','guru'));
    }

    public function edit_drugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);

        $churandrug = ChurnaYoga::find($id);
        $churandrugpart=DrugChuranPart::where('drug_id',$id)->get();
        $drugHistoryLog = DrugHistoryLog::where('drug_id',$id)->first();
        if($user_type==1 || $user_type==2)
        {            
            $id=$churandrug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.edit-churan-drugs",compact('churandrug','guru','churandrugpart','shishyarecord','drugHistoryLog'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.edit-churan-drugs",compact('churandrug','guru','churandrugpart','drugHistoryLog'));
        }
    }

    public function viewDrugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);

        $churandrug = ChurnaYoga::find($id);
        $churandrugpart=DrugChuranPart::where('drug_id',$id)->get();

        if($user_type==1 || $user_type==2)
        {            
            $id=$churandrug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.view-churan-drugs",compact('churandrug','guru','churandrugpart','shishyarecord'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.view-churan-drugs",compact('churandrug','guru','churandrugpart'));
        }
    }

    public function edit_rasa_drugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);
        $guru=get_guru_list(Auth::user()->guru_id);
        $rasadrug = RasaYoga::find($id);
        $drugHistoryLog = DrugHistoryLog::where('rasa_id',$id)->first();
        $drugrasapart=DrugRasaPart::where('drug_rasayoga_id',$id)->get();

        if($user_type==1 || $user_type==2)
        {
            $id=$rasadrug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.edit-rasa-drugs",compact('rasadrug','guru','drugrasapart','shishyarecord','drugHistoryLog'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.edit-rasa-drugs",compact('rasadrug','guru','drugrasapart','drugHistoryLog'));
        }
    }

    public function view_rasa_drugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);
        $guru=get_guru_list(Auth::user()->guru_id);
        $rasadrug = RasaYoga::find($id);

        $drugrasapart=DrugRasaPart::where('drug_rasayoga_id',$id)->get();

        if($user_type==1 || $user_type==2)
        {
            $id=$rasadrug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.view-rasa-drugs",compact('rasadrug','guru','drugrasapart','shishyarecord'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.view-rasa-drugs",compact('rasadrug','guru','drugrasapart'));
        }
    }

    public function update_drug_details(Request $request)
    {
        $request->validate(
        [
            'churna_yoga_type_individual' => 'required',

        ]);
        $id=$request->drug_id;
        $input = $request->all();
        $drug = ChurnaYoga::find($id);
        // $drug->update($input);

        // Find the data before updating
        $modelBeforeUpdate = ChurnaYoga::find($id);
        // Update the model
        $drug->update($input);
        // Find the data after updating
        $modelAfterUpdate = ChurnaYoga::find($id);

        // Check for changes
        if ($modelBeforeUpdate && $modelAfterUpdate) {
            $finalArray = array_diff_assoc($modelAfterUpdate->getAttributes(), $modelBeforeUpdate->getAttributes());
            if($request->comosition_update > 0){
                $comositionUpdate['comosition_update'] = 'add_composition_extra';
                $finalArray = array_merge($comositionUpdate,$finalArray);
            }
            unset($finalArray['updated_at']);
            if(!empty($finalArray)){
                $changesData = json_encode($finalArray);
                DrugHistoryLog::updateOrCreate(
                    [
                        'drug_id'   => $id

                    ],
                    [
                        'data' => $changesData,
                        'drug_id' => $id,
                        'user_id' => Auth::id(),
                        'user_type' => Auth::user()->user_type,
                    ]
                );
            }else{
                DrugHistoryLog::where('drug_id',$id)->delete();
            }
        }

        $name_of_the_ingredients = $request->name_of_the_ingredients;
        $part_used = $request->part_used;
        $quantity = $request->quantity;
        $drug_part_id = $request->drug_part_id;

        if($name_of_the_ingredients != null)
        for($i=0; $i<count($name_of_the_ingredients); $i++)
        {
            if(empty($name_of_the_ingredients[$i]))
               {
                continue;
               }
           $id=$drug_part_id[$i];

           if($id==0)
           {

               $churanyogapart=new DrugChuranPart;
               $churanyogapart->name_of_the_ingredients=$name_of_the_ingredients[$i];
               $churanyogapart->part_used=$part_used[$i];
               $churanyogapart->quantity=$quantity[$i];
               $churanyogapart->drug_id=$drug->id;
               $churanyogapart->save();


           }
           else
           {
               $churanyogapart=DrugChuranPart::find($id);
               $churanyogapart->name_of_the_ingredients=$name_of_the_ingredients[$i];
               $churanyogapart->part_used=$part_used[$i];
               $churanyogapart->quantity=$quantity[$i];
               $churanyogapart->drug_id=$request->drug_id;
               $churanyogapart->save();
           }


        }
        else
        {
            return redirect()->back()->with('success', 'Churna Yogas updated successfully');
        }

         return redirect()->back()->with('success', 'Churna Yogas updated successfully');
    }

    public function update_rasayoga_details(Request $request)
    {
        $request->validate(
        [
            'rasa_yoga_type_individual' => 'required',

        ]);
        $id=$request->drug_id;
        $input = $request->all();
        $drug = RasaYoga::find($id);
        // $drug->update($input);
        // Find the data before updating
        $modelBeforeUpdate = RasaYoga::find($id);
        // Update the model
        $drug->update($input);
        // Find the data after updating
        $modelAfterUpdate = RasaYoga::find($id);

        // Check for changes
        if ($modelBeforeUpdate && $modelAfterUpdate) {
            $finalArray = array_diff_assoc($modelAfterUpdate->getAttributes(), $modelBeforeUpdate->getAttributes());
            if($request->comosition_update > 0){
                $comositionUpdate['comosition_update'] = 'add_composition_extra';
                $finalArray = array_merge($comositionUpdate,$finalArray);
            }
            unset($finalArray['updated_at']);
            if(!empty($finalArray)){
                $changesData = json_encode($finalArray);
                DrugHistoryLog::updateOrCreate(
                    [
                        'rasa_id'   => $id

                    ],
                    [
                        'data' => $changesData,
                        'rasa_id' => $id,
                        'user_id' => Auth::id(),
                        'user_type' => Auth::user()->user_type,
                    ]
                );
            }else{
                DrugHistoryLog::where('rasa_id',$id)->delete();
            }
        }


        $name_of_the_ingredients_mineral_metal=$request->name_of_the_ingredients_mineral_metal;
        $part_used=$request->part_used;
        $quantity=$request->quantity;
        $drug_part_id=$request->drug_part_id;

        if($name_of_the_ingredients_mineral_metal != null)
        for($i=0; $i<count($name_of_the_ingredients_mineral_metal); $i++)
        {
            if(empty($name_of_the_ingredients_mineral_metal[$i]))
               {
                continue;
               }
           $id=$drug_part_id[$i];

           if($id==0)
           {

               $drugrasapart=new DrugRasaPart;
               $drugrasapart->name_of_the_ingredients_mineral_metal=$name_of_the_ingredients_mineral_metal[$i];
               $drugrasapart->rasa_part_used=$part_used[$i];
               $drugrasapart->rasa_quantity=$quantity[$i];
               $drugrasapart->drug_rasayoga_id=$drug->id;
               $drugrasapart->save();


           }
           else
           {
               $drugrasapart=DrugRasaPart::find($id);
               $drugrasapart->name_of_the_ingredients_mineral_metal=$name_of_the_ingredients_mineral_metal[$i];
               $drugrasapart->rasa_part_used=$part_used[$i];
               $drugrasapart->rasa_quantity=$quantity[$i];
               $drugrasapart->drug_rasayoga_id=$drug->id;
               $drugrasapart->save();
           }


        }
        else
        {
            return redirect()->back()->with('success', 'Rasa Yogas updated successfully');
        }

         return redirect()->back()->with('success', 'Rasa Yogas updated successfully');
    }

     public function delete_churan_yoga_part($id)
    {

        $drugpart = DrugChuranPart::find($id);
        $drugpart->delete();
        return redirect()->back()->with('Error', 'Churna Yogas type deleted successfully');
    }

    public function delete_rasayoga_part($id)
    {

        $drugpart = DrugRasaPart::find($id);
        $drugpart->delete();
        return redirect()->back()->with('Error', 'Rasa Yogas type deleted successfully');
    }

    public function add_rasayoga_details(Request $request)
    {
        $request->validate(
        [
            'rasa_yoga_type_individual' => 'required',

        ]);
        $input = $request->all();
        $drugrasa = RasaYoga::create($input);

        $name_of_the_ingredients_mineral_metal=$request->name_of_the_ingredients_mineral_metal;
        $part_used=$request->part_used;
        $quantity=$request->quantity;

        for($i=0; $i<count($name_of_the_ingredients_mineral_metal); $i++)
        {
           $drugrasapart=new DrugRasaPart;
           $drugrasapart->name_of_the_ingredients_mineral_metal=$name_of_the_ingredients_mineral_metal[$i];
           $drugrasapart->rasa_part_used=$part_used[$i];
           $drugrasapart->rasa_quantity=$quantity[$i];
           $drugrasapart->drug_rasayoga_id=$drugrasa->id;
           $drugrasapart->save();

        }

       return redirect('add-drug-report')->with('success', 'Drug Report Added Successfully');
    }

    /*vati Yogas*/
    public function vati_yoga_details(Request $request)
    {
        $request->validate(
        [
            'vati_yoga_type_individual' => 'required',

        ]);
        $input = $request->all();
        $vatiyoga = VatiYoga::create($input);
        $name_of_the_ingredients=$request->name_of_the_ingredients;
        $part_used=$request->part_used;
        $quantity=$request->quantity;

        for($i=0; $i<count($name_of_the_ingredients); $i++)
        {
           $vatitype=new VatiYogaType;
           $vatitype->name_of_the_ingredients=$name_of_the_ingredients[$i];
           $vatitype->part_used=$part_used[$i];
           $vatitype->quantity=$quantity[$i];
           $vatitype->drug_vatiyoga_id=$vatiyoga->id;
           $vatitype->save();

        }

       return redirect('add-drug-report')->with('success', 'Drug Report Added Successfully');
    }

    public function edit_vati_drugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);
        $guru=get_guru_list(Auth::user()->guru_id);
        $drug = VatiYoga::find($id);
        $vatitype=VatiYogaType::where('drug_vatiyoga_id',$id)->get();
        $drugHistoryLog = DrugHistoryLog::where('vati_id',$id)->first();
        if($user_type==1 || $user_type==2)
        {
            $id=$drug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.edit-vati-drugs",compact('drug','guru','vatitype','shishyarecord','drugHistoryLog'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.edit-vati-drugs",compact('drug','guru','vatitype','drugHistoryLog'));
        }
    }

    public function view_vati_drugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);
        $guru=get_guru_list(Auth::user()->guru_id);
        $drug = VatiYoga::find($id);

        $vatitype=VatiYogaType::where('drug_vatiyoga_id',$id)->get();
        if($user_type==1 || $user_type==2)
        {
            $id=$drug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.view-vati-drugs",compact('drug','guru','vatitype','shishyarecord'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.view-vati-drugs",compact('drug','guru','vatitype'));
        }
    }

     public function update_vatiyoga_details(Request $request)
    {
        $request->validate(
        [
            'vati_yoga_type_individual' => 'required',

        ]);
        $id=$request->drug_id;
        $input = $request->all();
        $drug = VatiYoga::find($id);
        // $drug->update($input);
        // Find the data before updating
        $modelBeforeUpdate = VatiYoga::find($id);
        // Update the model
        $drug->update($input);
        // Find the data after updating
        $modelAfterUpdate = VatiYoga::find($id);

        // Check for changes
        if ($modelBeforeUpdate && $modelAfterUpdate) {
            $finalArray = array_diff_assoc($modelAfterUpdate->getAttributes(), $modelBeforeUpdate->getAttributes());
            if($request->comosition_update > 0){
                $comositionUpdate['comosition_update'] = 'add_composition_extra';
                $finalArray = array_merge($comositionUpdate,$finalArray);
            }
            unset($finalArray['updated_at']);
            if(!empty($finalArray)){
                $changesData = json_encode($finalArray);
                DrugHistoryLog::updateOrCreate(
                    [
                        'vati_id'   => $id

                    ],
                    [
                        'data' => $changesData,
                        'vati_id' => $id,
                        'user_id' => Auth::id(),
                        'user_type' => Auth::user()->user_type,
                    ]
                );
            }else{
                DrugHistoryLog::where('vati_id',$id)->delete();
            }
        }

        $name_of_the_ingredients = $request->name_of_the_ingredients;
        $part_used=$request->part_used;
        $quantity=$request->quantity;
        $drug_part_id=$request->drug_part_id;


        if($name_of_the_ingredients != null)
            for($i=0; $i<count($name_of_the_ingredients); $i++)
            {
               if(empty($name_of_the_ingredients[$i]))
               {
                continue;
               }
               $id=$drug_part_id[$i];

               if($id==0)
               {

                   $vatitype=new VatiYogaType;
                   $vatitype->name_of_the_ingredients=$name_of_the_ingredients[$i];
                   $vatitype->part_used=$part_used[$i];
                   $vatitype->quantity=$quantity[$i];
                   $vatitype->drug_vatiyoga_id=$drug->id;
                   $vatitype->save();
                }
               else
               {
                   $vatitype=VatiYogaType::find($id);
                   $vatitype->name_of_the_ingredients=$name_of_the_ingredients[$i];
                   $vatitype->part_used=$part_used[$i];
                   $vatitype->quantity=$quantity[$i];
                   $vatitype->drug_vatiyoga_id=$drug->id;
                   $vatitype->save();
               }
            }
        else
        {
            return redirect()->back()->with('success', 'Vati Yogas updated successfully');
        }

         return redirect()->back()->with('success', 'Vati Yogas updated successfully');
    }

    public function delete_vatiyoga_type($id)
    {

        $vatitype = VatiYogaType::find($id);
        $vatitype->delete();
        return redirect()->back()->with('Error', 'Vati Yogas type deleted successfully');
    }

    /*talia yogas*/

    public function talia_yoga_details(Request $request)
    {
        $request->validate(
        [
            'talia_yoga_type_individual' => 'required',

        ]);
        $input = $request->all();
        $talia = TaliaYogas::create($input);
        $name_of_the_ingredients=$request->name_of_the_ingredients;
        $part_used=$request->part_used;
        $quantity=$request->quantity;

        for($i=0; $i<count($name_of_the_ingredients); $i++)
        {
           $taliatype=new TaliaYogasType;
           $taliatype->name_of_the_ingredients=$name_of_the_ingredients[$i];
           $taliatype->part_used=$part_used[$i];
           $taliatype->quantity=$quantity[$i];
           $taliatype->drug_taliayogas_id=$talia->id;
           $taliatype->save();

        }
        return redirect()->back()->with('success', 'Drug Report Added Successfully');
    }

    public function edit_talia_drugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);
        $guru=get_guru_list(Auth::user()->guru_id);
        $drug = TaliaYogas::find($id);
        $taliatype=TaliaYogasType::where('drug_taliayogas_id',$id)->get();
        $drugHistoryLog = DrugHistoryLog::where('taila_id',$id)->first();

        if($user_type==1 || $user_type==2)
        {
            $id=$drug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.edit-talia-drugs",compact('drug','guru','taliatype','shishyarecord','drugHistoryLog'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.edit-talia-drugs",compact('drug','guru','taliatype','drugHistoryLog'));
        }

    }

    public function view_talia_drugs(Request $request,$id)
    {
        $user_type=Auth::user()->user_type;
        $id= decrypt($id);
        $guru=get_guru_list(Auth::user()->guru_id);
        $drug = TaliaYogas::find($id);

        $taliatype=TaliaYogasType::where('drug_taliayogas_id',$id)->get();

        if($user_type==1 || $user_type==2)
        {
            $id=$drug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.view-talia-drugs",compact('drug','guru','taliatype','shishyarecord'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.view-talia-drugs",compact('drug','guru','taliatype'));
        }

    }

    public function update_taliayoga_details(Request $request)
    {
        $request->validate(
        [
            'talia_yoga_type_individual' => 'required',

        ]);
        $id=$request->drug_id;
        $input = $request->all();
        $drug = TaliaYogas::find($id);
        // $drug->update($input);
        // Find the data before updating
        $modelBeforeUpdate = TaliaYogas::find($id);
        // Update the model
        $drug->update($input);
        // Find the data after updating
        $modelAfterUpdate = TaliaYogas::find($id);

        // Check for changes
        if ($modelBeforeUpdate && $modelAfterUpdate) {
            $finalArray = array_diff_assoc($modelAfterUpdate->getAttributes(), $modelBeforeUpdate->getAttributes());
            if($request->comosition_update > 0){
                $comositionUpdate['comosition_update'] = 'add_composition_extra';
                $finalArray = array_merge($comositionUpdate,$finalArray);
            }
            unset($finalArray['updated_at']);
            if(!empty($finalArray)){
                $changesData = json_encode($finalArray);
                DrugHistoryLog::updateOrCreate(
                    [
                        'taila_id'   => $id

                    ],
                    [
                        'data' => $changesData,
                        'taila_id' => $id,
                        'user_id' => Auth::id(),
                        'user_type' => Auth::user()->user_type,
                    ]
                );
            }else{
                DrugHistoryLog::where('taila_id',$id)->delete();
            }
        }

        $name_of_the_ingredients = $request->name_of_the_ingredients;
        $part_used=$request->part_used;
        $quantity=$request->quantity;
        $drug_part_id=$request->drug_part_id;


        if($name_of_the_ingredients != null)
            for($i=0; $i<count($name_of_the_ingredients); $i++)
            {
               if(empty($name_of_the_ingredients[$i]))
               {
                continue;
               }
               $id=$drug_part_id[$i];

               if($id==0)
               {

                   $taliatype=new TaliaYogasType;
                   $taliatype->name_of_the_ingredients=$name_of_the_ingredients[$i];
                   $taliatype->part_used=$part_used[$i];
                   $taliatype->quantity=$quantity[$i];
                   $taliatype->drug_taliayogas_id=$drug->id;
                   $taliatype->save();
                }
               else
               {
                   $taliatype=TaliaYogasType::find($id);
                   $taliatype->name_of_the_ingredients=$name_of_the_ingredients[$i];
                   $taliatype->part_used=$part_used[$i];
                   $taliatype->quantity=$quantity[$i];
                   $taliatype->drug_taliayogas_id=$drug->id;
                   $taliatype->save();
               }
            }
        else
        {
             return redirect()->back()->with('success', 'Taila Yogas  updated successfully');
        }

         return redirect()->back()->with('success', 'Taila Yogas  updated successfully');
    }

     public function delete_taliyayoga_type($id)
    {

        $vatitype = TaliaYogasType::find($id);
        $vatitype->delete();
        return redirect()->back()->with('Error', 'Taila Yogas type deleted successfully');
    }

    /*ArishtaYoga Yogas*/

    public function arishta_yoga_details(Request $request)
    {
        request()->validate([
            'arishtayoga_type_individual' => 'required',
        ]);
        $input = $request->all();
        //return $input;
        $arishta = ArishtaYoga::create($input);
        $name_of_the_ingredients=$request->name_of_the_ingredients;
        $part_used=$request->part_used;
        $quantity=$request->quantity;


        //dd($images);

        for($i=0; $i<count($name_of_the_ingredients); $i++)
        {
           $arishtatype=new ArishtaYogaType;
           $arishtatype->name_of_the_ingredients=$name_of_the_ingredients[$i];
           $arishtatype->part_used=$part_used[$i];
           $arishtatype->quantity=$quantity[$i];
           $arishtatype->drug_arishtayogas_id=$arishta->id;
           $arishtatype->save();

        }
        return redirect()->back()->with('success', 'Drug Report Added Successfully');
    }

    public function edit_arishta_drugs(Request $request,$id)
    {
        $id= decrypt($id);
        $user_type=Auth::user()->user_type;
        $guru=get_guru_list(Auth::user()->guru_id);
        $drug = ArishtaYoga::find($id);
        $arishtatype=ArishtaYogaType::where('drug_arishtayogas_id',$id)->get();
        $drugHistoryLog = DrugHistoryLog::where('aswa_id',$id)->first();
        if($user_type==1 || $user_type==2)
        {
            $id=$drug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.edit-arishtatype-drugs",compact('drug','guru','arishtatype','shishyarecord','drugHistoryLog'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.edit-arishtatype-drugs",compact('drug','guru','arishtatype','drugHistoryLog'));
        }
    }

    public function view_arishta_drugs(Request $request,$id)
    {
        $id= decrypt($id);
        $user_type=Auth::user()->user_type;
        $guru=get_guru_list(Auth::user()->guru_id);
        $drug = ArishtaYoga::find($id);

        $arishtatype=ArishtaYogaType::where('drug_arishtayogas_id',$id)->get();

        if($user_type==1 || $user_type==2)
        {
            $id=$drug->shishya_id;
            $shishyarecord=User::find($id);
            $guru_id=$shishyarecord->guru_id;
            $guru=User::where('id',$guru_id)->first();
            return view("drugs.view-arishtatype-drugs",compact('drug','guru','arishtatype','shishyarecord'));
        }
        else
        {
            $guru=get_guru_list(Auth::user()->guru_id);
            return view("drugs.view-arishtatype-drugs",compact('drug','guru','arishtatype'));
        }
    }

    public function update_arishta_details(Request $request)
    {
        request()->validate([
            'arishtayoga_type_individual' => 'required',
        ]);
        $id=$request->drug_id;
        $input = $request->all();
        $drug = ArishtaYoga::find($id);
        // $drug->update($input);
        // Find the data before updating
        $modelBeforeUpdate = ArishtaYoga::find($id);
        // Update the model
        $drug->update($input);
        // Find the data after updating
        $modelAfterUpdate = ArishtaYoga::find($id);

        // Check for changes
        if ($modelBeforeUpdate && $modelAfterUpdate) {
            $finalArray = array_diff_assoc($modelAfterUpdate->getAttributes(), $modelBeforeUpdate->getAttributes());
            if($request->comosition_update > 0){
                $comositionUpdate['comosition_update'] = 'add_composition_extra';
                $finalArray = array_merge($comositionUpdate,$finalArray);
            }
            unset($finalArray['updated_at']);
            if(!empty($finalArray)){
                $changesData = json_encode($finalArray);
                DrugHistoryLog::updateOrCreate(
                    [
                        'aswa_id'   => $id

                    ],
                    [
                        'data' => $changesData,
                        'aswa_id' => $id,
                        'user_id' => Auth::id(),
                        'user_type' => Auth::user()->user_type,
                    ]
                );
            }else{
                DrugHistoryLog::where('aswa_id',$id)->delete();
            }
        }

        $name_of_the_ingredients = $request->name_of_the_ingredients;
        $part_used=$request->part_used;
        $quantity=$request->quantity;
        $drug_part_id=$request->drug_part_id;


        if($name_of_the_ingredients != null)
            for($i=0; $i<count($name_of_the_ingredients); $i++)
            {
               if(empty($name_of_the_ingredients[$i]))
               {
                continue;
               }
               $id=$drug_part_id[$i];
               if($id==0)
               {
                   $arishta=new ArishtaYogaType;
                   $arishta->name_of_the_ingredients=$name_of_the_ingredients[$i];
                   $arishta->part_used=$part_used[$i];
                   $arishta->quantity=$quantity[$i];
                   $arishta->drug_arishtayogas_id=$drug->id;
                   $arishta->save();
                }
               else
               {
                   $arishta=ArishtaYogaType::find($id);
                   $arishta->name_of_the_ingredients=$name_of_the_ingredients[$i];
                   $arishta->part_used=$part_used[$i];
                   $arishta->quantity=$quantity[$i];
                   $arishta->drug_arishtayogas_id=$drug->id;
                   $arishta->save();
               }
            }
        else
        {
             return redirect()->back()->with('success', 'Arishta Yogas  updated successfully');
        }

         return redirect()->back()->with('success', 'Arishta Yogas  updated successfully');
    }

    public function delete_arishta_type($id)
    {

        $vatitype = ArishtaYogaType::find($id);
        $vatitype->delete();
        return redirect()->back()->with('Error', 'Arishta Yoga deleted successfully');
    }

    public function admin_drug_report_history(Request $request)
    {
        $shishya=User::where('user_type',3)->get();
        return view('drugs.admin.admin-drug-report-history',compact('shishya'));
    }



    public function admin_filter_drug_report(Request $request)
    {
       $shishya=User::where('user_type',3)->get();
       $shishya_id=$request->shishya_id;
       $from_date=$request->from_date;
       $to_date=$request->to_date;
       $yogas_type=$request->yogas_type;
            if(request()->yogas_type==1)
            {
                /* $drugslist = ChurnaYoga::whereBetween('created_at',[$from_date,$to_date])->where('shishya_id',$shishya_id)->get();*/
                $drugslist = ChurnaYoga::with('drugHistory')->where('date_of_yogas','>=',date("Y-m-d",strtotime($from_date)))->where('date_of_yogas','<=',date("Y-m-d",strtotime($to_date)))
                ->where('shishya_id',$shishya_id)->get();
            }

            elseif(request()->yogas_type==2)
            {
                $drugslist = RasaYoga::with('drugHistory')->where('date_of_yogas','>=',date("Y-m-d",strtotime($from_date)))->where('date_of_yogas','<=',date("Y-m-d",strtotime($to_date)))
                ->where('shishya_id',$shishya_id)->get();
            }
            elseif(request()->yogas_type==3)
            {
                $drugslist = VatiYoga::with('drugHistory')->where('date_of_yogas','>=',date("Y-m-d",strtotime($from_date)))->where('date_of_yogas','<=',date("Y-m-d",strtotime($to_date)))
                ->where('shishya_id',$shishya_id)->get();
            }
            elseif(request()->yogas_type==4)
            {
                $drugslist = TaliaYogas::with('drugHistory')->where('date_of_yogas','>=',date("Y-m-d",strtotime($from_date)))->where('date_of_yogas','<=',date("Y-m-d",strtotime($to_date)))
                ->where('shishya_id',$shishya_id)->get();
            }
            elseif(request()->yogas_type==5)
            {
                $drugslist = ArishtaYoga::with('drugHistory')->where('date_of_yogas','>=',date("Y-m-d",strtotime($from_date)))->where('date_of_yogas','<=',date("Y-m-d",strtotime($to_date)))
                ->where('shishya_id',$shishya_id)->get();
            }
           return view('drugs.admin.admin-drug-report-history',compact('drugslist','shishya'));
    }

    public function delete_churan_yoga($id)
    {
        $id= decrypt($id);
        $drug = ChurnaYoga::find($id);
        $drug->delete();
        return redirect()->back()->with('success', 'Churna Yogas  Deleted Successfully');
    }

    public function delete_rasa_yoga($id)
    {
        $id= decrypt($id);
        $drug = RasaYoga::find($id);
        $drug->delete();
        return redirect()->back()->with('success', 'Rasa Yogas  Deleted Successfully');
    }

    public function delete_vati_yoga($id)
    {
        $id= decrypt($id);
        $drug = VatiYoga::find($id);
        $drug->delete();
        return redirect()->back()->with('success', 'Vati Yogas  Deleted Successfully');
    }

    public function delete_talia_yoga($id)
    {
        $id= decrypt($id);
        $drug = TaliaYogas::find($id);
        $drug->delete();
        return redirect()->back()->with('success', 'Talia Yogas  Deleted Successfully');
    }

    public function delete_arishta_yoga($id)
    {
        $id= decrypt($id);
        $drug = ArishtaYoga::find($id);
        $drug->delete();
        return redirect()->back()->with('success', 'Arishta Yogas  Deleted Successfully');
    }

}
