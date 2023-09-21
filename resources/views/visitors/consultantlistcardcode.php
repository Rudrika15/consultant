<div class="card consultant-list-card text-center" id="consultant_list_card">
        <div class="p-0 m-0" id="card_macthed_grid">
            <div class="d-flex jistify-content-center">
                <div class="">
                    <p class="" id="matches_found">Matches Found</p>
                    {{-- <h1>{{$countconsultant->id}}</h1> --}}
                </div>
                @foreach ($consultant as $consultantData)
                    <div class="image-for-consul-list">
                        {{-- /admin_img/{{$gallerys->photo}} --}}
                        <img src="/profile/{{$consultantData->photo}}" id="card_matches_img" class="" alt="" widht="40px" height="40px">
                        
                    </div>
                @endforeach
                <div class="fw-bold d-flex justify-content-end">
                    <div id="countconsultant">
                        <p class="fa fa-arrow-left">&nbsp;<span style="font-size: 20px;">{{$countconsultant}}</span></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <h3 class="text-center"><u>{{$categoryphoto->catName}}</u></h3>
            <form class="">
                @csrf
                <div class="">
                    <input type="hidden" value="{{$categoryphoto->id}}" name="categoryId">
                    <input type="text" id="searchInputCity" name="pincodeId"  class="form-control mt-5" placeholder="Enter Your Location Or Pincode" autocomplete="off">
                    
                    <div id="citySuggestions" class="citySuggestions" style="display:none;">
                    
                    </div>
                    
                    <input type="hidden" id="selectedCityId" name="cityId">
                </div>
                <div class="mt-2">
                    <a href="" class="card-link" style="text-decoration: none;">Are You Inside India ?</a>
                </div>
                <div class="mt-5">
                   
                        <button type="submit" class="btn next" id="btn_card_next">Submit</button>
                   
                    
                </div>
            </form>            
            <div class="mt-5 mb-0">
                <p>Are you a Tutor?</p>
                <a href="" style="text-decoration: none;">Create Free Profile</a>
            </div>
            
            {{-- <a class="text-end">End aligned text on all viewport sizes.</a> --}}
        </div>
    </div>