# madmimi-mimistory
Simple Tool to display your last 20 Mad Mimi promotions on your PHP website.

###Setup:
1. Copy all files to folder location on the server (I will use "yoursite.com/mimi/" for refernce).
2. Browse to yoursite.com/mimi/setup.php
3. Enter your API Key and User name and choose colours
4. Click "Away we go"
5. **Delete "setup.php"** *as it's only used to create the initial files*

This will generate all the setup files and colours for your display which you can view what it will look like by clicking the "View Current Layout" link.

###Installation:
you would simply include the promotions.php file in any of your php scripts. Have a look at the index.php file for an example which is shown below
```
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style-promotions.css" type="text/css" />
    <link rel="stylesheet" href="css/style-colors.css" type="text/css" />
</head>
<body>
<?php
    include("pathtofile/promotions.php");
?>
</body>
</html>
```
