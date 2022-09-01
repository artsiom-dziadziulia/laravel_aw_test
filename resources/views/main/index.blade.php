@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ticket Manager') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-info" role="alert">
                            {{__('Please fill out the form to create a ticket.')}}
                        </div>
                        <form action="{{route('ticket.create')}}" class="container" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg" name="subject" id="floatingInput" type="text"
                                           placeholder="{{__('Subject')}}" aria-label=".form-control-lg example">
                                    <label for="floatingInput">{{__('Subject')}}</label>
                                    @error('subject')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="staticEmail" class="col-sm-6 col-form-label col-form-label-lg">Email</label>
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{auth()->user()->email}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="staticEmail" class="col-sm-6 col-form-label col-form-label-lg">User name</label>
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <select name="author" class="form-select" aria-label="{{__('Please select who are you')}}">
                                        <option value="manager">{{__('Manager')}}</option>
                                        <option selected value="client">{{__('Client')}}</option>
                                    </select>
                                    @error('author')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="content" placeholder="Leave a message here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Message</label>
                                        @error('content')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group dynamic-element" style="display:none">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <input placeholder="{{__('Ftp Login')}}" id="ftp_login" name="ftp_credentials[login][]" class="form-control"/>
                                        </div>
                                        <div class="col-md-3">
                                            <input placeholder="{{__('Ftp Password')}}" id="ftp_lpassword" name="ftp_credentials[password][]" class="form-control"/>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="delete btn btn-danger">x</button>
                                        </div>
                                    </div>
                                </div>

                                <fieldset>
                                    <legend class="title">{{__('FTP Credentials')}}</legend>

                                    <div class="dynamic-fields">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="add-one btn btn-link">{{__('+ Add Credential')}}</button>
                                            </div>
                                            <div class="col-md-5"></div>
                                        </div>
                                    </div>
                                </fieldset>

                                <button type="submit" class="mt-3 btn btn-primary">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script  type="text/javascript">
        $('.add-one').click(function(){
            $('.dynamic-element').first().clone().appendTo('.dynamic-fields').show();
            attach_delete();
        });


        //Attach functionality to delete buttons
        function attach_delete(){
            $('.delete').click(function(){
                console.log("click");
                $(this).closest('.form-group').remove();
            });
        }
    </script>
@endsection
