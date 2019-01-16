<?php
session_start();
if(!isset($_SESSION["connected"])) {
 	header("location:login.html");
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Note Form</title>
    <meta charset="UTF8">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="assets/css/register.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/note.js"></script>
</head>
<body>
    <div class="container main">
        <fieldset>
            <div id="legend">
                <legend class="">Note</legend>
            </div>

            <hr>
            <div class="control-group">
                <label class="control-label" for="note">Name</label>
                <div class="controls">
                    <input type="text" id="name" name="name" placeholder="" class="form-control input-lg">
                </div>
            </div>
            <hr>

            <hr>
            <div class="control-group">
                <label class="control-label" for="note">Note</label>
                <div class="controls">
                    <input type="text" id="note" name="note" placeholder="" class="form-control input-lg">
                </div>
            </div>
            <hr>            
            <hr>
                    <input type="hidden" id="idevent" name="idevent" value="<?php echo $_GET["idevent"];?>" readonly>
            </div>
            <hr>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-success" id="save_btn">Save</button>
                </div>
            </div>
        </fieldset>
    </div>
</body>
</html>
