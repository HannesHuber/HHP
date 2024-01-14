<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Heber</title>
<meta name="author" content="H-Pc">
<?php
echo '<link rel="stylesheet" type="text/css" href="CSS/alt_uebersicht.css">';
?>
<script type='text/javascript' src="jquery-2.2.1.min.js"></script>
<script  src="colResizable-1.6.js"></script>
 <script type="text/javascript">
	$(function(){	
        
        var innerHTML = $("#updatePanel").html();
        
        var onTablesCreated = function(){
            $("#normal").colResizable({
                liveDrag:true, 
                gripInnerHtml:"<div class='grip'></div>", 
                draggingClass:"dragging", 
                resizeMode:'fit', 
                postbackSafe:true,
                partialRefresh:true});

            $("#flex").colResizable({
                liveDrag:true, 
                gripInnerHtml:"<div class='grip'></div>", 
                draggingClass:"dragging", 
                resizeMode:'flex', 
                postbackSafe:true,
                partialRefresh:true});


            $("#overflow").colResizable({
                liveDrag:true, 
                gripInnerHtml:"<div class='grip'></div>", 
                draggingClass:"dragging", 
                resizeMode:'overflow', 
                postbackSafe:true,
                partialRefresh:true}); 
        }

		var fakePostback = function(){
			$("#updatePanel").html('<img src="img/loading.gif"/>');
			setTimeout(function(){
				$("#updatePanel").html(innerHTML);
				onPostbackOver();
				}, 700);
		};
		
		var onPostbackOver = function(){
			onTablesCreated();
		};
		
        
		$("#postback").click(fakePostback);
        onPostbackOver();
		
    });
  </script>
  </head>
<body>

	<div class="center" >
	<div id="updatePanel">	
        <h3>Try to resize your browser to understand what is going on in this sample</h3>
        <br/>
    
        <p><strong>resizeMode: 'fit'</strong> table width adapts to the container width. Columns resize using their neighbour's width</p>
		 <table class="tabelle" id="normal" width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th>header</th><th>header</th><th>header</th>
			</tr>
			<tr>
				<td class="left">cell</td><td>cell</td><td class="right">cell</td>
			</tr>
			<tr>
				<td class="left">cell</td><td>cell</td><td class="right">cell</td>
			</tr>
			<tr>
				<td class="left bottom">cell</td><td class="bottom">cell</td><td class="bottom right">cell</td>
			</tr>																	
		</table>

        
        <p><strong>resizeMode: 'flex'</strong> columns are sized independently unless there is not enought space in the container</p>
        <table  id="flex"  width="50%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th>header</th><th>header</th><th>header</th>
            </tr>
            <tr>
                <td class="left">cell</td><td>cell</td><td class="right">cell</td>
            </tr>
            <tr>
                <td class="left">cell</td><td>cell</td><td class="right">cell</td>
            </tr>
            <tr>
                <td class="left bottom">cell</td><td class="bottom">cell</td><td class="bottom right">cell</td>
            </tr>																	
        </table>
 
        
        <p><strong>resizeMode: 'overflow'</strong> columns are sized independently. Table width can exceed its container </p>
        <div class="scroll">
            <table class="tabelle"  id="overflow" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>header</th><th>header</th><th>header</th>
                </tr>
                <tr>
                    <td class="left">cell</td><td>cell</td><td class="right">cell</td>
                </tr>
                <tr>
                    <td class="left">cell</td><td>cell</td><td class="right">cell</td>
                </tr>
                <tr>
                    <td class="left bottom">cell</td><td class="bottom">cell</td><td class="bottom right">cell</td>
                </tr>																	
            </table>
        </div>
        
        <p><strong>disabled columns:</strong> it can be specified whether some columns will not have resizing grip</p>
        <table class="tabelle"  id="disabled" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th>header</th><th>header</th><th class="disabled">disabled</th>
            </tr>
            <tr>
                <td class="left">cell</td><td>cell</td><td class="right disabled">disabled</td>
            </tr>
            <tr>
                <td class="left">cell</td><td>cell</td><td class="right disabled">disabled</td>
            </tr>
            <tr>
                <td class="left bottom">cell</td><td class="bottom">cell</td><td class="bottom right disabled">disabled</td>
            </tr>																	
        </table>
		<br/>



	</div>		
	
	
	</div>	
			
 </body>
 </html>
<?php

