@extends('layouts.app-file')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://www.equitrust.com/DependencyHandler.axd?s=L2Nzcy9saWJzL2Jvb3RzdHJhcC5taW4uY3NzOy9jc3Mvc3R5bGVzLmNzczsvY3NzL2NvcnBvcmF0ZS1zaXRlLXNwZWNpZmljLmNzczs&amp;t=Css&amp;cdv=1188174677" rel="stylesheet" type="text/css" />
<style>
   
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

.top_margin{
    margin-top:100px;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.js"></script>
    <script>
        $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
      </script>
<div class="container top_margin">
  
  <div class="stepwizard col-md-offset-3">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
          <a href="#step-1" type="button" class="btn btn-primary">1</a>
          <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-2" type="button" class="btn btn-default" disabled="disabled">2</a>
          <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-3" type="button" class="btn btn-default" disabled="disabled">3</a>
          <p>Step 3</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default" disabled="disabled">4</a>
            <p>Step 4</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-5" type="button" class="btn btn-default" disabled="disabled">5</a>
            <p>Step 5</p>
        </div>
      </div>
    </div>
    
    <form role="form" action="" method="post">
      <div class="row setup-content" id="step-1">
        <div class="col-xs-6 col-md-offset-3">
          <div class="col-md-12">
            <h3> Step 1</h3>
            <div class="card">
                                            <div class="card-body">
                                                <form>

                                                    <div class="row"></div>
                                                    <!-- student name -->

                                                    <div class="form-group">
                                                        <label
                                                            for="exampleInputEmail1">Student's
                                                            Name</label>
                                                        <input type="text"
                                                            class="form-control"
                                                            id="exampleInputEmail1"
                                                            aria-describedby="emailHelp"
                                                            placeholder="Enter
                                                            your Name">

                                                    </div>

                                                    <!-- guru name -->
                                                    <div class="form-group">
                                                        <label for="guru">Guru's
                                                            Name</label>
                                                        <input type="text"
                                                            class="form-control
                                                            bg-light" id="guru"
                                                            aria-describedby="emailHelp"
                                                            placeholder="Guru's
                                                            Name">

                                                    </div>



                                                    <div class="form-group phr">
                                                        <label for="student">Patient
                                                            History Report (PHR)
                                                            (with month name)</label><br>
                                                        <div class="phr">
                                                            <div class="d-flex
                                                                justify-content-between">
                                                                <div>
                                                                    <label
                                                                        for="student">From:</label>
                                                                    <input
                                                                        type="date"
                                                                        class="date"
                                                                        id="student"
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Enter
                                                                        your
                                                                        Name">
                                                                </div>
                                                                <div>
                                                                    <label
                                                                        for="student">To:</label>
                                                                    <input
                                                                        type="date"
                                                                        class="date"
                                                                        id="student"
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Enter
                                                                        your
                                                                        Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group phr">
                                                        <label for="student">Quartely
                                                            Follow-up Report
                                                            (with
                                                            month name)</label><br>
                                                        <div class="phr">
                                                            <div class="d-flex
                                                                justify-content-between">
                                                                <div>
                                                                    <label
                                                                        for="student">From:</label>
                                                                    <input
                                                                        type="date"
                                                                        class="date"
                                                                        id="student"
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Enter
                                                                        your
                                                                        Name">
                                                                </div>
                                                                <div>
                                                                    <label
                                                                        for="student">To:</label>
                                                                    <input
                                                                        type="date"
                                                                        class="date"
                                                                        id="student"
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Enter
                                                                        your
                                                                        Name">
                                                                </div>
                                                            </div>
                                                            <div class="sign
                                                                d-flex
                                                                justify-content-between">
                                                                <div
                                                                    class="sign-student">
                                                                    <div
                                                                        class="sign-img">
                                                                        <img
                                                                            src="./sign_student.webp"
                                                                            alt="">
                                                                    </div>

                                                                    <div
                                                                        class="sign-text">
                                                                        <p>Student's
                                                                            Signature</p>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="sign-guru">
                                                                    <div
                                                                        class="sign-img">
                                                                        <img
                                                                            src="./guru_sign.svg"
                                                                            alt="">
                                                                    </div>

                                                                    <div
                                                                        class="sign-text">
                                                                        <p>Student's
                                                                            Signature</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-2">
        <div class="col-xs-6 col-md-offset-3">
          <div class="col-md-12">
            <h3> Step 2</h3>
            <div class="card">

                                          <form action="" class="form2 " style=" padding:25px ; padding-bottom: 50px; font-size: 17px;">
                                            <div>
                                            <label for="registration_no">Registration No.</label>
                                            <input type="text" id="registration_no">
                                            </div>
                                            <div>
                                            <label for="Date">Date</label>
                                            <input type="Date" id="Registration No.">
                                        </div>
                                            <label for="patient_name">Name of Patient</label>
                                            <input type="text" id="patient_name">
                                        <div>
                                            <label for="Diagnosis">Diagnosis</label>
                                            <input type="text" id="Diagnosis">
                                        </div>
                                        <div class="col-12 flex-row-reverse">
                                        <button type="submit" type="btn" class="btn-primary" style="padding: 5px 20px; border-radius: 5px; float: right;">Add </button>

                                    </div>
                                          </form>
                                        </div>      
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"
                                                                style="border:
                                                                1px solid
                                                                grey">S.No</th>
                                                            <th scope="col"
                                                                style="border:
                                                                1px solid
                                                                grey">Registration
                                                                No.</th>
                                                            <th scope="col"
                                                                style="border:
                                                                1px solid
                                                                grey">Date</th>
                                                            <th scope="col"
                                                                style="border:
                                                                1px solid
                                                                grey">Name
                                                                of Patient</th>
                                                            <th scope="col"
                                                                style="border:
                                                                1px solid
                                                                grey">Diagnosis</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"
                                                                style="border:
                                                                1px solid
                                                                grey">1</th>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                style="border:
                                                                1px solid
                                                                grey">2</th>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"
                                                                style="border:
                                                                1px solid
                                                                grey">3</th>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                            <td
                                                                style="border:
                                                                1px solid
                                                                grey"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-3">
        <div class="col-xs-6 col-md-offset-3">
          <div class="col-md-12">
            <h3> Step 3</h3>
            <div class="card">
                                                    <form
                                                        class="javavoid(0)">
                                                        <input type="hidden"
                                                            name="_token"
                                                            value="qEBZKXBwudobGEeMoF6ejMmjkdjX0G7ybzeMRwlU">
                                                        <div
                                                            class="card-body">
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Name of the Guru<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="text"
                                                                            name="name_of_the_guru"
                                                                            class="form-control"
                                                                            placeholder="Name of the Guru"
                                                                            aria-label="Name"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Place of the Guru<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="text"
                                                                            name="place"
                                                                            class="form-control"
                                                                            placeholder="Place"
                                                                            aria-label="Name"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Name of the Shishya<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="text"
                                                                            name="name_of_the_shishya"
                                                                            class="form-control"
                                                                            placeholder="Name of the Shishya"
                                                                            aria-label="Name"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Date of Report<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="date"
                                                                            name="date"
                                                                            class="form-control"
                                                                            placeholder="Date"
                                                                            aria-label="Name"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr
                                                                style="height:2px;">
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Name of the Patient<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="text"
                                                                            name="name_of_the_patient"
                                                                            class="form-control"
                                                                            placeholder="Name of the Patient"
                                                                            aria-label="Email"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Registration No<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="text"
                                                                            name="registration_no"
                                                                            class="form-control"
                                                                            placeholder="Registration No"
                                                                            aria-label=""
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Age<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="text"
                                                                            name="age"
                                                                            class="form-control"
                                                                            placeholder="Age"
                                                                            aria-label="Phone"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Registration Date<span
                                                                                class="text-danger">*</span></label>
                                                                        <input
                                                                            type="date"
                                                                            name="admit_date"
                                                                            class="form-control"
                                                                            placeholder="Date"
                                                                            aria-label="Date"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Gender"
                                                                            class="form-control-label">Gender<span
                                                                                class="text-danger">*</span></label>
                                                                        <select
                                                                            name="gender"
                                                                            id="Gender"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Male">Male</option>
                                                                            <option
                                                                                value="Female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Age Group<span
                                                                                class="text-danger">*</span></label>
                                                                        <select
                                                                            name="age_group"
                                                                            id="Age"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please select</option>
                                                                            <option
                                                                                value="Child">Child</option>
                                                                            <option
                                                                                value="Young">Young</option>
                                                                            <option
                                                                                value="Old">Old</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Occupation<span
                                                                                class="text-danger">*</span></label>
                                                                        <select
                                                                            name="occupation"
                                                                            id="occupation"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Child">Private</option>
                                                                            <option
                                                                                value="Young">Bussinesman</option>
                                                                            <option
                                                                                value="Old">Goverment</option>
                                                                            <option
                                                                                value="Old">Semiprivate</option>
                                                                            <option
                                                                                value="Old">Others</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Marital Status<span
                                                                                class="text-danger">*</span></label>
                                                                        <select
                                                                            name="marital_status"
                                                                            id="Marital
                                                                            Status"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please select</option>
                                                                            <option
                                                                                value="Married">Married</option>
                                                                            <option
                                                                                value="Unmarried">Unmarried</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Aasan Sidhi</label>
                                                                        <input
                                                                            type="text"
                                                                            name="aasan_sidhi"
                                                                            class="form-control"
                                                                            placeholder="Aasan
                                                                            Sidhi"
                                                                            aria-label="Aasan
                                                                            Sidhi"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Season</label>
                                                                        <input
                                                                            type="text"
                                                                            name="season"
                                                                            class="form-control"
                                                                            placeholder="Season"
                                                                            aria-label="Aasan
                                                                            Sidhi"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-in
                                                                            put"
                                                                            class="form-control-label">Region of patient</label>
                                                                        <select
                                                                            name="region_of_patient"
                                                                            id="Region
                                                                            of
                                                                            patient"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please select</option>
                                                                            <option
                                                                                value="Jamgala">Jamgala</option>
                                                                            <option
                                                                                value="Anupa">Anupa</option>
                                                                            <option
                                                                                value="Sadharana">Sadharana</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Address<span
                                                                                class="text-danger">*</span></label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="address"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="Address"
                                                                            placeholder="Street Address"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">1. Main Complaint(As said by patient)</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="main_complaint_as_said_by_patient"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="main_complaint_as_said_by_patient"
                                                                            placeholder="Main Complaint"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Duration</label>
                                                                        <input
                                                                            type="text"
                                                                            name="complaint_as_said_by_main_complaint_as_said_by_patient_duration"
                                                                            class="form-control"
                                                                            placeholder="Duration"
                                                                            aria-label="Duration"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">2. Main Complaint(As said by family member)</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="main_complaint_as_said_by_family"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="main_complaint_as_said_by_family"
                                                                            placeholder="Main Complaint"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Duration</label>
                                                                        <input
                                                                            type="text"
                                                                            name="complaint_as_said_by_family_duration"
                                                                            class="form-control"
                                                                            placeholder="Duration"
                                                                            aria-label="Duration"
                                                                            value=""
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">3. Past illness</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="past_illness"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="Address"
                                                                            placeholder="Past illness"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">4.
                                                                            Family
                                                                            History</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="family_history"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="family_history"
                                                                            placeholder="Family History"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-12">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">5.
                                                                            Examination
                                                                            of
                                                                            the
                                                                            patient</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Skin">1)
                                                                            Skin</label>
                                                                        <select
                                                                            name="skin"
                                                                            id="Skin"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Touch-Shita">Touch-Shita</option>
                                                                            <option
                                                                                value="Ushna">Ushna</option>
                                                                            <option
                                                                                value="Swedala">Swedala</option>
                                                                            <option
                                                                                value="Ruksha">Ruksha</option>
                                                                            <option
                                                                                value="Shushka">Shushka</option>
                                                                            <option
                                                                                value="Shitala">Shitala</option>
                                                                            <option
                                                                                value="kathinya">kathinya</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Nadi">2)
                                                                            Nadi</label>
                                                                        <select
                                                                            name="nadi"
                                                                            id="Nadi"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Tivra">Tivra</option>
                                                                            <option
                                                                                value="Sama">Sama</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Place">Place</label>
                                                                        <select
                                                                            name="nadi_place"
                                                                            id="Place"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Antah">Antah</option>
                                                                            <option
                                                                                value="Madhya">Madhya</option>
                                                                            <option
                                                                                value="Bahya">Bahya</option>
                                                                            <option
                                                                                value="Peedanavastha">Peedanavastha</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Nails">3)
                                                                            Nails</label>
                                                                        <select
                                                                            name="nails"
                                                                            id="Nails"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Kathinya">Kathinya</option>
                                                                            <option
                                                                                value="Mridu">Mridu</option>
                                                                            <option
                                                                                value="Rekhankita">Rekhankita</option>
                                                                            <option
                                                                                value="Kurchakara">Kurchakara</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Nails">4)
                                                                            Anguli
                                                                            sandhi</label>
                                                                        <select
                                                                            name="anguli_sandhi"
                                                                            id="Anguli
                                                                            sandhi"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Kathinyata">Kathinyata</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Ubharata">Ubharata</option>
                                                                            <option
                                                                                value="Vakrata">Vakrata</option>
                                                                            <option
                                                                                value="Abha">Abha</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Netra">5)
                                                                            Netra</label>
                                                                        <select
                                                                            name="netra"
                                                                            id="Netra"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Shvetabhaga">Shvetabhaga</option>
                                                                            <option
                                                                                value="Shweta">Shweta</option>
                                                                            <option
                                                                                value="Dhusarita">Dhusarita</option>
                                                                            <option
                                                                                value="Rakta
                                                                                Keshika">Rakta
                                                                                Keshika</option>
                                                                            <option
                                                                                value="Peeta">Peeta</option>
                                                                            <option
                                                                                value="Neela">Neela</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Adhovartma">6)
                                                                            Adhovartma</label>
                                                                        <select
                                                                            name="adhovartma"
                                                                            id="Adhovartma"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Shofa">Shofa</option>
                                                                            <option
                                                                                value="Syahata">Syahata</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Hastatala">7)
                                                                            Hastatala</label>
                                                                        <select
                                                                            name="hastatala"
                                                                            id="Hastatala"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Shitala">Shitala</option>
                                                                            <option
                                                                                value="Shushka">Shushka</option>
                                                                            <option
                                                                                value="Kathora/Mridu">Kathora/Mridu</option>
                                                                            <option
                                                                                value="Ushna">Ushna</option>
                                                                            <option
                                                                                value="Swedala">Swedala</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Jihwa">8)
                                                                            Jihwa</label>
                                                                        <select
                                                                            name="jihwa"
                                                                            id="Jihwa"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Rukshta">Rukshta</option>
                                                                            <option
                                                                                value="Shushkata">Shushkata</option>
                                                                            <option
                                                                                value="Sphutita">Sphutita</option>
                                                                            <option
                                                                                value="Aavarta">Aavarta</option>
                                                                            <option
                                                                                value="Krishna">Krishna</option>
                                                                            <option
                                                                                value="Aakritiwan">Aakritiwan</option>
                                                                            <option
                                                                                value="Konakar">Konakar</option>
                                                                            <option
                                                                                value="Kurchakar">Kurchakar</option>
                                                                            <option
                                                                                value="Srawi">Srawi</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Aakriti">9)
                                                                            Aakriti</label>
                                                                        <select
                                                                            name="aakriti"
                                                                            id="Aakriti"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Pandur">Pandur</option>
                                                                            <option
                                                                                value="Aabhawan">Aabhawan</option>
                                                                            <option
                                                                                value="Shotha">Shotha</option>
                                                                            <option
                                                                                value="Syahata">Syahata</option>
                                                                            <option
                                                                                value="Neelima">Neelima</option>
                                                                            <option
                                                                                value="Vakarta">Vakarta</option>
                                                                            <option
                                                                                value="Arati">Arati</option>
                                                                            <option
                                                                                value="Aartta">Aartta</option>
                                                                            <option
                                                                                value="Bhavuka">Bhavuka</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Shabda">10)
                                                                            Shabda</label>
                                                                        <select
                                                                            name="shabda"
                                                                            id="Shabda"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Kathora">Kathora</option>
                                                                            <option
                                                                                value="Aartta">Aartta</option>
                                                                            <option
                                                                                value="Sphuta">Sphuta</option>
                                                                            <option
                                                                                value="Manda">Manda</option>
                                                                            <option
                                                                                value="Abhava">Abhava</option>
                                                                            <option
                                                                                value="Gambhir">Gambhir</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Koshtha">11)
                                                                            Koshtha</label>
                                                                        <select
                                                                            name="koshtha"
                                                                            id="Koshtha"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Krura">Krura</option>
                                                                            <option
                                                                                value="Mridu">Mridu</option>
                                                                            <option
                                                                                value="Madhya">Madhya</option>
                                                                            <option
                                                                                value="Sama">Sama</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Agni">12)
                                                                            Agni</label>
                                                                        <select
                                                                            name="agni"
                                                                            id="Agni"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Manda">Manda</option>
                                                                            <option
                                                                                value="Tivra">Tivra</option>
                                                                            <option
                                                                                value="Sama">Sama</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Mala
                                                                            Pravritti">13)
                                                                            Mala
                                                                            Pravritti</label>
                                                                        <select
                                                                            name="mala_pravritti"
                                                                            id="Mala
                                                                            Pravritti"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Alpa">Alpa</option>
                                                                            <option
                                                                                value="Adhika">Adhika</option>
                                                                            <option
                                                                                value="Sankya">Sankya</option>
                                                                            <option
                                                                                value="Ushnata">Ushnata</option>
                                                                            <option
                                                                                value="Shitala">Shitala</option>
                                                                            <option
                                                                                value="Lalasravi">Lalasravi</option>
                                                                            <option
                                                                                value="Rakta">Rakta</option>
                                                                            <option
                                                                                value="Dhusarita">Dhusarita</option>
                                                                            <option
                                                                                value="Durgandhita">Durgandhita</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Mutra
                                                                            Pravritti">14)
                                                                            Mutra
                                                                            Pravritti</label>
                                                                        <select
                                                                            name="mutra_pravritti"
                                                                            id="Mutra
                                                                            Pravritti"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Alpa">Alpa</option>
                                                                            <option
                                                                                value="Adhika">Adhika</option>
                                                                            <option
                                                                                value="Sankya">Sankya</option>
                                                                            <option
                                                                                value="Ushnata">Ushnata</option>
                                                                            <option
                                                                                value="Sheetala">Sheetala</option>
                                                                            <option
                                                                                value="Lalasrawi">Lalasrawi</option>
                                                                            <option
                                                                                value="Raktayukta">Raktayukta</option>
                                                                            <option
                                                                                value="Peeta">Peeta</option>
                                                                            <option
                                                                                value="Dhusarita">Dhusarita</option>
                                                                            <option
                                                                                value="Durgandhita">Durgandhita</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Vyavay
                                                                            Pravritti">15)
                                                                            Vyavay
                                                                            Pravritti</label>
                                                                        <select
                                                                            name="vyavay_pravritti"
                                                                            id="Vyavay
                                                                            Pravritti"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Saptaha">Saptaha</option>
                                                                            <option
                                                                                value="Pakshika">Pakshika</option>
                                                                            <option
                                                                                value="Masika">Masika</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Shukrakshanapravritti">Shukrakshana
                                                                            pravritti</label>
                                                                        <select
                                                                            name="shukrakshana_pravritti"
                                                                            id="Shukrakshanapravritti"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Alpa">Alpa</option>
                                                                            <option
                                                                                value="Adhika">Adhika</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Gandha">Gandha</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Aartava
                                                                            Pravritti
                                                                            Kala">16)
                                                                            Aartava
                                                                            Pravritti
                                                                            Kala</label>
                                                                        <select
                                                                            name="aartava_pravratti_kala"
                                                                            id="Aartava
                                                                            Pravritti
                                                                            Kala"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Purva">Purva</option>
                                                                            <option
                                                                                value="Pashchat">Pashchat</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Dehoshma">17)
                                                                            Dehoshma</label>
                                                                        <select
                                                                            name="dehoshma"
                                                                            id="Dehoshma"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Tapaman">Tapaman</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Bhara">18)
                                                                            Bhara</label>
                                                                        <input
                                                                            type="text"
                                                                            name="bhara"
                                                                            id="Bhara"
                                                                            class="form-control"
                                                                            placeholder="Bhara"
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Raktachapa">19)
                                                                            Raktachapa</label>
                                                                        <select
                                                                            name="raktachapa"
                                                                            id="Raktachapa"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Uchchatama">Uchchatama</option>
                                                                            <option
                                                                                value="Nyuntama">Nyuntama</option>
                                                                            <option
                                                                                value="Madhyantara">Madhyantara</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Hrid
                                                                            gati">20)
                                                                            Hrid
                                                                            gati</label>
                                                                        <select
                                                                            name="hrid_gati"
                                                                            id="Hrid
                                                                            gati"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Ati">Ati</option>
                                                                            <option
                                                                                value="Manda">Manda</option>
                                                                            <option
                                                                                value="Asthir">Asthir</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                            <option
                                                                                value="Aakar">Aakar</option>
                                                                            <option
                                                                                value="Anya">Anya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="Shvasagati">21)
                                                                            Shvasagati</label>
                                                                        <select
                                                                            name="shvasagati"
                                                                            id="shvasagati"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Manda">Manda</option>
                                                                            <option
                                                                                value="Ati">Ati</option>
                                                                            <option
                                                                                value="Vishama">Vishama</option>
                                                                            <option
                                                                                value="Samanya">Samanya</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-3">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="parkriti_parikshana">22)
                                                                            Parkriti
                                                                            Parikshana</label>
                                                                        <select
                                                                            name="parkriti_parikshana"
                                                                            id="parkriti_parikshana"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Janmajata
                                                                                prakriti">Janmajata
                                                                                prakriti</option>
                                                                            <option
                                                                                value="Roga
                                                                                prakriti">Roga
                                                                                prakriti</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">6.
                                                                            Examination
                                                                            by
                                                                            Physician</label>
                                                                        <select
                                                                            name="skin"
                                                                            id="Skin"
                                                                            class="form-control">
                                                                            <option
                                                                                value="">Please
                                                                                select</option>
                                                                            <option
                                                                                value="Chikitsaka
                                                                                Dwara
                                                                                Parikshana">(Chikitsaka
                                                                                Dwara
                                                                                Parikshana)</option>
                                                                            <option
                                                                                value="Prabhavita
                                                                                Sansthana">Prabhavita
                                                                                Sansthana</option>
                                                                            <option
                                                                                value="Vata
                                                                                Pitta
                                                                                Kapha">Vata
                                                                                Pitta
                                                                                Kapha</option>
                                                                            <option
                                                                                value="Roga
                                                                                Nama">Roga
                                                                                Nama
                                                                                (Purva
                                                                                Prarambhika
                                                                                Nidana)</option>
                                                                            <option
                                                                                value="Tatkalika
                                                                                Nidana">Tatkalika
                                                                                Nidana</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">7.
                                                                            Prayogashaliya
                                                                            Parikshana</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="prayogashaliya_parikshana"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="prayogashaliya_parikshana"
                                                                            placeholder="PrayogashaliyaParikshana"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">8.
                                                                            Samprapti
                                                                            Vivarana</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="samprapti_vivarana"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="samprapti_vivarana"
                                                                            placeholder="Samprapti Vivarana"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">9.
                                                                            Vibhedaka
                                                                            Pariksha</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="vibhedaka_pariksha"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="vibhedaka_pariksha"
                                                                            placeholder="Vibhedaka Pariksha"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">10.
                                                                            Roga
                                                                            Vinishchaya-
                                                                            Pramukh
                                                                            Nidana</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="roga_vinishchaya"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="roga_vinishchaya"
                                                                            placeholder="Roga Vinishchaya- Nidana"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-4">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">11.
                                                                            Chikitsa
                                                                            Kalpana
                                                                            Anupana
                                                                            Sahita</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="chikitsa_kalpana_anupana_sahita"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="chikitsa_kalpana_anupana_sahita
                                                                            "
                                                                            placeholder="Chikitsa Kalpana Anupana Sahita"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-4">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="samshodhana_kriyas"
                                                                            class="form-control-label">Samshodhana
                                                                            Kriyas</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="samshodhana_kriyas"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="samshodhana_kriyas
                                                                            "
                                                                            placeholder="Samshodhana Kriyas"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-4">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="samshamana_kriyas"
                                                                            class="form-control-label">Samshamana
                                                                            Kriyas</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="samshamana_kriyas"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="samshamana_kriyas
                                                                            "
                                                                            placeholder="Samshamana Kriyas"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">12.
                                                                            Pathya-Apathya
                                                                            (<span
                                                                                class="fs-12
                                                                                text-info">Annexure-1</span>)</label>
                                                                        <textarea
                                                                            cols="45"
                                                                            rows="2"
                                                                            name="pathya_apathya"
                                                                            class="form-control"
                                                                            value=""
                                                                            aria-label="pathya_apathya
                                                                            "
                                                                            placeholder=" Pathya-Apathya"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Shishya's E-sign's</label>
                                                                        <input
                                                                            type="file"
                                                                            name="student_e_sign"
                                                                            class="form-control"
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Guru's
                                                                            E-Sign</label>
                                                                        <input
                                                                            type="file"
                                                                            name="guru_e_sign"
                                                                            class="form-control"
                                                                            onfocus="focused(this)"
                                                                            onfocusout="defocused(this)">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                           

                                                        </div></form>
                                                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-4">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 4</h3>
                  <div>
                  <div class="card">
                                            <div class="card-body">
        
                                                  <form action="" class="form2 " style=" padding:25px ; padding-bottom: 50px; font-size: 17px;">
                                                    <h4 style="padding-bottom: 50px;">Proforma of Progressive (quaterly follow-up) Report: </h4>
                                                    <div>
                                                        <label for="Date">Date</label>
                                                        <input type="Date" id="Registration No.">
                                                         </div>
                                                    <div>
                                                    <label for="daily_progress">Daily Progress</label>
                                                    <input type="text" id="daily_progress">
                                                    </div>
                                                   
                                                    <label for="treatment_therapies">Treatment Therapies</label>
                                                    <input type="text" id="treatment_therapies">
                                                <div>
                                                    <label for="weekly_progress">Weekly Progress</label>
                                                    <input type="text" id="weekly_progress">
                                                </div>

                                                
                                                <div>
                                                    <label for="monthly_progress">Monthly Progress</label>
                                                    <input type="text" id="monthly_progress">
                                                </div>
                                                <div class="col-12 flex-row-reverse">
                                                <button type="submit" class="btn-primary" style="padding: 5px 20px; border-radius: 5px; float: right;">Add </button>
        
                                            </div>
                                                  </form>
                                                      
                                                        <table class="table ">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Date</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Daily Progress
                                                                        No.</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Treatment/Theerapies</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Weekly Progress</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Montyly Progress</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">1</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">2</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">3</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div></section>
</div>
                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
              </div>
            </div>
            <div class="row setup-content" id="step-5">
              <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                  <h3> Step 5</h3>
                  <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
                </div>
              </div>
            </div>
    </form>
    
  </div>
             

  <style>

body {
    font-family: "Open Sans", sans-serif;
    font-size: 14px;
    color: #373a3c;
    font-weight: 400;
    background: #00bcd4;
    position: relative;
}

</style>
@endsection