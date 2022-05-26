<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
    <title>Papers</title>
</head>
<body>
    <py-env>
    - pandas
    - paths:
        - python/importacion.py 
   
    </py-env>
    <py-script>
        
        #import pandas as pd
        #from pandas import *
        from importacion import importacion_columnas
        from pyodide import create_proxy
        def HTML(text):
            return text.replace("{{", "<").replace("}}", ">")
        
        num = document.getElementById("papernumber")
        tam = 0
        
      

        

        
        
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
       
        tabla = "{{table }}{{tr}}{{td }} ID {{/td}}{{td class='tit'}} Titles {{/td}} {{td class='key'}} KeyWords {{/td}} {{td class='asb'}} Abstract {{/td}}{{/tr}}"
        for i in range(0,len(abstract)):
            tabla += "{{tr}}{{td}}"+ str((i+1)) +" {{/td}} {{td class='tit' }}"+str(titulos[i]) +"{{/td}}" + " {{td class='key'}}"+str(keyword[i]) +"{{/td}}" +"{{td class='asb'}}"+str(abstract[i]) +"{{/td}}{{/tr}}"
        tabla += "{{/table}}"
        componente_tabla = document.getElementById("salida_tabla")
        componente_tabla.innerHTML = HTML(tabla)
        componente_tabla.innerHTML = HTML(tabla)
        num.innerHTML = "Number of Papers: "+ str(tam)
        
       

       
    </py-script>
          
    <ul>
            <li>
                <a href="Papers.php?id=1">All Papers</a>
                <a href="Papers.php?id=2">Ciencias Sociales</a>
                <a href="Papers.php?id=3">Computación</a>
                <a href="Papers.php?id=4">Medicina</a>
                <a href="Papers.php?id=5">Ciencias Exactas</a>
                
            </li>
    </ul>
    <?php
                if( isset($_GET['id'])){
                    $id = $_GET['id'];
                    if( $id == 1){
                        echo "<div id='busqueda'> <button value='1' id='iden'>Todos</button></div>";
                    }
                    else if( $id == 2){
                        echo "<div id='busqueda'> <button value='2' id='iden'>Ciencias Sociales </button></div>";
                    }
                    else if( $id == 3){
                        echo "<div id='busqueda'> <button value='3' id='iden'>Computacion</button></div>";
                    }
                    else if( $id == 4){
                        echo "<div id='busqueda'> <button value='4' id='iden'>Medicina </button></div>";
                    }
                    else if( $id == 5){
                        echo "<div id='busqueda'> <button value='5' id='iden'>Ciencias exactas </button></div>";
                    }
                   
                }
                else{
                    $id =1;
                    echo "<div id='busqueda'> <button value='1' id='iden'> Todos </button></div>";
                }
              
                
           
            ?>
   
    <label><input type="checkbox" checked id="cbox1"> Show Title</label><br>
    <label><input type="checkbox" checked id="cbox2"> Show Keywords</label><br>
    <label><input type="checkbox" checked id="cbox3"> Show Abstract</label><br>
    
  
    <div id="papernumber">  </div>
    <button id="lista" value="0,0,0">  </button>
    <div id="salida_tabla"> 
       
    </div>

    <script src="scripts/check.js"> </script>
</body>
</html>