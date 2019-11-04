 <div class="w3-container" id="basket">
<div class="w3-content" style="max-width:700px">
 <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Basket</span></h5>
 <form action="/action_page.php">
  <div class="container">
    <h1>Basket</h1> 

<form action="" method="POST" id="checkout-form">
  
  <div>
	  <label for="creditCard">Card Number</label>
	  <input type="text" name="creditCard" id="creditCard">
  </div>
 
  <div>
	  <label for="cvv">Security Code</label>
	  <input type="text" name="cvv" id="cvv">
  </div>
  
  <div>
    <label for="Expiration">Exp. (MM/YYYY)</label>
      <input type="text" name="exp-month" id="exp-month" size="2">
      <span> / </span>
      <input type="text" name="exp-year" id="exp-year" size="4">
  </div>

  <button type="submit" id="submit-button">Buy Now</button>
  
</form>