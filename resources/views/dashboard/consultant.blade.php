<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-4">
            <a href="{{ route('time.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Time</h5>
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$timecount}}</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('language.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Language</h5>
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$languagecount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('gallery.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Gallery</h5>                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$gallerycount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('video.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Video</h5>                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$videocount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('attachment.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Attachment</h5>                        </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$attachmentcount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('socialLink.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5 id="admin-card-heading" class="fw-bold">Social Link</h5>                        </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$socialcount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('package.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Package</h5>                            
                                
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$packagecount}} </h1>
                            </div> 
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('certificate.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Certificate</h5>                               
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$certificatecount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('achievement.index') }}" id="admin-dashborad-card-link">
                <div class="card shadow p-3 mb-5 bg-white rounded" id="Admin-dashborad-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h5 id="admin-card-heading" class="fw-bold">Achivements</h5>                             
                            </div>
                            <div class="col-4">
                                <h1 class="fw-bold">{{$achievementcount}} </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('workshop.index') }}" id="admin-dashborad-card-link">
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
            <a href="{{ route('consultant.lead.index') }}" id="admin-dashborad-card-link">
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
       
    </div>
</div>
