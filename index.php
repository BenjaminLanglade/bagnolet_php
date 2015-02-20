<!DOCTYPE html>
<html lang="FR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Les commercants de la ville de Bagnolet</title>

    <!-- Bootstrap Core CSS -->   
    <link href="css/style.css" rel="stylesheet">
    
    <script src='js/scrollReveal.js'></script>
    
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <header>
    <!-- Navigation -->   
        <nav>
            <ul>
               <a href="#top"><img id="logo" src="img/logo.png" alt="Association des commerçants"></a>    
                <li>
                    <a href="#top">Acceuil</a>
                </li>
                <li>
                    <a href="#firstPage">L'association</a>
                </li>
                <li>
                    <a href="#secondPage">Services</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </nav>
    </header>
    
       <section id="top">
           <div class="container">
              <div class="center">
                <div class="cartouche">
                       <h1 data-sr="enter left please, and hustle 20px">Les Commerçants</h1>
                       <span>de Bagnolet</span>
                   </div>
               </div>
           </div>
                
        </section>
        
        <section id="firstPage">
            <h1 data-sr="enter left please, and hustle 20px">Les Commerçants</h1>
        </section>       
           
        
        <section id="secondPage">
           
                <div class="col-1">  
                       <div class="col-1-1">
                           <i class="fa fa-circle taille"></i>
                           <h4>Bistro / Bar</h4>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><br>
                           <a href="#" class="btn"> 18 commerces</a>
                       </div>          
                      <div class="col-1-1">
                           <i class="fa fa-circle taille"></i>
                           <h4>Service</h4>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><br>
                           <a href="#" class="btn"> 18 commerces</a>
                       </div>   
                       <div class="col-1-1">
                           <i class="fa fa-circle taille"></i>
                           <h4>Beauté</h4>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><br>
                           <a href="#" class="btn"> 18 commerces</a>
                       </div> 
                       <div class="col-1-1">
                           <i class="fa fa-circle taille"></i>
                           <h4>Commerce de bouche</h4>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><br>
                           <a href="#services" onclick="submitForm()" class="btn"> 18 commerces</a>
                       </div> 
                   </div>
        </section>                 
          <section id="contact">
            <h1 data-sr="enter left please, and hustle 20px">Les Commerçants</h1>
        </section> 

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
    
    <script src='/js/scrollReveal.js'></script>
    <script>

      window.sr = new scrollReveal();

    </script>
    <script type="text/javascript">

        function submitForm()
        {
            var req = null;

            /*  document.getElementById("box2").innerHTML = "";*/

            if (window.XMLHttpRequest)
            {
                req = new XMLHttpRequest();
                if (req.overrideMimeType)
                {
                    req.overrideMimeType('text/xml');
                }
            }
            else if (window.ActiveXObject)
            {
                try {
                    req = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e)
                {
                    try {
                        req = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {}
                }
            }



            req.onreadystatechange = function()
            {
                document.getElementById("secondPage").innerHTML = "Wait server...";
                if(req.readyState == 4)
                {
                    if(req.status == 200)
                    {
                        document.getElementById("secondPage").innerHTML  = "" + req.responseText;
                    }
                    else
                    {
                        document.getElementById("secondPage").innerHTML="Error: returned status code " + req.status + " " + req.statusText;
                    }
                }
            };
            req.open("GET", "bar.php", true);
            req.send(null);
        }
        </script>
        </body>

</html>
