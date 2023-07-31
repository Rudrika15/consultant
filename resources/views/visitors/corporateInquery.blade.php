@extends('layouts.visitorApp')
@section('content')
    <div class="corporate mt-5">
        <div class="container">
            <h3 class="us">Corporate Inquery</h3>
        </div>
    </div>
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}">HOME</a>
            <span style="color:#005555">/</span>
            <a href="{{ route('visitors.corporateInquery') }}" style="color:gray">CORPORATE INQUERY</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5 mb-5">
                <p class="pcolor">Your set of employees are not just an asset to your company. They are the next-line
                    leaders of your
                    organization.
                </p>
                <p class="pcolor">
                    They deserve specialized coaching and mentoring to guide them through the journey of brainstorming,
                    innovation, and implementation of their ideas.
                </p>
                <p class="pcolor">
                    As an aspiring corporate, invest wisely in your set of employees and get them a guide that can turn them
                    into leading solution providers of the next level. This will eventually result in the growth and
                    development of the organization.
                </p>
                <p class="pcolor">
                    Here’s where ConsultantCube.com comes to your rescue. We are a unique platform hosting coaches, mentors,
                    and guides from all arenas, having years of experience. We will help you deliver the best level of
                    coaching for your aspiring employees. From the process of selecting the best program that fulfills the
                    goal to assigning an appropriate mentor that will help you sail the program with a 100% success ratio.
                    ConsultantCube.com is definitely the one-stop solution for your large MNC or MSME to meet your
                    objectives. Save your money, time, and efforts with us and get the best that your company deserves.
                </p>
                <p class="pcolor">
                    Drop us a “Hi” with your requirement and we are determined to NOT disappoint you.

                </p>
            </div>
            <div class="col-lg-6 mt-5 mb-5">
                <img src="{{ asset('visitors/images/goals.jpg') }}" alt="">
            </div>
        </div>

        <div class="getintouch mt-5 mb-5">
            <h1 class="text-center text-white pt-5">Get In Touch</h1>
            <p class="text-center text-white">Send us your inquiry we will respond earliest</p>
            <form action="" class="mb-5">
                <div class="row">
                    <div class="col-lg-11 ms-5 mt-3">
                        <label for="name" class="formlabel text-white">{{ _('Name') }}<span
                                style="color: red">{{ _('*') }}</span></label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="col-lg-11 ms-5 mt-3">
                        <label for="email" class="formlabel text-white">{{ _('Email') }}<span
                                style="color: red">{{ _('*') }}</span></label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="col-lg-11 ms-5 mt-3">
                        <label for="inquery" class="formlabel text-white">{{ _('Inquery') }}<span
                                style="color: red">{{ _('*') }}</span></label>
                        <textarea id="inquiry" rows="10" name="inquiry" class="form-control"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 mb-5">
                    <button class="btn bg-white  text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#inquiry'))
            .then(editor => {
                console.log(about);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
