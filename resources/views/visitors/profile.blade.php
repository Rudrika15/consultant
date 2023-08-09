@extends('layouts.visitorApp')
@section('content')
    <div class="main_page">
        <div class="container pt-5">
            <h2>Profile Settings</h2>
            <div class="row">
                <form action="{{route('profile.update')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$profile->id}}">

                    <div class="col-md-12">
                        <div class="card user-avatar mt-5">
                            <div class="card-body">
                                <div class="card-text cardtext p-3">
                                    <i class="fa fa-user profile-user"><span class="ms-3 fw-bold">User Avatar</span></i> 
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="image-border mt-4">
                                            <img src="{{asset('visitors/images/select_image.jpg')}}" alt="" width="100px" height="100px">
                                            <input type="button" class="btn select-image-button" value="Select Image">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mt-4">
                                            <h5>MAX UPLOAD SIZE:</h5><span class="updatetext">1MB</span>
                                            <h5>DIMENSIONS:</h5><span>150X150</span>
                                            <h5>EXTENSIONS:</h5><span>JPEG,PNG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <div class="card user-avatar mt-md-5">
                            <div class="card-body">
                                <div class="card-text cardtext p-3">
                                    <i class="fa fa-user profile-user"><span class="ms-3 fw-bold">About Me</span></i> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3 " for="firstname" style="color:gray;">First Name</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-user icon text-center"></i>
                                                        <input type="text" name="name" class="form-control input-field" value="{{Auth::user()->name}}">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3" for="firstname" style="color:gray;">Last Name</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-user icon text-center"></i>
                                                        <input type="text" name="lastname" value="{{Auth::user()->lastName}}" class="form-control input-field" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="fw-bold p-3" for="about" style="color:gray;">About</label>
                                                    <div class="abouttextarea">
                                                        {{-- <i class="fa fa-user icon text-center"></i> --}}
                                                        <textarea id="about" name="about" class="form-control " cols="20" rows="2">{{$profile->about}}</textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <div class="card user-avatar mt-md-5">
                            <div class="card-body">
                                <div class="card-text cardtext p-3">
                                    <i class="fa fa-envelope profile-user"><span class="ms-3 fw-bold">Contact Detail</span></i> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3" for="email" style="color:gray;">Email</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-envelope icon text-center"></i>
                                                        <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control input-field">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3" for="contactNo" style="color:gray;">Contact No</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-phone icon text-center"></i>
                                                        <input type="text" name="contactNo" value="{{Auth::user()->contactNo}}" class="form-control input-field">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <div class="card user-avatar mt-md-5">
                            <div class="card-body">
                                <div class="card-text cardtext p-3">
                                    <i class="fa fa-address-card-o profile-user"><span class="ms-3 fw-bold">Address</span></i> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="fw-bold p-3" for="email" style="color:gray;">Address</label>
                                                    <div class="address_textarea">
                                                        <textarea name="address" id="address" class="form-control" cols="20" rows="2">{{$profile->address}}</textarea>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3" for="stateId" style="color:gray;">State</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-map-marker icon text-center"></i>
                                                        <select class="form-select input-field" name="stateId" id="stateId">
                                                            <option>Select State</option>
                                                            @foreach ($states as $data)
                                                                <option value="{{$data->id}}">{{$data->stateName}}</option>   
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3" for="email" style="color:gray;">City</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-map-marker icon text-center"></i>
                                                        <select class="form-select input-field" name="cityId" id="cityId">
                                                            <option value="">Select City</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="fw-bold p-3" for="pincode" style="color:gray;">Pincode</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-map-marker icon text-center"></i>
                                                        <input type="text" name="pincode" id="pincode" class="form-control input-field" placeholder="{{_('pincode')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="fw-bold p-3" for="email" style="color:gray;">Website</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-map-marker icon text-center"></i>
                                                        <input type="text" name="website" id="website" value="{{$profile->webSite}}" class="form-control input-field">
                                                    </div>
                                                </div><div class="col-md-4">
                                                    <label class="fw-bold p-3" for="email" style="color:gray;">Map</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-map-marker icon text-center"></i>
                                                        <input type="text" name="map" id="map" value="{{$profile->map}}" class="form-control input-field">
                                                    </div>
                                                </div>
                                                
                                                {{-- <div class="col-2 pt-3">
                                                    <button type="submit" class="btn btn-submit fw-bold">Submit</button>
                                                </div>
                                                <div class="col-2 pt-3">
                                                    <button type="submit" class="btn btn-reset fw-bold">Reset</button>
                                                </div> --}}
                                                
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <div class="card user-avatar mt-md-5">
                            <div class="card-body">
                                <div class="card-text cardtext p-3">
                                    <i class="fa fa-lock profile-user"><span class="ms-3 fw-bold">Password</span></i> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3" for="email" style="color:gray;">Password</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-map-marker icon text-center"></i>
                                                        <input type="password" name="password" id="password" class="form-control input-field" placeholder="{{_('Password')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="fw-bold p-3" for="pincode" style="color:gray;">Confirm Password</label>
                                                    <div class="input-container">
                                                        <i class="fa fa-map-marker icon text-center"></i>
                                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control input-field" placeholder="{{_('Confime Password')}}">
                                                    </div>
                                                </div>

                                                {{-- <div class="col-2 pt-3">
                                                    <button type="submit" class="btn btn-submit fw-bold">Submit</button>
                                                </div>
                                                <div class="col-2 pt-3">
                                                    <button type="submit" class="btn btn-reset fw-bold">Reset</button>
                                                </div> --}}
                                                
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-12 pt-5 text-center">
                        <button type="submit" class="btn btn-submit fw-bold">Submit</button>
                        <a href="{{route('visitor.profile')}}" class="btn btn-reset fw-bold">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
    
            $('#stateId').on('change', function() {
                var idState = this.value;
                $("#cityId").html('');
                $.ajax({
                    url: "{{url('city')}}",
                    type: "POST",
                    data: {
                        stateId: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#cityId').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function(key, value) {
                            $("#cityId").append('<option value="' + value
                                .id + '">' + value.cityName + '</option>');
                        });
                    }
                });
    
            });
        });
    </script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#about'))
        .then(editor => {
            console.log(about);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#address'))
        .then(editor => {
            console.log(about);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection