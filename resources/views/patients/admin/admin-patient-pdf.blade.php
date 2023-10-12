<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .main_container {
            display: grid;
            grid-template-columns: auto auto auto auto;
        }

        .main_container div {
            margin: 10px;
            background-color: #eaeaea;
            padding: 13px 13px 0;
            border-radius: 6px;
            font-size: 10px;
            display: inline-block ;
            width: 25%;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Patient History</h1>
    <div class="container">
        <div class="main_container" >
            <div class="first" >
                <strong>Name of the Guru</strong>
                <p>{{ @$guru->firstname.' '.@$guru->middlename.' '.@$guru->lastname}}</p>
            </div>
            <div class="second" >
                <strong>Place of the Guru</strong>
                <p>{{@$guru->city_name}}</p>
            </div>
            <div class="third" >
                <strong>Name of the Shishya</strong>
                <p>{{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lastname}}</p>
            </div>
            <div class="fourth" >
                <strong>Date of Report</strong>
                <p>{{date('d-m-y',strtotime($patient->registration_date))}}</p>
            </div>
            <div class="third" >
                <strong>Patients Type</strong>
                <p>{{$patient->patient_type}}</p>
            </div>
            
            <div class="third" >
                <strong>Name of the Patient</strong>
                <p>{{$patient->patient_name}}</p>
            </div>
            <div class="fourth" >
                <strong>Patient Registration No</strong>
                <p>{{ $patient->registration_no }}</p>
            </div>
            <div class="fourth" >
                <strong>Age</strong>
                <p>{{$patient->age}} Yrs.</p>
            </div>
            <div class="fourth" >
                <strong>Registration Date</strong>
                <p>{{date('d-m-y',strtotime($patient->registration_date))}}</p>
            </div>

            <div class="fourth" >
                <strong>Gender</strong>
                <p>
                    @foreach(__('phr.gender') as $key=>$value)
                        {{$patient->gender == $key  ? $value : ''}}</option>
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>Age Group</strong>
                <p>
                    @foreach(__('phr.age_group') as $key=>$value)
                        {{$patient->age_group == $key  ? $value : ''}}</option>
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>Occupation</strong>
                <p>
                    @foreach(__('phr.occupation') as $key=>$value)
                        {{$patient->occupation == $key  ? $value : ''}}</option>
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>Marital Status</strong>
                <p>
                    @foreach(__('phr.marital_status') as $key=>$value)
                        {{$patient->marital_status == $key  ? $value : ''}}</option>
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>Aasan Sidhi</strong>
                <p>{{$patient->aasan_sidhi}}</p>
            </div>
            <div class="fourth" >
                <strong>Season</strong>
                <p>{{$patient->season}}</p>
            </div>
            <div class="fourth" >
                <strong>Region of patient</strong>
                <p>
                    @foreach(__('phr.region_of_patient') as $key=>$value)
                        {{$patient->region_of_patient == $key  ? $value : ''}}</option>
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>Address</strong>
                <p>{{$patient->address}}</p>
            </div>
            <div class="fourth" >
                <strong>1. Main Complaint(As said by patient)</strong>
                <p>{{$patient->main_complaintsaid_by_patient}}</p>
            </div>
            <div class="fourth" >
                <strong>Duration</strong>
                <p>{{$patient->said_by_patient_duration}}</p>
            </div>
            <div class="fourth" >
                <strong>2. Main Complaint(As said by family member)</strong>
                <p>{{$patient->main_complaint_as_said_by_family}}</p>
            </div>
            <div class="fourth" >
                <strong>Duration</strong>
                <p>{{$patient->complaint_as_said_by_family_duration}}</p>
            </div>
            <div class="fourth" >
                <strong>3. Past illness</strong>
                <p>{{$patient->past_illness}}</p>
            </div>
            <div class="fourth" >
                <strong>4. Family History</strong>
                <p>{{$patient->family_history}}</p>
            </div>
            <div class="fourth" >
                <strong>(i) Skin</strong>
                <p>
                    @foreach(__('phr.skin') as $key=>$value)
                        {{$patient->skin == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(ii) Nadi</strong>
                <p>
                    @foreach(__('phr.nadi') as $key=>$value)
                        {{$patient->nadi == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>(iii)Place</strong>
                <p>
                    @foreach(__('phr.place') as $key=>$value)
                        {{$patient->place == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(iv) Nails</strong>
                <p>
                    @foreach(__('phr.nails') as $key=>$value)
                        {{$patient->nails == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(v) Anguli sandhi</strong>
                <p>
                    @foreach(__('phr.anguli_sandhi') as $key=>$value)
                        {{$patient->anguli_sandhi == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(vi) Netra</strong>
                <p>
                    @foreach(__('phr.netra') as $key=>$value)
                        {{$patient->netra == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>(vii) Adhovartma</strong>
                <p>
                    @foreach(__('phr.adhovartma') as $key=>$value)
                        {{$patient->adhovartma == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(viii) Hastatala</strong>
                <p>
                    @foreach(__('phr.hastatala') as $key=>$value)
                        {{$patient->hastatala == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(ix) Jihwa</strong>
                <p>
                    @foreach(__('phr.jihwa') as $key=>$value)
                        {{$patient->jihwa == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(x) Aakriti</strong>
                <p>
                    @foreach(__('phr.aakriti') as $key=>$value)
                        {{$patient->aakriti == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>(xi) Shabda</strong>
                <p>
                    @foreach(__('phr.shabda') as $key=>$value)
                        {{$patient->shabda == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xii) Koshtha</strong>
                <p>
                    @foreach(__('phr.koshtha') as $key=>$value)
                        {{$patient->koshtha == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xiii) Agni</strong>
                <p>
                    @foreach(__('phr.agni') as $key=>$value)
                        {{$patient->agni == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xiv) Mala Pravritti</strong>
                <p>
                    @foreach(__('phr.mala_pravritti') as $key=>$value)
                        {{$patient->mala_pravritti == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>(xxv) Mutra Pravritti</strong>
                <p>
                    @foreach(__('phr.mutra_pravritti') as $key=>$value)
                        {{$patient->mutra_pravritti == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xvi) Vyavay Pravritti</strong>
                <p>
                    @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                        {{$patient->vyavay_pravritti == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xvii)Shukrakshana pravritti</strong>
                <p>
                    @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                        {{$patient->shukrakshana_pravritti == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xviii) Aartava Pravritti Kala</strong>
                <p>
                    @foreach(__('phr.aartava_pravratti_kala') as $key=>$value)
                        {{$patient->aartava_pravratti_kala == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>(xix) Dehoshma</strong>
                <p>
                    @foreach(__('phr.dehoshma') as $key=>$value)
                        {{$patient->dehoshma == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xx) Bhara</strong>
                <p>{{$patient->bhara}}</p>
            </div>
            <div class="fourth" >
                <strong>(xxi) Raktachapa</strong>
                <p>
                    @foreach(__('phr.raktachapa') as $key=>$value)
                        {{$patient->raktachapa == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xxii) Hrid gati</strong>
                <p>
                    @foreach(__('phr.hrid_gati') as $key=>$value)
                        {{$patient->hrid_gati == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>

            <div class="fourth" >
                <strong>(xxiii) Shvasagati</strong>
                <p>
                    @foreach(__('phr.shvasagati') as $key=>$value)
                        {{$patient->shvasagati == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>(xxiv) Parkriti Parikshana</strong>
                <p>
                    @foreach(__('phr.parkriti_parikshana') as $key=>$value)
                        {{$patient->parkriti_parikshana == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>6. Examination by Physician</strong>
                <p>
                    @foreach(__('phr.examination_by_physician') as $key=>$value)
                        {{$patient->examination_by_physician == $key  ? $value : ''}}
                    @endforeach
                </p>
            </div>
            <div class="fourth" >
                <strong>7. Prayogashaliya Parikshana</strong>
                <p>{{$patient->prayogashaliya_parikshana}}</p>
            </div>

            <div class="fourth" >
                <strong>8. Samprapti Vivarana</strong>
                <p>{{$patient->samprapti_vivarana}}</p>
            </div>
            <div class="fourth" >
                <strong>9. Vibhedaka Pariksha</strong>
                <p>{{$patient->vibhedaka_pariksha}}</p>
            </div>
            <div class="fourth" >
                <strong>10. Roga Vinishchaya- Pramukh Nidana</strong>
                <p>{{$patient->roga_vinishchaya_pramukh_nidana}}</p>
            </div>
            <div class="fourth" >
                <strong>11. Chikitsa Kalpana Anupana Sahita</strong>
                <p>{{$patient->chikitsa_kalpana_anupana_sahita}}</p>
            </div>
            <div class="fourth" >
                <strong>Samshodhana Kriyas</strong>
                <p>{{$patient->samshodhana_kriyas}}</p>
            </div>
            <div class="fourth" >
                <strong>Samshamana Kriyas</strong>
                <p>{{$patient->samshamana_kriyas}}</p>
            </div>
            <div class="fourth" >
                <strong>12. Pathya-Apathya (Annexure-1)</strong>
                <p>{{$patient->pathya_apathya}}</p>
            </div>

            <div class="fourth" >
                <strong>Shishya's E-Sign</strong><br>
                @if($shishya->e_sign!='')
                <img src="{{ public_path('uploads/'.$shishya->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                @endif
                <br>
                ( @if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif {{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lastname}})
            </div>
            <div class="fourth" >
                <strong>Guru's E-Sign</strong><br>                
                @if(!empty($guru->id))
                @if($guru->e_sign!='')
                <img src="{{ public_path('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                @endif
                <br>
                ( @if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}})
                @endif
            </div>
            
        </div>
    </div>
</body>
</html>