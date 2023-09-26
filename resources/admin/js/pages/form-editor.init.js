/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Form editor Js File
*/

// ckeditor

ClassicEditor
.create( document.querySelector( '#ckeditor-classic' ) )
.then( function(editor) {
    editor.ui.view.editable.element.style.height = '200px';
} )
.catch( function(error) {
    console.error( error );
} );


// Quilljs

// Snow theme
var quill = new Quill('#snow-editor', {
    theme: 'snow',
    modules: {
        'toolbar': [[{ 'font': [] }, { 'size': [] }], ['bold', 'italic', 'underline', 'strike'], [{ 'color': [] }, { 'background': [] }], [{ 'script': 'super' }, { 'script': 'sub' }], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['link', 'image', 'video'], ['clean']]
    },
});

// Bubble theme
var quill = new Quill('#bubble-editor', {
    theme: 'bubble'
});