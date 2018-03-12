/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
*/
CKEDITOR.editorConfig = function( config )
{
	config.toolbar = 'MyToolbar';
 
	config.toolbar_MyToolbar =
	[
		{ name: 'document', items : [ 'Source','Preview' ] },
		//{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar','PageBreak'
                 ,'Iframe' ] },
               // '/',
		//{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyFull' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'Styles', items : ['Styles','Format','Font','FontSize','Smiley']},
		//{ name: 'tools', items : [ 'Maximize','-','About' ] }
	];
	/*define('GSEDITORTOOL', 'advanced');
define('GSEDITORTOOL',"['Source','-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','Find','Replace','-','SelectAll','RemoveFormat'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
    ['TextColor','BGColor','-','Rule','PageBreak'],['NumberedList','BulletedList','-','Outdent','Indent'],
    '/',
    ['Blockquote','-','Smiley'],['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule'],    '/',
    ['Styles','Format','Font','FontSize'],['ShowBlocks']
    ");*/
};