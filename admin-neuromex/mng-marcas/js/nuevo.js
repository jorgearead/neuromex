$("input[type='file']").fileinput({
    language: 'es',
    maxFileCount: 20,
    showUpload: false,
    showRemove: false,
    showCaption: false,
    browseClass: "btn btn-primary btn-block",
    allowedFileExtensions: ['jpg', 'png', 'gif']
});