<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>

<script>
    $(document).ready(function () {
        dropZone()
    });

    function dropZone(){
        let previewNode = document.querySelector("#template");
        previewNode.id = ""
        let previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);
        let dropZone = new Dropzone("#btn-choosefile", {
            url: $("input#url_upload_file").val(),
            thumbnailWidth: 100,
            thumbnailHeight: 100,
            parallelUploads: 100,
            previewTemplate: previewTemplate,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoQueue: false,
            previewsContainer: "#previews",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
        });

        dropZone.on("addedfile", function (file) {
            file.previewElement.querySelector(".start").onclick = () => {
                dropZone.enqueueFile(file)
            };
        });

        dropZone.on("sending",function(file,xhr,formData){
            formData.append('folder', $('meta[name="image-folder"]').attr('content'))
        })

        // Update the total progress bar
        dropZone.on("totaluploadprogress", function (progress) {
            $("#total-progress .progress-bar").css('width', progress + "%")
        });

        $("#btn-delete-all").on("click", function () {
            dropZone.removeAllFiles(true);
        })

        $("#btn-submit").on("click", function () {
            dropZone.enqueueFiles(dropZone.getFilesWithStatus(Dropzone.ADDED))
        })
    }

</script>
