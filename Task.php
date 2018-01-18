<!doctype html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        div{
            width:20%;
            margin:10px;
            float: left;
            border:2px solid black;
        }
        fieldset {
            width: 45%;
            float: left;
        }

        #draggable {
            width: 100px;
            height: 100px;
            background: #ccc;
        }
        li {
            color: cadetblue;
        }

        select{
            background-repeat:no-repeat;
            background-position:300px;
            width:360px;
            padding:12px;
            margin-top:8px;
            font-family:Cursive;
            line-height:1;
            border-radius:5px;
            background-color:#979797;
            color:#2b2b2b;
            font-size:20px;
            box-shadow:inset 0 0 10px 0 rgba(0,0,0,0.6);
            outline:none
        }
        select:hover {
            color:#ececec;
        }

    </style>


</head>

<body>
<?php
require_once("db.php");
$sql = "SHOW DATABASES";
$result = $con->query($sql);
?>

<fieldset>
    <legend>DATABASE:</legend>
    <select name="db" id="db">
        <?php if($result->num_rows > 0)
        {
            while($rows=$result->fetch_assoc())
            {?>
                <option class="draggable" id='<?php echo $rows['Database'];?>'><?php echo $rows['Database']; ?></option>
            <?php }
        }
        ?>
    </select>
</fieldset>
<fieldset>
    <legend>TABLE:</legend>
    <select name="table" id="table"></select>
</fieldset>


<Button class="ui-button ui-widget ui-corner-all" id="singleRight" value="->">-></Button>
<Button class="ui-button ui-widget ui-corner-all" id="allRight" value="=>">=></Button>
<Button class="ui-button ui-widget ui-corner-all"id="singleLeft" value="<-"><-</Button>
<Button class="ui-button ui-widget ui-corner-all" id="allLeft" value="<="><=</Button>
<Button id="moveUp" alt="select" value="^" class="ui-button ui-widget ui-corner-all">^</Button>
<Button id="moveDown" value="v" class="ui-button ui-widget ui-corner-all">v</Button><br><br>
<div  style="height:200px;">
    <ul id="sortable1" class='lstBox1'>
    </ul>
</div>
<div  style="height:200px;">
    <ul id="sortable2" class='lstBox2' style="width: 100%;height: 30%">
    </ul>
</div >
<br><br>
<input type="submit" name="go" id="go" value="go" class="ui-button ui-widget ui-corner-all">
<br><br>
<p id="final" #a2aec7">

</p>

</body>
<script>

    $(document).ready(function(){

        var selecteddata;
        $("#db").change(function(){
            selecteddata=$(this).val();
            alert(selecteddata);
            $.ajax({
                type: "GET",
                url:'taskhandle.php?id='+selecteddata,
                data:id=+selecteddata,
                success:function(data)
                {
                    $("#table").html(data);
                }
            });
        });


        $("#table").change(function(){
            selecteddata=$("#db").val();
            alert(selecteddata);
            var data=$(this).val();
            alert(data);
            $.ajax({
                type: "GET",
                url:'taskgetcol.php?tableid='+data+'&id='+selecteddata,
                data:tableid=+data,
                success:function(data)
                {
                    $(".lstBox1").html(data);
                }
            });
        });
        //single select
        $("#singleRight").click(function(){

            var selectOption=$(".lstBox1 option:selected");
            selectOption.remove()
            alert("sselected remove"+ selectOption.remove());
            selectOption.remove();
            //adding selected option
            $(".lstBox2").append(selectOption);
        });
        //moving multiple item from left to right
        $("#allRight").click(function(){
            var options=$(".lstBox1 option:selected");
            // Display alert when no option to move
            if(options.length==0){
                alert("Nothing to move");
            }
            //removing selected option
            options.remove();
            //adding selected option
            $(".lstBox2").append(options);
        });

        //moving single item from right to left
        $("#singleLeft").click(function(){
            var selectOption=$(".lstBox2 option:selected");
            // Display alert when move option without select
            if(selectOption.length==0){
                alert("First elect option to move");
            }
            //removing selected option
            selectOption.remove();
            //adding selected option
            $(".lstBox1").append(selectOption);
        });

        //moving multiple item from right to left
        $("#allLeft").click(function(){
            var options=$(".lstBox2 option:selected");
            // Display alert when no option to move
            if(options.length==0){
                alert("Nothing to move");
            }
            //removing selected option
            options.remove();
            //adding selected option
            $(".lstBox1").append(options);
        });
        // move option up side
        $("#moveUp").click(function(){
            //check option selected or not
            var option=$(".lstBox2 option:selected");
            if(option.length==1){
                //check position of element
                if(prevVal=option.prev().val()!=null){
                    //move element
                    option.insertBefore(option.prev());
                }else{
                    //display alert for no move
                    alert('no more move for this element');
                }

            }else{
                alert('select single element to move');
            }
        });

        // move option up side
        $("#moveDown").click(function(){
            //check option selected or not
            var option=$(".lstBox2 option:selected");
            if(option.length==1){
                //check position of element
                if(option.next().val()!=null){
                    //move element
                    option.insertAfter(option.next());
                }else{
                    alert('no more move for this element');
                }
            }else{
                alert('select single element to move');
            }
        });
        //appned value in div


        $("#go").click(function(){
            // var str= $('#mygo').html(last);;
            selecteddata1=$("#db").val();
            alert(selecteddata1);
            var table1=$("#table").val();
            alert(table1);
            var last='';

            $("#sortable2 li").each(function( value ) {
                //alert($(this).text());
                if(value== "")
                {
                    last+=$(this).text();
                }
                else
                {
                    last=last+','+$(this).text();
                }

            });
            alert(last);
           $.ajax({
                type: "GET",
                url:"getdata.php?str="+last+'&database='+selecteddata1+'&table='+table1,
                data: { showdata : last },
                success:function(data)
                {
                    alert(data);
                    $("#final").html(data);
                }
            });


        });




    });

</script>

</html>
