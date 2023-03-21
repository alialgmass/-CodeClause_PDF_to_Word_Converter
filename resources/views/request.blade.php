@extends('layouts.app')
@section('section')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" >
                                    @csrf
                                   

                                   


                             
                                   
                                    <!--fourth card-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="center-text">upload pdf document</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row ">

                                                <div class="col-sm-12 ">
                                                    <h4 class="col-sm-12 col-form-label">upload pdf</h4>

                                                    <input required type="file" class="form-control" name="pdf">
                                                    @error('pdf')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                                

                                            </div>

                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
