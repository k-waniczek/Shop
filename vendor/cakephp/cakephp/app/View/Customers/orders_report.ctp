<?php

    echo $this->Html->script("orders_report");

?>
<button id="generate">Generate CSV</button>
<input type="number" id="priceMin" placeholder="price min">
<input type="number" id="priceMax" placeholder="price max">
<input type="date" id="dateMin">
<input type="date" id="dateMax">
<select id="paymentMethod">
    <option value="Credit card">Credit card</option>
    <option value="Bank transfer">Bank transfer</option>
    <option value="PayPal">PayPal</option>
    <option value="BLIK">BLIK</option>
</select>
<select id="currency">
    <option value="EUR">EUR</option>
    <option value="USD">USD</option>
    <option value="GBP">GBP</option>
    <option value="PLN">PLN</option>
</select>
