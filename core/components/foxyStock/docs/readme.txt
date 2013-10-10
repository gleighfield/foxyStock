FoxyStock Version: 1.0

An extra for handling stock control with a FoxyCart store.
Any question or emails, please email graeme@gelstudios.co.uk, or tweet @gel_studios

[[!foxyStock? key=`your uniquekey`]]

Attributes :
key = Unique datafeed key from Foxy Cart
tvCode = Name of the TV used for holding the unique product code. Default = foxyStock_code
tvInventory = Name of the TV used for holding the inventory. Default = foxyStock_inventory
logFile = Location of logFile, if you do not want logging, pass a blank call to this. Default = assets/foxyStock.log

Instructions :
 - Create document with snippet call in, copy URL of that page.
 - Login to foxy cart
 - Ensure the correct store is selected (if you manage multiple)
 - Select "advanced"
 - Tick "Would you like to enable your store datafeed?"
 - Paste the URL of the snippet call into "datafeed url"
 - Copy API Key and put into snippet call.

Included TV's : foxyStock_code & foxyStock_inventory
You must allocate these to a template before you can use them

Included Chunks :
[[$foxyStock_form]]

Shows you a form with add to cart button, and current inventory level. If you alter your TV's you will need to adjust the calls.
You NEED to put your custom FoxyCart form action in this form before using it.