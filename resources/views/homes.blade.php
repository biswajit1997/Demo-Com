
@extends('layouts.app')

@section('content')

<style>
.row-line{
    display: inline-flex;
    align-items: center;
    width: 100%;

    .col-line{
        width: 50%;
    }
}
</style>
<div class="col-md-10 offset-1">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row"> 
            <div class="col-md-4">
            <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <lable>My Profile<lable>
                            </div>
                            <div>
                           <!-- Button trigger modal -->
                           <span>Welcome,</span>
                               <div>
                               {{auth()->user()->fname."     ".auth()->user()->lname}}
                                </div>
                            </div>
                       </div>
                      
                       
                      
                    </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <lable>My Profile<lable>
                            </div>
                            <div>
                           <!-- Button trigger modal -->
                           
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                               Edit Profile
                                </button>
                                <!-- <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$users->id}}"> Edit Profiles</a> -->
                             
                            </div>
                       </div>
                       <div class=" mt-4">

                        <!-- <div class="row-line" >
                            <p class="row-line col-line">First Name</p>
                            <p class="row-line col-line">First Name</p>
                        </div> -->
                            <div>
                                <lable>First Name<lable>
                            </div>
                            <div class="">
                                <span>{{auth()->user()->fname}}</span>
                            </div>
                            <div>
                                <lable>Last Name<lable>
                            </div>
                            <div class="">
                                <span>{{auth()->user()->lname}}</span>
                            </div>
                            
                       </div>
                       
                      
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <lable>Email<lable>
                            </div>
                            <div>
                           <!-- Button trigger modal -->
                           
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModals">
                               Edit Profile
                                </button>
                            </div>
                       </div>
                       <div class="d-flex justify-content-around mt-4">
                            <div>
                                <lable>{{auth()->user()->email}}<lable>
                            </div>
                            <div class="">
                                <span></span>
                            </div>
                       </div>
                       
                      
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">

            

<div class="card-body">
    <div class="d-flex justify-content-between">
        <div>
            <lable>Education<lable>
        </div>
        <div>
       <!-- Button trigger modal -->
       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal5" >
        Add More
        </button>
        </div>
   </div>
   <div class=" justify-content-around mt-4">
    @foreach($res as $edu)
   <div class="card">
        <div class="card-body d-flex justify-content-between">
           <div>
            <strong>{{$edu->clg_name}}</strong><br>
            <strong>{{$edu->course_name}}</strong><br>
            <strong>{{$edu->start_year}} - {{$edu->end_year}}</strong><br>
           </div>
           <div>
                <a href="{{url('/edit-edu/'.$edu->id)}}" function class="text-primary" data-bs-toggle="modal" data-bs-target="#edit{{$edu->id}}">edit</a>
                <a href="{{url('/delete-edu/'.$edu->id)}}" class="text-danger">delete</a>
           </div>
        </div>
    </div>
    @endforeach
   </div>
</div>
</div>
                </div>
            </div>

            </div>
        </div>
    </div>


  


<!-- Modal -->
@foreach($res as $edu)
<div class="modal fade" id="edit{{$edu->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Education</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- Modal otp -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Enter OTP</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('/otp')}}" method="post">
        @csrf
      <div class="modal-body">
      <div class=" mb-3">
               
            <div class=" mb-3">
                <label for="" class="col-form-label text-md-end">{{ __('OTP') }}</label>

                <div class="">
                    <input id="" type="number" class="form-control " name="otp" value="" required >

                </div>
            </div>
       </div>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="" value="Save changes" />
      </div>
    </form>
    </div>
  </div>
</div>




@endsection
