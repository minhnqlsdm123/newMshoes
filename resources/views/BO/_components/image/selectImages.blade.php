<div class="card-body border-top" id="galleryImage">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="mb-0">Images</h4>
                <div class="toolbar ml-auto">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#galleryImageModal">Select image from galeries</a>
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                    data-target="#uploadImageModal" >Upload</a>
                </div>
            </div>
            <div class="card-body">
                {{-- @todo: change selectedImages when select from galery or upload new --}}
                <input type="hidden" name="selectedImages" value="{{ itemsArrayToString($arrImages) }}" />
                <div class="icon-list-demo row" id="selectedImages">
                    @if(!empty($arrImages))
                    @foreach($arrImages as $imgItem)
                    <div class="col-sm-6 col-md-4 col-lg-3 f-icon " id="selectedImagesItem_ID_{{ $imgItem['id'] }}">
                        <img src="{{ assetStorage($imgItem['url']) }}" alt="" width="120" height="80">
                        <i class="img-comp fas fa-times" onclick="deleteImgSelected('{{ $imgItem['id'] }}');"></i>
                    </div>
                    @endforeach
                    @endif
                </div>
                @if(isset($errors))
                    <div class="invalid-feedback" style="display:block">
                        {{ $errors->first('selectedImages') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="galleryImageModal" tabindex="-1" role="dialog" aria-labelledby="galleryImageModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryImageModalTitle">{{ __('titleLabel.gallery_product_images') }}</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <div id="galleryListImages">
                    @if(!empty($arrImages))
                    @foreach($arrImages as $imgItem)
                    <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" checked="" class="custom-control-input" name="gallerySelectImages"
                            id="gsi_{{ $imgItem['id'] }}" value="{{ $imgItem['id'] }}"
                            data-url="{{ assetStorage($imgItem['url']) }}">
                        <span class="custom-control-label">
                            <img src="{{ assetStorage($imgItem['url']) }}" alt="" width="120" height="80">
                        </span>
                    </label>
                    @endforeach
                    @endif
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-outline-light btn-xs" id="btnLoadMore"
                        onclick="loadMore()">{{ __('common.btn-load-more') }}</a>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">{{ __('common.btn-back') }}</a>
                <a href="#" onclick="confirmSelectedImage()" class="btn btn-primary">{{ __('common.btn-confirm') }}</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="uploadImageModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadImageModal">{{ __('titleLabel.upload_image') }}</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
               
                <input type="button" name="" id="btn-choosefile" class="btn btn-primary" style="margin-left: 16px" value="{{ __('common.btn-select') }}">
                <input type="button" name="" id="btn-submit" class="btn btn-primary" style="margin-left: 16px" value="{{ __('common.btn-sent-all') }}">
                <input type="button" name="" id="btn-delete-all" class="btn btn-primary" style="margin-left: 16px" value="{{ __('common.btn-delete') }}">
 
                <div class="table table-striped mt-15" class="files" id="previews" style="margin-top: 12px">

                    <div id="template" class="file-row" style="margin-top: 15px">
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <span class="preview"><img data-dz-thumbnail /></span>
                                </div>

                                <div class="col-5">
                                    <div>
                                        <p class="name" data-dz-name></p>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                    <div>
                                        <p class="size" data-dz-size></p>
                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="" style="padding-top:20px; padding-left:80px;">
                                        <input type="button" class="btn btn-primary start" value="{{ __('common.btn-sent') }}">
                                            <i class="glyphicon glyphicon-upload"></i>
                                        <input type="button" data-dz-remove class="btn btn-danger delete" value="{{ __('common.btn-delete') }}">
                                            <i class="glyphicon glyphicon-trash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@section('componentJS')
<input type="hidden" id="gimPage" name="gimPage" value="1" />
<input type="hidden" id="gimPageSize" name="gimPageSize" value="6" />
<input type="hidden" id="gimExceptImages" name="gimExceptImages" value="{{ itemsArrayToString($arrImages) }}" />
<input type="hidden" id="url_upload_file" name="url_upload" value="{{routerBo("addImage")}}" />
@include('bo._components.image.uploadImages')
<script type="text/javascript">
    $('#galleryImageModal').on('shown.bs.modal', function (e) {
        loadMore();
    });
    
    window.SimECBo.Gallery.initGalleryData({!!json_encode($arrImages) !!});

    function confirmSelectedImage() {
        window.SimECBo.Gallery.selectedImage();
    }

    function loadMore() {
        window.SimECBo.Gallery.loadMoreImage();
    }

    function deleteImgSelected(id) {
        window.SimECBo.Gallery.deleteSelectedImage(id);
    }

</script>

{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">

    function deleteImgAction(id) {
        console.log(id);
    }

    jQuery(document).ready(function () {
        let routePrefix = "/filemanager";
        $('#manage-galary-images').filemanager('image', {prefix: routePrefix});
    });

</script>
--}}
@endsection
