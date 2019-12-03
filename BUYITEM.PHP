  <!DOCTYPE html>
<html>
<title>SELECTING ITEMS </title>
<body>

 <?php
 include_once('cafe.css');
include_once ('header.php');
include_once ('sp-conection.php');
 while($row=$quer->fetch())
 {
	 
	 
?>
<div class="w3-container" id="menu">


	<H5>
	<?php echo $row['ProductName']?></h5>;
	<img src="<?php echo $row['image']?> "class="img">
	
	
		<?php echo $row['desicription']?></h5>;
		<p> Quantity</p>
                <select align=right>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to basket</a>
				
 <?php }?>
 <script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>


include_once('footer.php');

</body>
</html>
  
  