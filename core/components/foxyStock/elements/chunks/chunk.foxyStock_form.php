<form action="YOUR CART ID HERE" method="post" accept-charset="utf-8">
    <input type="hidden" name="name" value="[[*pagetitle]]" />
    <input type="hidden" name="price" value="[[+price]]" />
    <input type="hidden" name="code" value="[[*foxyStock_code]]" />
    <p>Stock Level: [[*foxyStock_inventory]]</p>
    <label for="quantity">[[%ms2_cart_count]]:</label>
    <input type="number" name="quantity" id="product_price" class="input-mini" value="1" min="1" max="[[*inventory]]" />
    <input type="submit" name="Add to cart" value="Add to cart" class="submit" />
</form>