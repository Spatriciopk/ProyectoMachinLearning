<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>

    <!-- LIBRERÍA BOOSTRAP -->
    

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> 

<!-- Estilos -->
<link rel="stylesheet" href="css/Estilos.css">

<title>Papers</title>
</head>
<body>
    <py-env>
    - pandas
    - paths:
        - python/importacion.py 
   
    </py-env>
    <py-script>
        
        import pandas as pd
        from pyodide import create_proxy
        from pyodide.http import open_url
        def HTML(text):
            return text.replace("{{", "<").replace("}}", ">")
        
        num = document.getElementById("papernumber")
        tam = 0
        def importacion_columnas(columna):
            url = "https://raw.githubusercontent.com/Freddy8-C/Proyecto_MachineLearning/master/csv/Proyecto.csv"
            data = pd.read_csv(open_url(url))
            columna = data[columna].tolist()
            return columna
  
        titulos=""
        keyword=""
        abstract=""
        #show = Element('lista').value
        #valor_lista = show.split(",")
        #print(valor_lista)
        #if(valor_lista[0]=='1'):
        titulos = importacion_columnas("Titles")
        
        #if(valor_lista[1]=='2'):
        keyword = importacion_columnas("Keywords")
        
        #if(valor_lista[2]=='3'):
        abstract = importacion_columnas("Abstract")
       
        categoria = Element('iden').value
        
        tam = len(abstract)
        if( categoria == '1'):
            abstract = importacion_columnas("Abstract")
            titulos = importacion_columnas("Titles")
            keyword = importacion_columnas("Keywords")
            tam = len(abstract)
        elif( categoria == '2'):
            abstract = abstract[0:48]
            titulos = titulos[0:48]
            keyword = keyword[0:48]
            tam = len(abstract)
        elif( categoria == '3'):
            abstract = abstract[48:96]
            titulos = titulos[48:96]
            keyword = keyword[48:96]
            tam = len(abstract)
        elif( categoria == '4'):
            abstract = abstract[96:144]
            titulos = titulos[96:144]
            keyword = keyword[96:144]
            tam = len(abstract)
        elif( categoria == '5'):
            abstract = abstract[144:192]
            titulos = titulos[144:192]
            keyword = keyword[144:192]
            tam = len(abstract)
       
        tabla = "{{div class='table-responsive'}}  {{table class='table'}} {{thead}}  {{tr}}{{th }} ID {{/th}}{{th class='tit'}} Titles {{/th}} {{th class='key'}} Keywords {{/th}} {{th class='asb'}} Abstract {{/th}}{{/tr}} {{/thead}}"
        for i in range(0,len(abstract)):
            tabla += "{{tr}}{{td}}"+ str((i+1)) +" {{/td}} {{td class='tit' style='width:400px;'}}"+str(titulos[i]) +"{{/td}}" + " {{td class='key'}}"+str(keyword[i]) +"{{/td}}" +"{{td class='asb'}}  {{div style='height:100px;overflow:auto;'}}  "+str(abstract[i]) +"{{/div}} {{/td}}{{/tr}}"
        tabla += "{{/table}} {{/div}}"
        componente_tabla = document.getElementById("salida_tabla")
        componente_tabla.innerHTML = HTML(tabla)
        componente_tabla.innerHTML = HTML(tabla)
        num.innerHTML = "Number of Papers: "+ str(tam)
        
       

       
    </py-script>

    <div class="logo">
        <img src="img/Logo.png" alt="Logo Machine Learning" />
    </div>
          


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Index</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Papers
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="Papers.php?id=1">All Papers</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="Papers.php?id=2">Social Sciences</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="Papers.php?id=3">Computing</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="Papers.php?id=4">Medicine</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="Papers.php?id=5">Exact Sciences</a></li>
          </ul>
        </li>
            <a class="navbar-brand" href="Dendrogram.php">Dendrogram</a>
            <a class="navbar-brand" href="MDS.php">MDS</a>
            <a class="navbar-brand" href="Wordmap.php">Wordmap</a>
            <a class="navbar-brand" href="Schedule.php">Schedule</a>
    </ul>
    </div>
  </div>
</nav>


    <!-- <ul class="nav nav-tabs bg-dark" >
            <li class="nav-item"><a class="nav-link" href="index.php">Index</a></li>  
            <li class="nav-item"><a class="nav-link" href="Papers.php">Papers</a></li> 
            <li><hr class="dropdown-divider"></li>

            <li class="nav-item"><a class="nav-link" href="Dendrogram.php">Dendrogram</a></li>
            <li class="nav-item"><a class="nav-link" href="MDS.php">MDS</a></li>
            <li class="nav-item"><a class="nav-link" href="Wordmap.php">Wordmap</a></li>
            <li class="nav-item"><a class="nav-link" href="Schedule.php">Schedule</a></li>


            
            <li class="nav-item"><a class="nav-link" href="Papers.php?id=1">All Papers</a></li>
            <li class="nav-item"><a class="nav-link" href="Papers.php?id=2">Social Sciences</a></li> 
            <li class="nav-item"> <a class="nav-link" href="Papers.php?id=3">Computing</a></li>
            <li class="nav-item"><a class="nav-link" href="Papers.php?id=4">Medicine</a></li>
            <li class="nav-item"><a class="nav-link" href="Papers.php?id=5">Exact Sciences</a></li>
    </ul> -->

    <div id="papernumber">  </div>

    <?php
                if( isset($_GET['id'])){
                    $id = $_GET['id'];
                    if( $id == 1){
                        echo "<div id='busqueda'> <button value='1' id='iden'><h1>All Papers</h1></button></div>";
                    }
                    else if( $id == 2){
                        echo "<div id='busqueda'> <button value='2' id='iden'><h1> Social Sciences</h1></button></div>";
                    }
                    else if( $id == 3){
                        echo "<div id='busqueda'> <button value='3' id='iden'><h1> Computing</h1></button></div>";
                    }
                    else if( $id == 4){
                        echo "<div id='busqueda'> <button value='4' id='iden'><h1> Medicine</h1> </button></div>";
                    }
                    else if( $id == 5){
                        echo "<div id='busqueda'> <button value='5' id='iden'><h1> Exact Sciences</h1></button></div>";
                    }
                   
                }
                else{
                    $id =1;
                    echo "<div id='busqueda'> <button value='1' id='iden'> <h1> All Papers </h1> </button></div>";
                }
              
                
           
            ?>
    
    <label><input type="checkbox" checked id="cbox1"> Show Title</label><br>
    <label><input type="checkbox" checked id="cbox2"> Show Keywords</label><br>
    <label><input type="checkbox" checked id="cbox3"> Show Abstract</label><br>
    
  
    
    <button id="lista" value="0,0,0">  </button>
    <div id="salida_tabla"> 
       
    </div>

    <script src="scripts/check.js"> </script>

    <footer>
<p>
Elaborado por: Estudiantes de la Universidad Politécnica Salesiana.
</p>
</footer>

</body>




</html>