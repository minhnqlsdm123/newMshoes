@extends('BO._layouts.common')

@section('title','Mshoes')

@section('description','Mshoes')

@section('keywords','Mshoes')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('breadcrumb-brands')}}</li>
@endsection

@section('wrapper-content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" >
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
                    <h5 class="card-header-title">{{__('menu-brands-manage')}}</h5>
                    <div class="toolbar ml-auto">
                        <a href="{{asset(route('BrandAdd'))}}" class="btn btn-success active"><i class="fas fa-plus"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        @foreach($headers as $iHead)

                            @if($iHead != "deleted_at")
                                <th scope="col">{{ __('titleLabel.' . $iHead) }}</th>
                            @endif
                        @endforeach
                        </thead>
                        <tbody>
                        @foreach($listBrands as $brand)
                            <tr data-code="{{$brand->id_brand}}">
                                <td>{{$brand->id_brand}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->description}}</td>
                                <td>{{$brand->country}}</td>
                                <td>{{$brand->created_at}}</td>
                                <td>
                                    <div class="btn-group ml-auto">
                                        <a class="btn btn-sm btn-outline-light" data-content="{{ $brand->id_brand }}" href="{{route('updateBrand',['id_brand' => $brand['id_brand'] ])}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="bg-danger-light btn btn-sm btn-outline-light" data-content="en" data-toggle="modal" data-target="#confirmModal" onclick="focusData({{ $brand->id_brand }})">
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
@include('BO._components.modal.confirmDelete',
  [
      'title' => __('brand-modal-title'),
      'content' => __('brand-modal-content'),
      'urlDelete' => route('BrandDelete')
  ]
)
@section('endJs')

    <script type="text/javascript">
        function focusData(code){
            window.actionFocusData = code;
        }
        function resetFocusData(){

        }
        // $("document").ready(function(){
        //     setTimeout(()=>{
        //         $('.alert').hide('slow')
        //     },3000)
        // })
    </script>
@endsection

