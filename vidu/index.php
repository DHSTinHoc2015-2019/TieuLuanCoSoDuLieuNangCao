<head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $.ajax({
                    type: 'POST',
                    url: 'another_php_file.php',
                    data: 'req=load',
                    success: function(result) {
                        //alert(result);
                        $('textarea').val(result);
                    }
                });

                $('#mybutt').click(function() {
                    var stuff = $('textarea').val();
                    alert(stuff);
                    $.ajax({
                        type: 'POST',
                        url: 'another_php_file.php',
                        data: 'req=save&changes=' +stuff,
                        success: function(result) {
                            alert(result);
                            //$('textarea').val(result);
                        }
                    });
                });

            }); //END $(document).ready()

        </script>
    </head>
<html>
    <body>
        <input type="button" value="Save Changes" id="mybutt" />
        <textarea id='myText'  rows="30" cols="120" value='<?php echo $xml; ?>' />
    </body>
</html>