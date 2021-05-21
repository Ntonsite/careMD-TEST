<?php 




$encounter_nr = $_GET['encounter_nr'];
if(isset($_POST['signaturesubmit'])){ 

    $signature = $_POST['signature'];
    $signatureFileName = 'signature'.$encounter_nr.'.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);    
    $file = 'signatures/'.$signatureFileName;
    file_put_contents($file, $data);
    //$msg = "<div class='alert alert-success'>Signature Uploaded</div>";
    //header("location: ".$root_path."/modules/billing_tz/billing_tz_quotation_create.php?" . URL_APPEND . "&unit_price=" . $batch_nr . "&ok=" . $new_bill_number . "&namelast=quotation&patient=" . $_REQUEST['patient']."&namefirst=" . $batch_nr . "&countpres=" . $new_bill_number . "&countlab=quotation&encounter_nr=" . $_REQUEST['patient']."&insurance_id=" . $batch_nr . "&insrname=" . $new_bill_number . "&bankref=quotation&pid=" . $_REQUEST['patient']);

} 

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../modules/nhif/bootstrap.min.css">
    <style>
        #canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height:auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <?php echo isset($msg)?$msg:''; ?>
                <h2>HTML5 and PHP Signature Pad</h2>
                <hr>
                <div id="canvasDiv"></div>
                <br>
                <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                <button type="button" class="btn btn-success" id="btn-save" onclick="goBack()">Save</button>

                <?php $_GET["namelast"]=isset($_GET["namelast"])? $_GET["namelast"] : null;  ?>

                <a class="btn btn-success" href='../../modules/billing_tz/billing_tz_quotation_create.php?unit_price=<?php echo  $_GET["unit_price"]?>&ok=<?php echo $_GET["ok"]?>&namelast=<?php echo $_GET["namelast"];?>&patient=<?php echo $_GET["patient"]?>&namefirst=<?php echo $_GET["namefirst"]?>&countpres=<?php echo $_GET["countpres"]?>&countlab=<?php echo $_GET["countlab"]?>&encounter_nr=<?php echo $_GET["encounter_nr"]?>&insurance_id=<?php echo $_GET["insurance_id"]?>&insrname=<?php echo $_GET["insrname"]?>&bankref=<?php echo $_GET["bankref"]?>&pid=<?php echo $_GET["pid"]?>'>CLOSE</a>
            </div>
            <form id="signatureform" action="" style="display:none" method="post">
                <input type="hidden" id="signature" name="signature">
                <input type="hidden" name="signaturesubmit" value="1">
            </form>
        </div>
    </div>
</body>
<script src="../../modules/nhif/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="../../modules/nhif/html2canvas.min.js"></script>
<script type="text/javascript">
    function goBack(){
        window.history.go(-2);
    }
</script>
<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

</script>
</html>