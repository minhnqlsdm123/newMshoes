@extends('BO._layouts.common');

@section('title','Mshoes');

@section('description','Mshoes');

@section('keyword','Mshoes');

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('breadcrumb-language')}}</li>
@endsection

@section('wrapper-content')
    <div class="card">
        <h5 class="card-header">{{__('language-update')}}</h5>
        <div class="card-body">
            <form method="POST" action="{{route('LanguageUpdate',['code'=>$language->code])}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="code">{{__('titleLabel.code')}}</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
                           value="{{ $language->code }}">
                    @error('code')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">{{__('titleLabel.name')}}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ $language->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="isActive" @if($language->is_active==1) checked @endif class="custom-control-input" value="1"><span class="custom-control-label">{{__('titleLabel.active')}}</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="isActive" @if($language->is_active==0) checked @endif class="custom-control-input" value="0"><span class="custom-control-label"> {{__('titleLabel.disable')}}</span>
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">{{ __('common.btn-add') }}</button>
                    <a href="{{ route('LanguageManage') }}" class="btn btn-light">{{ __('common.btn-back') }}</a>
                </div>
            </form>
        </div>

    </div>
@endsection
