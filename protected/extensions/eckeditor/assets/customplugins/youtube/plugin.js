CKEDITOR.plugins.add( 'youtube',
{
   requires : [ 'iframedialog' ],
   init : function( editor )
   {
      var command = editor.addCommand( 'youtube', new CKEDITOR.dialogCommand( 'youtube' ) );

      editor.ui.addButton( 'youtube',
         {
	         label : 'Add video youtube',
	         command : 'youtube',
	         icon: CKEDITOR.plugins.getPath('youtube') + 'images/youtube.png'
         }
      );

      CKEDITOR.dialog.add( 'youtube', this.path + 'dialogs/youtube.js' );
   }
});