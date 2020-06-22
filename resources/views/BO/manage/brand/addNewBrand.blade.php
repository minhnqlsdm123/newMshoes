@extends('BO._layouts.common')

@section('title','Mshoes')

@section('description','Mshoes')

@section('keywords','Mshoes')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('breadcrumb-brands')}}</li>
@endsection

@section('wrapper-content')
    <div class="card">
        <h5 class="card-header">{{__('brand-add-new')}}</h5>
        <div class="card-body">
            <form method="POST" action="{{route('BrandAdd')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">{{__('titleLabel.name')}}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">{{__('titleLabel.description')}}</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                           value="{{ old('description') }}">
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="county">{{__('titleLabel.country')}}</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country"
                           value="{{ old('country') }}">
                    @error('country')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-success">{{ __('common.btn-add') }}</button>
                    <a href="{{ route('BrandManage') }}" class="btn btn-light">{{ __('common.btn-back') }}</a>
                </div>
            </form>
        </div>

@endsection