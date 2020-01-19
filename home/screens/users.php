
<input type="file" accept=".csv" id="csvFileInput">
<button id="send">envoyer</button>
<script>

    function handleFiles(files) {
        // Check for the various File API support.
        if (window.FileReader) {
            // FileReader are supported.
            getAsText(files[0]);
        } else {
            alert('FileReader are not supported in this browser.');
        }
    }

    function getAsText(fileToRead) {
        var reader = new FileReader();
        // Read file into memory as UTF-8      
        reader.readAsText(fileToRead);
        // Handle errors load
        reader.onload = loadHandler;
        reader.onerror = errorHandler;
    }

    function loadHandler(event) {
        var csv = event.target.result;
        processData(csv);
    }

    function processData(csv) {
        var allTextLines = csv.split(/\r\n|\n/);
        var lines = [];
        if (allTextLines[0].includes(';')) {
            var bool = false;
        } else if (allTextLines[0].includes(',')) {
            var bool = true;
        } else {
            alert("fichier non pris en charge, format des données doit être 'firstname;surname;flat'");
            return;
        }
        for (var i=0; i<allTextLines.length-1; i++) {
            if(bool) {
                var data = allTextLines[i].split(',');
            } else {
                var data = allTextLines[i].split(';');
            } 
            var tarr = []; 
            for (var j=0; j<data.length; j++) {
                tarr.push(data[j]);
            }
            lines.push(tarr);
        }
        var taille=lines.length;
        var myJson=[];
        for (var i=0; i<taille; i++) {
            myJson.push({firstname: lines[i][0], lastname: lines[i][1], flat: lines[i][2]});
        }
        console.log(myJson)
        myJson=JSON.stringify(myJson)
        $.ajax({
            url : './../php/LDAPuser.php',
            type : 'GET',
            data : {data:myJson},
            dataType : 'html', // On désire recevoir du HTML
            success : function(code_html, statut){ // code_html contient le HTML renvoyé
                console.log("RECU:");
                document.write(code_html);
            }
        });
    }

    function errorHandler(evt) {
        if(evt.target.error.name == "NotReadableError") {
            alert("Canno't read file !");
        }	
    }
    $("#send").click(function(){
        handleFiles($("#csvFileInput")[0].files)
    })
       
    
	</script>









