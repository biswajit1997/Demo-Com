@extends('layouts.main')

@section('content')
<div class="content-wrapper">
<!-- Content area -->
<div class="content">
    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-5">
            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">My Profile</h6>
                    <div class="heading-elements">
                        <div class="form-group">
                            <button type="button" class="btn btn-inverse" style="background-color:#ff6a2e;color:#fff;" data-toggle="modal" data-target="#exampleModal">
                               Edit Profile
                            </button>
                            
                        </div>
                      
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">  
                        <label for="">First Name ::</label>
                        <strong >{{auth()->user()->fname}}</strong>
                        </div>
                        <div class="col-md-12">  
                        <label for="">Last Name ::</label>
                        <strong >{{auth()->user()->lname}}</strong>
                        </div>
                        <div class="col-md-12">  
                        <label for="">User Name ::</label>
                        <strong >{{auth()->user()->uname}}</strong>
                        </div>
                        <div class="col-md-12">  
                        <label for="">Year of birth ::</label>
                        <strong >{{auth()->user()->year_of_birth}}</strong>
                        </div>
                        <div class="col-md-12">  
                        <label for="">Gender ::</label>
                        <strong >{{auth()->user()->gender}}</strong>
                        </div>
                        <div class="col-md-12">  
                        <label for="">Phone ::</label>
                        <strong >{{auth()->user()->phone}}</strong>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /traffic sources -->
        </div>
        <div class="col-lg-6">
            <!-- Sales stats -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Education</h6>
                    <div class="heading-elements">
                        <div class="form-group">
                            <button type="button" class="btn btn-inverse" style="background-color:#ff6a2e;color:#fff;" data-toggle="modal" data-target="#exampleModal5" >
                            Add More
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <tbody>
                            @foreach($res as $edu)
                            <tr>
                                <td>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="#" class="letter-icon-title">{{$edu->clg_name}}</</a>
                                        </div>

                                        <div class="text-muted text-size-small"> {{$edu->course_name}}</div>
                                        <div class="text-muted text-size-small"> {{$edu->start_year}} - {{$edu->end_year}}</div>
                                    
                                    </div>
                                </td>
                                <td>
                                <a href="#" function class="text-primary" data-toggle="modal" data-target="#edit{{$edu->id}}">edit</a>
                                </td>
                                <td>
                                <a href="{{url('/delete-edu/'.$edu->id)}}" class="text-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /sales stats -->
        </div>
        <div class="col-lg-12">

            <!-- Sales stats -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Email</h6>
                    <div class="heading-elements">
                        <div class="form-group">
                        <button type="button" class="btn btn-inverse" style="background-color:#ff6a2e;color:#fff;"  data-toggle="modal" data-target="#exampleModalLong">
                            Verify
                        </button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="text-muted text-size-small"> {{auth()->user()->email}}</div>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /sales stats -->
        </div>
    </div>
</div>
<!-- /content area -->
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter OTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
        <form action="{{url('/otp')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class=" mb-3">
                    <div class=" mb-3">
                        <label for="" class="col-form-label text-md-end">{{ __('Enter OTP') }}</label>
                        <div class="">
                            <input id="" type="text" class="form-control" value="" placeholder="Enter OTP" name="otp" value="" required >
                        </div>
                    </div>
                </div>
            </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-inverse " style="background-color:#ff6a2e;color:#fff;">Save changes</button>
      </div>
    </div>
  </div>
</div>

