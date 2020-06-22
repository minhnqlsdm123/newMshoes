@extends('BO._layouts.common')

@section('header','Mshoes')
@section('keywords','Mshoes')
@section('description','Mshoes')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('breadcrumb-categories')}}</li>
@endsection
@section('wrapper-content')
    <div class="card">
        <h5 class="card-header">{{__('titleLabel.name')}}</h5>
        <div class="card-body">
            <form method="POST" action="{{route('CategoryAdd')}}">
                {{ csrf_field() }}
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div>
                    <button type="submit" class="btn btn-success">{{ __('common.btn-add') }}</button>
                    <a href="{{ route('CategoryManage') }}" class="btn btn-light">{{ __('common.btn-back') }}</a>
                </div>
            </form>
        </div>

    </div>
@endsection
