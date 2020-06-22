@extends('BO._layouts.common')

@section('title','Mshoes')

@section('description','Mshoes')

@section('keywords','Mshoes')

@section('wrapper-content') <div class="card">
    <h5 class="card-header">Edit Category</h5>
    <div class="card-body">
        {{$category[0]}}
        <form method="POST" action="{{routerBo('updateCategory',['id_cat' => $category->id_cat ])}}">
            {{ csrf_field() }}
            <label for="name">{{__("titleLabel.name")}}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                   value="{{ $category->name }}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <div>
                <button type="submit" class="btn btn-success">{{ __('common.btn-confirm') }}</button>
                <a href="{{ route('CategoryManage') }}" class="btn btn-light">{{ __('common.btn-back') }}</a>
            </div>
        </form>
    </div>

</div>

@endsection