@foreach($res as $edu)
<div class="modal fade" id="edit{{$edu->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Education</h1>
      </div>
      <hr>
      <form action="{{url('/update-edu', $edu->id)}}" method="post">
        @csrf
      <div class="modal-body">
      <div class=" mb-3">
               
               <div class=" mb-3">
                   <label for="" class="col-form-label text-md-end">{{ __('COLLEGE NAME') }}</label>
   
                   <div class="">
                       <input id="" type="text" class="form-control " value="{{$edu->clg_name}}" placeholder="Enter College Name" name="clg_name" value="" required >
   
                   </div>
               </div>
          </div>
          <div class=" mb-3">
               
            <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('COURSE NAME') }}</label>

                <div class="">
                    <input id="" type="text" class="form-control " value="{{$edu->course_name}}" placeholder="Enter Course Name" name="course_name" value="" required >

                </div>
            </div>
       </div>
     <div class="d-flex justify-content-between"> 
         <div class=" mb-3">
               
               <div class=" mb-3">
                   <label for="" class="col-form-label text-md-end">{{ __('START YEAR') }}</label>
   
                   <div class="">
                       <input id="" type="number" class="form-control " value="{{$edu->start_year}}" name="start_year" value="" required >
   
                   </div>
               </div>
          </div>
          <div class=" mb-3">
                  
               <div class=" mb-3">
                   <label for="" class="col-form-label text-md-end">{{ __('END YEAR') }}</label>
   
                   <div class="">
                       <input id="" type="number" class="form-control " value="{{$edu->end_year}}" name="end_year" value="" required >
   
                   </div>
               </div>
          </div>
     </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-inverse" style="background-color:#ff6a2e;color:#fff;">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

<!-- education Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Education</h1>
        
      </div>
      <hr>
      <form action="{{url('/add_education')}}" method="post">
        @csrf
      <div class="modal-body">
      <div class=" mb-3">
               
               <div class=" mb-3">
                   <label for="" class="col-form-label text-md-end">{{ __('COLEGE NAME') }}</label>
   
                   <div class="">
                       <input id="" type="text" class="form-control "  placeholder="Enter College Name" name="clg_name" value="" required >
   
                   </div>
               </div>
          </div>
          <div class=" mb-3">
               
            <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('COURSE NAME') }}</label>

                <div class="">
                    <input id="" type="text" class="form-control " placeholder="Enter Course Name" name="course_name" value="" required >

                </div>
            </div>
       </div>
     <div class="d-flex justify-content-between"> 
         <div class=" mb-3">
               
               <div class=" mb-3">
                   <label for="" class="col-form-label text-md-end">{{ __('START YEAR') }}</label>
   
                   <div class="">
                       <input id="" type="number" class="form-control " name="start_year" value="" required >
   
                   </div>
               </div>
          </div>
          <div class=" mb-3">
                  
               <div class=" mb-3">
                   <label for="" class="col-form-label text-md-end">{{ __('END YEAR') }}</label>
   
                   <div class="">
                       <input id="" type="number" class="form-control " name="end_year" value="" required >
   
                   </div>
               </div>
          </div>

     </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-inverse " style="background-color:#ff6a2e;color:#fff;">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal edit user -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>   
      </div>
      <hr>
      <form action="{{url('/update')}}" method="post"> 
          @csrf 
      <div class="modal-body">
       <div class="d-flex justify-content-between">
        <div class=" mb-3">
                <label for="email" class="col-form-label text-md-end">{{ __('FIRST NAME') }}</label>

                <div class="">
                    <input type="text" class="form-control " name="fname" placeholder="Enter First Name" value="{{auth()->user()->fname}}" required >

                </div>
            </div>
            <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('GENDER') }}</label>

                <div class="">
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
            
                </div>
            </div>
       </div>
       <div class="d-flex justify-content-between">
        <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('LAST NAME') }}</label>

                <div class="">
                    <input id="" type="text" class="form-control" name="lname" value="{{auth()->user()->lname}}"  placeholder="Enter Last Name" required >

                </div>
            </div>
            <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('USERNAME') }}</label>

                <div class="">
                    <input id="" type="text" class="form-control " name="uname" value="{{auth()->user()->uname}}" required >

                </div>
            </div>
       </div>
       <div class="d-flex justify-content-between">
        <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('PHONE') }}</label>

                <div class="">
                    <input id="" type="tel" class="form-control " placeholder="10 digit phone number" name="phone" value="{{auth()->user()->phone}}" required >

                </div>
            </div>
            <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('YEAR OF BIRTH') }}</label>

                <div class="">
                    <input id="email" type="number" class="form-control " name="year_of_birth" value="{{auth()->user()->year_of_birth}}" required >

                </div>
            </div>
       </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-inverse"  style="background-color:#ff6a2e;color:#fff;" value="Save changes" />
      </div>
    </form>
    </div>
  </div>
</div>
@endsection