<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RASHTRIYA AYURVEDA VIDYAPEETH - GURU SHISHYA PARAMPARA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('assets-welcome/vendor/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{ asset('assets-welcome/css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-welcome/vendor/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <script src="{{ asset('assets-welcome/js/code.jquery.com_jquery-3.7.0.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('assets-welcome/css/style.css')}}">

</head>
<body onload="curtain()">
    <div class="curtain">
        <!-- The container that wraps the curtain -->
        <div class="curtain__wrapper">
            <!-- The left curtain panel -->
            <div class="curtain__panel curtain__panel--left">
            </div> <!-- curtain__panel -->
            <div class="container-fluid px-0">
                <div class="backgorund-img1"></div>
                <div class="backgorund-img2"></div>
                <div class="backgorund-img3"></div>
            </div>
            <div class="curtain__prize">
                <div class="main-container">
                    <div class="container">
                        <div class="launching-page">
            
                            <div class="header">
                                <div class="row align-items-center">
            
                                    <div class="col-md-2 width-15">
                                        <div class="logo">
                                            <a href="#">
                                                <img src="{{ asset('assets-welcome/img/government-of-india.jpg')}}" alt="" title=""/>
                                            </a>
                                        </div>
            
                                    </div>
                                    <div class="col-md-8 d-flex align-items-center justify-content-center width-70">
                                      <div class="header_content">
                                          <div class="logo logo-a">
                                           <img src="{{ asset('assets-welcome/img/guru-shishya-parampara-logo.png')}}" alt="gsp" title="gsp">   
                                          </div> 
                                          
                                        <h3>RASHTRIYA AYURVEDA VIDYAPEETH</h3>
                                        <!-- <h5> National Center for Disease Control</h5>-->
                                        <h5> GURU SHISHYA PARAMPARA</h5>
                                      </div>
                                    </div>
                                    <div class="col-md-2 justify-content-end d-flex width-15">
                                        <div class="logo">
                                            <a href="#">
                                                <img src="{{ asset('assets-welcome/img/rav_logo.png')}}" alt="rav" title="rav">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="about-content">
                                            <h1 class="title"> About Guru Shishya Parampara</h1>
                                            <div class="about-item">
                                                <P>
                                                    Guru Shishya Parampara is the traditional residential method of education wherein the Shishya lives in the vicinity of his Guru and undertakes the studies in a one to one manner by accompanying the guru in his regular routine clinical work. This system vanished with the disappearance of Gurukula. RAV realized that in Ayurveda, this method of knowledge transfer had been very effective and hence the Vidyapeeth is making efforts to revive this system through its courses.
                                                </P>
                                                <p>
                                                    In institutional form of learning only relevant portions of the Samhitas (classical texts of Ayurveda) are being taught in the form of syllabus. On the contrary, the Guru Shishya Parampara programme of RAV provides the students to study whole text to get adequate knowledge of selected Samhita and its Teeka (commentary) and exposes them traditional skills of the Ayurvedic practices. The Shishyas get sufficient time for interaction with the guru and get a live demonstration upon the patients, herbs or formulations during the course of the study.
                                                </p>
                                            </div>
            
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="proceed">
                                            <!-- <div class="proceed-gif">
                                                <img src="./assets-welcome/img/giphy.webp" alt="dog" title="dog">
                                            </div> -->
                                            <div class="text-center">
                                                <a href="{{ route('newLogin') }}" class="pulse">Proceed Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- curtain__prize -->
            <!-- The right curtain panel -->
            <div class="curtain__panel curtain__panel--right">
            </div> <!-- curtain__panel -->
        </div> <!-- curtain__container -->
    </div>
    <script src="{{ asset('assets-welcome/js/main.js')}}"></script>
</body>
</html>