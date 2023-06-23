@extends('layouts.guest')
@section('content')
    <x-section class="about">
        <div class="row gx-0">

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    {{$errors}}
                    <h3>Get started by creating your account</h3>
                    <form action="/register" method="post" class="px-3 py-1">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control pb-2" name="name">
                        </div>

                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control pb-2" name="email">
                        </div>

                        <div class="form-group mb-2">
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" class="form-control pb-2" name="phone">
                        </div>

                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input id="password" type="text" class="form-control pb-2" name="password">
                        </div>

                        <div class="form-group mb-2">
                            <label for="c_password">Confirm Password</label>
                            <input id="c_password" type="text" class="form-control pb-2" name="password_confirmation">
                        </div>

                        <button type="submit" class="btn mt-2 btn-read-more">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="/assets/img/about.jpg" class="img-fluid" alt="">
            </div>

        </div>
    </x-section>
@endsection
