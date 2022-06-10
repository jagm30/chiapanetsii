
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title></title>
    <style>
            /** 
            * Set the margins of the PDF to 0
            * so the background image will cover the entire page.
            **/
            @page {
                margin: 0cm 0cm;
            }

            /**
            * Define the real margins of the content of your PDF
            * Here you will fix the margins of the header and footer
            * Of your background image.
            **/
            body {
                margin-top:    4cm;
                margin-bottom: 1cm;
                margin-left:   1cm;
                margin-right:  1cm;
                font-family: "Tahoma", serif;
            }

            /** 
            * Define the width, height, margins and position of the watermark.
            **/
            #watermark {
                position: fixed;
                bottom:   0px;
                left:     0px;
                top:     0px;
                /** The width and height may change 
                    according to the dimensions of your letterhead
                **/
                width:    21cm;
                height:   28cm;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }
            table {
               border-collapse: collapse;
               border:1px solid black;
              width: 100%;
            }

            th, td {
              text-align: left;
              padding: 5px;
              border:1px solid black;
            }

            /*tr:nth-child(even){background-color: #f2f2f2}*/

            th {
              background-color: #ECEDED;
              color: black;
            }
            .verticalText {
                writing-mode: vertical-lr;
                transform: rotate(180deg);
            }
            .page-break {
    page-break-after: always;
}
        </style>
</head>
<body>
     <div id="watermark">
           <!--<img src="{{ public_path().'/img/formato.jpg' }}" width="100%" height="100%">             -->
           <img class="mx-auto" src="{{ URL::asset('https://lasalle.chiapanetcomputo.com/img/formato.jpg') }}" width="100%" height="100%">
      </div>     
      <p style="position: fixed;
                bottom:   0px;
                left:     38px;
                top:     117px;
                font-size: 10pt;">Reporte del {{date('d-m-Y', strtotime('2019-01-01'))}}  al  {{date('d-m-Y', strtotime('2019-01-01'))}}</p>          
</body>
</body>
</html>
<!--<h1>Pagina 1</h1>
<div class="page-break"></div>
<h1>Pagina 2</h1>-->