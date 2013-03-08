<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html>
<head>
  <style>
  div { color:red; }
  </style>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
  <form class ="target">
  <input  type="text" value="Field 1" />
  <select>
    <option value="option1" selected="selected">Option 1</option>
    <option value="option2">Option 2</option>
  </select>
</form>
<div id="other">
  Trigger the handler
</div>
    
<script>
$('.target').change(function() {
  alert('Handler for .change() called.');
});
</script>
 
</body>
</html>
