/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'el';
	//config.uiColor = '#9CBEE4';
        config.entities = false;
        config.allowedContent = true;
        config.height = 360;
        config.width = '99%';
        //config.width = 1000;
        config.removePlugins = 'liststyle,tabletools,scayt,menubutton,contextmenu,language';
};
