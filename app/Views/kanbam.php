<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>jQuery example: drag and drop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            
            
            .dropzone {
                height: 100px;
                background: cyan;
                border: solid 1px;
            }
        </style>
    </head>
    <body>
        <div class="row">    <div>Drag Winston into the rectangle</div>
            <div class="col-2">
    <img id="winston" src="https://www.kasandbox.org/programming-images/creatures/Winston.png" max-width: 100%></div>
    </div>
    </div>
    
    <div class="row">
        
        
        
        
        
        
        
      <div class="col-3">  
          <div class="dropzone"></div> 
          
      </div>
      <div class="col-3"> 
               
            <div class="dropzone"></div>   
            
             </div>
      <div class="col-3"> 
                    
             <div class="dropzone"></div>  
             
      </div>
      <div class="col-3"> 
              <div class="dropzone"></div> 
              
                </div>
      <div class="col-3"> 
         <div class="dropzone"></div>
         
           </div>
        
    </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Also include jQueryUI -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $("#winston").draggable();
        $(".dropzone").droppable({
            drop: function(event, ui) {
                $(this).css('background', 'rgb(0,200,0)');
            },
            over: function(event, ui) {
                $(this).css('background', 'orange');
            },
            out: function(event, ui) {
                $(this).css('background', 'cyan');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
