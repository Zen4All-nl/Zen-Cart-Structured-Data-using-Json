# Zen-Cart-Structured-Data-using-Json
There already are several Structured Data modules available for Zen Cart, but this one does not hack core files. Instead the data is generated through Json files

There are multiple Json files, each controling a different part of the structured data mark up.
- structured_data_product.php, for product data and reviews
- structured_data_breadcrumb.php, for the breadcrumb trail
- structured_data_organisation.php, for info about your organistion
- structured_data_website.php, for info about the website
- structured_data_professional_service.php, for information about the services you provide

after copying the files you need to edit them for some aditional info:
- structured_data_organisation.php -> line 20 through 24: here you can add your languages and you social media profiles
- structured_data_organisation.php -> open and edit all the info


In a not to distant futere I want to add some database constants to controll all edits.
This is the minimal required info in the files for Google. You can add a lot more data if you like
