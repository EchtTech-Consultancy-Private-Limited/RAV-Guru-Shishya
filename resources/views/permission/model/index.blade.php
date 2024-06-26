@extends('layouts.app-file')
@section('content')


<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                     <p>{{ $message }}</p>
                    </div>
  
               @endif
                  
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h4 class="page-title">Add Module</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                 
                  <li class="breadcrumb-item active">Add Module</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="header">
                  <h2>
                     <strong>Add</strong> Module
                  </h2>
               </div>
               <form action="{{ url('add-new-model') }}" method="post">
               @csrf
                  <div class="body">
                     <div class="row clearfix">
                        <div class="col-sm-3">
                           <div class="form-group">
                               <label class="form-label">Select Module/Action<span
                                 class="text-danger">*</span></label>
                                <select class="form-control select2" name="module_action">
                                    <option value="">Select Module/Action</option>
                                    <option value="0">Module</option>
                                    <option value="1">Action</option>
                                </select>
                                 @if ($errors->has('module_action'))
                                    <span class="help-block">
                                       <strong style="color:red;">{{ $errors->first('module_action') }}</strong>
                                    </span>
                                 @endif
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div>
                              <div class="form-line">
                                 <label>Module/Action Name<span
                                    class="text-danger">*</span></label>
                                 <input type="text" class="form-control" name="name" placeholder="Module Name">
                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                       <strong style="color:red;">{{ $errors->first('name') }}</strong>
                                    </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div>
                              <div class="form-line">
                                 <label >Route<span
                                    class="text-danger">*</span></label>
                                 <input type="text" class="form-control" name="route" placeholder="Route">
                                 @if ($errors->has('route'))
                                    <span class="help-block">
                                       <strong style="color:red;">{{ $errors->first('route') }}</strong>
                                    </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                               <label class="form-label">Select Parent</label>
                                <select class="form-control select2" name="parent_id">
                                    <option value>Select Parent Menu...</option>
                                    @foreach($modellist as $modellists)
                                         <option value="{{ $modellists->id}}">{{ $modellists->name}}</option>
                                    @endforeach
                                </select>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                               <label class="form-label">Select User Type<span
                                 class="text-danger">*</span></label>
                                <select class="form-control select2" name="user_type">
                                    <option value>Select User Type...</option>
                                    @foreach(__('phr.user_type_model') as $key=>$value)
                                       <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('user_type'))
                                    <span class="help-block">
                                       <strong style="color:red;">{{ $errors->first('user_type') }}</strong>
                                    </span>
                                 @endif
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Shorting</label>
                                 <input type="number" class="form-control" name="shorting" placeholder="shorting">
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-3">
                           <div class="form-group">
                              <button type="submit" style="float:right;" class="btn btn-primary waves-effect m-r-15">Add Module </button>
                           </div>
                        </div>
                     </div>
                     
                    
                     
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>



<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">

               <div class="body">
                  <div class="table-responsive">
                     <table class="table table-hover js-basic-example contact_list">
                        <thead>
                           <tr>

                              <th class="center"> No </th>
                              <th class="center"> Module Name </th>
                              <th class="center"> Module/Action </th>
                              <th class="center"> User Type </th>
                              <th class="center"> Route Name </th>                            
                              <th class="center"> Action </th>
                           </tr>
                        </thead>
                        <tbody>
                        @php $k=0; @endphp
                        @foreach($model as  $key=>$models)
                           <tr class="odd gradeX">
                              <td class="center">{{ $loop->iteration }}</td>
                              <td class="center">{{ $models->name }}</td>
                              <td class="center">
                                 {{ ($models->module_action == '0') ? 'Module' : 'Action' }}
                              </td>
                              <td class="center">
                                 {{ $models->user_type == 0 ? 'All User' : ($models->user_type == 1 ? 'Admin' : ($models->user_type == 2 ? 'Guru' : ($models->user_type == 3 ? 'Shishya' : ($models->user_type == 4 ? 'Super Admin' : '')))) }}
                             </td>
                              <td class="center">{{ $models->route ?? '' }}</td>
                               <td class="center">
                                    <a href="{{ url('edit-model/'.$models->id) }}" class="btn btn-tbl-edit">
                                       <i class="material-icons">edit</i>
                                    </a>
                                    <a  href="{{ url('model-dlt/'.$models->id) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                       <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                           </tr>
                              @if(count(main_child($models->id)) > 0 )
                                 @foreach(main_child($models->id) as  $key1=>$model)
                                 @php $k++; @endphp
                           <tr class="odd gradeX">
                              <td class="center">{{ $k }}</td>
                              <td class="center">{{ $model->name }}</td>
                              <td class="center">{{ ($models->module_action == '0') ? 'Module' : 'Action' }}</td>
                              <td class="center">
                                 {{ $models->user_type == 0 ? 'All User' : ($models->user_type == 1 ? 'Admin' : ($models->user_type == 2 ? 'Guru' : ($models->user_type == 3 ? 'Shishya' : ($models->user_type == 4 ? 'Super Admin' : '')))) }}
                             </td>
                              <td class="center">{{ $model->route }}</td>

                              
                               <td class="center">
                                   

                                    <a href="{{ url('edit-model/'.$model->id) }}" class="btn btn-tbl-edit">
                                       <i class="material-icons">edit</i>
                                    </a>

                                    <a  href="{{ url('model-dlt/'.$model->id) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                       <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>

                           </tr>
                              @endforeach
                              @endif
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="{{ asset('assets/js/custom/alert.js') }}"></script>
@endsection
