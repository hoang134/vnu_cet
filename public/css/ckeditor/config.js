/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 * Tích hợp và hướng dẫn bởi https://trungtrinh.com - Website chia sẻ bách khoa toàn thư */

CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = '/admin/ckfinder';
    config.filebrowserImageBrowseUrl = '/admin/ckfinder?type=Images';
    config.filebrowserFlashBrowseUrl = '/admin/ckfinder?type=Flash';
    config.filebrowserUploadUrl = '/admin/connector?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/admin/connector?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/admin/connector?command=QuickUpload&type=Flash';
};
