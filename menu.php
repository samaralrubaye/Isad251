
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
	<?php
	

include_once("header.php")
?>
</head>
<body>

<?php
 include_once("cafe.css ") 
?>
<!-- Menu Container -->
<div class="w3-container" id="menu">
<!--read the data base-->
 

 
        <div class="w3-content" style="max-width:700px">

            <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE MENU</span></h5>
			

            <div class="w3-row w3-center w3-card w3-padding">
			
                <a href="javascript:void(0)" onclick="openMenu(event, 'Eat');" id="myLink">
                    <div class="w3-col s6 tablink">Eat</div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');">
                    <div class="w3-col s6 tablink">Drink</div>
                </a>
            </div>

            <div id="Eat" class="w3-container menu w3-padding-48 w3-card">
			  <?php while($row=$quer->fetch()):?>
                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Assortment of fresh baked fruit breads and muffins 5.50</p><br>
                <p> Quantity</p>
                <select align=right>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to basket</a>

                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Natural cereal of honey toasted oats, raisins, almonds and dates 7.00</p><br>
                <p> Quantity</p>
                <select >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to bascket</a>

              <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Vanilla flavored batter with malted flour 7.50</p><br>
                <p> Quantity</p>
                <select >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>

                <a href="#" class="w3-button w3-black">add to bascket</a>


                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Scrambled eggs, roasted red pepper and garlic, with green onions 7.50</p><br>
                <p> Quantity</p>
                <select>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to bascket</a>


               <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">With syrup, butter and lots of berries 8.50</p>

                <p> Quantity</p>
                <select align=right>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to basket</a><br>

                <a href="#" class="w3-button w3-black"> finsh go to basket</a>
            </div>


            <div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Regular coffee 2.50</p></br>
                <p> Quantity</p>
                <select align=right>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#basket" class="w3-button w3-black">add to basket</a>

                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Chocolate espresso with milk 4.50</p><br>
                <p> Quantity</p>
                <select align=right>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#basket" class="w3-button w3-black">add to basket</a>

                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Whiskey and coffee 5.00</p><br>
                <p> Quantity</p>
                <select align=right>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to basket</a>

                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Hot tea, except not hot 3.00</p><br>
                <p> Quantity</p>
                <select >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to basket</a>

                <h5><?php echo $row['ProductName']?></h5>
                <p class="w3-text-grey">Coke, Sprite, Fanta, etc. 2.50</p>
                <p> Quantity</p>
                <select align=right>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <a href="#" class="w3-button w3-black">add to basket</a>
            </div>
            <img src="thetea.jpg" style="width:100%;max-width:1000px;margin-top:32px;">
			
        </div>
    </div>
	<?php endwhile; ?>
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

<?php

include_once("footer.php")
?>
</body>
</html>