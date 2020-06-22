@extends('BO._layouts.common')

@section('title','Mshoes')

@section('description','Mshoes')

@section('keyword','Mshoes')

@section('breadcrumb')

@endsection

@section('wrapper-content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
            @endif
            <div class="show-messages">

            </div>
            <div id="deletedAlert" class="alert alert-danger alert-dismissible fade" role="alert">
                <span id="deletedMss"></span>
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
         </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        </div>
    </div>


@endsection
