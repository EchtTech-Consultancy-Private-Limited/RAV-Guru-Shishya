@extends('layouts.app-file')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">How to Store Multiple Select Values in Database using Laravel? - ItSolutionStuff.com</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('postData') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea class="ckeditor form-control" name="description"></textarea>
                            </div>
                            <div class="">
                                <label><strong>Select Category :</strong></label><br/>
                                <!-- <select class="form-control select2 width" name="cat[]" multiple="" >
                  
                                  <option value="php">PHP</option>
                                  <option value="react">React</option>
                                  <option value="jquery">JQuery</option>
                                  <option value="javascript">Javascript</option>
                                  <option value="angular">Angular</option>
                                  <option value="vue">Vue</option>
                                 
                                </select> -->
                                   @php $check='0'; @endphp
                                    @foreach($data2 as $data2s)
                                        
                                         @if($data2s)
                                            @php $check=$data2s; @endphp;
                                          
                                          @endif
                                   
                                @endforeach

                                 <select class="form-control select2 width" name="cat[]" multiple="" >
                                 

                                    @foreach(__('phr.post_course') as $key=>$value)
                                         
                                         <option @if( $value== $check ) SELECTED @endif value="{{$key}}">{{$value}}</option>

                                   
                                     @endforeach


                                  
                                </select>
                            </div>

                             <!-- <div class="col-4">
                              <div class="form-group mt-1">
                                <label for="Registration_year">Morning Shifts Timings</label>
                                <div class="form-group default-select select2Style">
                                        <select class="form-control select2 width" multiple="" data-placeholder="Select">
                                            <option value="Monday">7am to 8am</option>
                                            <option value="Tuesday">8am to 9am</option>
                                            <option value="Monday">9am to 10am</option>
                                        </select>
                                    </div>
                              </div>
                            </div> -->

                              
                            <div class="text-center" style="margin-top: 10px;">
                                <button type="submit" class="btn save btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                    <th>Name</th>
                    <th>Category</th>
                    </tr>
                   
                   
                
                </table>
            </div>
            
        </div>
    </div>    
@endsection