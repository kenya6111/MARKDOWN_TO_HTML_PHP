<!DOCTYPE html>
<html>
  <head>
    <title>browser-amd-editor</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2>Monaco Editor Sample</h2>
    <div class ="container">
        <div
          id="editer"
          class="child"
        ></div>
        <div
          class="child"      
          >
          <div id="button">
            <button>Preview</button>
            <button>HTML</button>
            <button>highlight: ON</button>
            <button>Download</button>
          </div>
          <div id ="result">

          </div>
        </div>
    </div>
    
    <script src="./node_modules/monaco-editor/min/vs/loader.js"></script>
    <script>
      require.config({ paths: { vs: "./node_modules/monaco-editor/min/vs" } });

      require(["vs/editor/editor.main"], function () {
        var editor = monaco.editor.create(
          document.getElementById("editer"),
          {
            value: '',
            language: "markdown",
          }

        );
        document.getElementById('button').addEventListener('click',function(e){
            e.preventDefault();

            var editorContent = editor.getValue();

            //fetch APIを用いてサーバに送信
            fetch('result.php',{
                method:'POST',
                //mode: "no-cors",
                headers:{
                'Content-Type' : 'application/x-www-form-urlencoded',
                },
                body: 'content=' + encodeURIComponent(editorContent)
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("result").innerHTML = data;
            })
        })

      });
    </script>
  </body>
</html>
