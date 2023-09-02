<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-4">
            <a href="{{ route('consultant.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Consultant</h5>
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$consultantcount}}</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('state.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">State</h5>
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$statecount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('city.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">City</h5>                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$citycount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('category.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Category</h5>                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$categorycount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('languageMaster.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Language Master</h5>                        </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$languagecount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('socialMaster.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5 id="admin-card-heading" class="fw-bold">Social Media Master</h5>                        </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$socialmastercount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('adminpackage.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Admin Package</h5>                            
                                
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$adminpackagecount}} </h1>
                            </div> 
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('corparateInquiry.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Inquiry</h5>                               
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$inquirycount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('adminworkshop.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Workshop</h5>                             
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$workshopcount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('slider.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Slider</h5>                            
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$slidercount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('admin.lead.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Leads</h5>                          
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$leadscount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
       
    <div class="col-4">
        <a href="{{ route('users.index') }}" id="admin-dashborad-card-link">
            <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h5 id="admin-card-heading" class="fw-bold">Users</h5>                         
                        </div>
                        <div class="col-4">
                            <h1 class="fw-bold">{{$userscount}} </h1>
                        </div>
                    </div>
                
                </div>
            </div>
        </a>
    </div>
    </div>
</div>
