<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="includes/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="addchap.css">

<body>
  <div class="document-editor">
      <div id="toolbar-container"></div>
      <div class="document-editor__editable-container">
        <div id="editor">
            This is the shit
        </div>
    </div>
  </div>

<script>
DecoupledEditor
          .create( document.querySelector( '#editor' ) )
          .then( editor => {
              const toolbarContainer = document.querySelector( '#toolbar-container' );

              toolbarContainer.appendChild( editor.ui.view.toolbar.element );
              window.editor = editor;
          } )
          .catch( error => {
              console.error( error );
          } );
</script>
</body>
</html>
