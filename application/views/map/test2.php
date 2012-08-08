<html>
    <head>
        <style>
            body{
                width: 100%;
            }
            strong{
                color: #009999;
                font-size: 16px;
            }
            #map_canvas{
                float: left;
                width: 600px;
            }
            .form{
                width: 300px;
                margin-left: 30px;
                float: left;
                position: relative;
                top: 0;
            }
        </style>
        <?php echo $map['js']; ?>
    </head>
    <body>
        <?php echo $map['html']; ?>
        <div class="form">
            <form action="" enctype="multipart/form-data" method="post">
                <fieldset>
                    <legend>เพิ่ม Marker</legend>
                    <p>
                        Long : <input type="text" name="long"/>
                    </p>
                    <p>
                        La : <input type="text" name="la"/>
                    </p>
                    <p>
                        Title Marker : <input name="title" type="text"/> 
                    </p>
                    <p>
                        Images : <input type="file" name="pic" />
                    </p>
                </fieldset>
            </form>
        </div>
    </body>
</html>