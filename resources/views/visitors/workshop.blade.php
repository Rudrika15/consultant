@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <style>
        body {
            background-color: #f5f7fa;
        }

        .fas.fa-heart:hover {
            color: #f5f7fa !important;
        }

        .fas.fa-share-alt:hover {
            color: #0d47a1 !important;
        }

        .custom-read-more {
            color: white !important;
            text-decoration: none !important;
        }
    </style>

    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}" class="home_link">HOME</a>
            <span class="span_arrow">/</span>
            <a href="{{ route('visitor.workshop') }}" class="work_shop_link">WORKSHOP</a>
        </div>
    </div>

    <div class="card text-center"
        style="background-color: #333692; border-radius: 10px; border: 0px solid #2980b9; width: auto;">
        <div class="card-body text-white">Our Workshops</div>
    </div>
    <div class="container">
        <section class="mx-auto my-5" style="max-width: 100%">

            @foreach ($workshop as $workshopData)
            <div class="card">
                <div class="card-body d-flex flex-row">
                    <img src="{{ asset('asset/images/workshopicon.png') }}" class="img-fluid" alt="..." height="60px"
                        width="60px" alt="avatar" />
                    <div>
                        <h5 class="card-title font-weight-bold mb-2">{{$workshopData->title}}</h5>
                        <p class="card-text"><i class="far fa-clock pe-2"></i>Date: {{$workshopData->workshopDate}}</p>
                    </div>
                </div>
                <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                    <img src="{{ url('workshop') }}/{{ $workshopData->photo }}" class="img-fluid" alt="..."
                        height="100%" width="100%" alt="avatar" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-link custom-read-more p-md-1 my-1" data-toggle="collapse"
                            href="#collapseContent{{$loop->index}}" role="button" aria-expanded="false"
                            aria-controls="collapseContent{{$loop->index}}">Read more</a>
                    </div>
                    <div class="collapse" id="collapseContent{{$loop->index}}">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" class="font-weight-bold">Details:</th>
                                    <td>{!! $workshopData->detail !!}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-bold">Workshop:</th>
                                    <td>{{$workshopData->workshopType}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-bold">Price:</th>
                                    <td>{{$workshopData->price}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-bold">Link:</th>
                                    <td>{{$workshopData->link}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="font-weight-bold">Address:</th>
                                    <td>{{$workshopData->address ?? 'Workshop is Online'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@endforeach

</section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script>
    $(document).ready(function () {
        // Toggle visibility of all workshop data when clicking "Read more"
        $('.btn-link').click(function () {
            var targetId = $(this).attr('href');
            $(targetId).toggle();
        });
    });
</script>

@endsection