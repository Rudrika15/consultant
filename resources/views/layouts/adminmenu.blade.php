    <li class="nav-item active">
        <a class="nav-link" href="{{ route('consultant.index') }}">
            <i class="bi bi-device-ssd-fill"></i>
            <span>Consultant</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.lead.index')}}">
            <i class="fas fa-archive"></i>
            <span>Leads</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('contactus.index')}}">
            <i class="fas fa-phone-alt"></i>
            <span>Contact us</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('about.index')}}">
            <i class="fas fa-phone-alt"></i>
            <span>About us</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('corparateInquiry.index')}}">
            <i class="bi bi-gear-fill"></i>
            <span>Inquiry</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('adminworkshop.index')}}">
            <i class="fas fa-laptop-house"></i>
            <span>Workshop</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('state.index') }}">
            <i class="bi bi-device-ssd-fill"></i>
            <span>State</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('city.index') }}">
            <i class="bi bi-patch-exclamation-fill"></i>
            <span>City</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="bi bi-bookmark-star-fill"></i>
            <span>Category</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('languageMaster.index') }}">
            <i class="bi bi-translate"></i>
            <span>Language Master</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('socialMaster.index') }}">
            <i class="bi bi-dribbble"></i>
            <span>Social Media Master</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('adminpackage.index')}}">
            <i class="bi bi-bookmark-star-fill"></i>
            <span>Admin Package</span></a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{route('slider.index')}}">
            <i class="fas fa-sliders-h"></i>
            <span>Slider</span></a>
    </li>
    
    
    <li class="nav-item">
        <a class="nav-link colla
        psed" style="color: #014272; font-weight: 700;" href="#"
            data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="bi bi-gear-fill" style="color: #fff;"></i>
            <span style="color: #fff;">Settings</span>
        </a>
        <div id="collapseSetting" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ route('roles.index') }}"> Role Managment</a>
                <a class="collapse-item" href="{{ route('users.index') }}"> Users Managment</a>

            </div>
        </div>
    </li>