@extends('BO._layouts.common')

@section('title','Mshoes')

@section('description','Mshoes')

@section('keyword','Mshoes')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('breadcrumb-language')}}</li>
@endsection

@section('wrapper-content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if(session('status'))
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
            <div class="card">
                <div class="card-header d-flex">
                    <h5 class="card-header-title">{{__('table-language')}}</h5>
                    <div class="toolbar ml-auto">
                        <a href="" class="btn btn-success active"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            @foreach($headers as $iHead)

                                @if($iHead != "deleted_at")
                                    <th scope="col">{{ __('titleLabel.' . $iHead) }}</th>
                                @endif
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($listLanguage as $language)

                            <tr data-code="{{$language->code}}">
                                <th scope="row">{{$language->code}}</th>
                                <td>{{$language->name}}</td>
                                <td>{{statusToString($language->is_active) }}</td>
                                <td>
                                    <div class="btn-group ml-auto">
                                        <a class="btn btn-sm btn-outline-light" data-content="{{ $language->code }}" href="">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="bg-danger-light btn btn-sm btn-outline-light" data-content="en" data-toggle="modal" data-target="#confirmModal" onclick="focusData({{ $language->code  }})">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
