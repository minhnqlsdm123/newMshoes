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
                        <a href="{{route('LanguageAdd')}}" class="btn btn-success active"><i class="fas fa-plus"></i></a>
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
                                        <a class="btn btn-sm btn-outline-light" data-content="{{ $language->code }}" href="{{route('LanguageUpdate',['code'=>$language->code])}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($language->code != 'en')
                                            <a class="bg-danger-light btn btn-sm btn-outline-light" data-content="{{ $language->code }}" data-toggle="modal" data-target="#confirmModal" onclick="focusData(this)" >
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        @endif

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

@include('BO._components.modal.confirmDelete',[
     'title' => __('language-modal-title'),
      'content' => __('language-modal-content'),
      'urlDelete' => route('LanguageDelete')
])
@section('endJs')

    <script type="text/javascript">
        function focusData(obj){
            window.actionFocusData = $(obj).attr('data-content');
        }
        function resetFocusData(){

        }


    </script>
@endsection
