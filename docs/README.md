# Table of content

-   [1. Introduction](#1-introduction)
    -   [1.1. Overall Description](#11-overall-description)
    -   [1.2. Definitions, acronyms, and abbreviations](#12-definitions-acronyms-and-abbreviations)
-   [2. Deployment](#2-deployment)
    -  [2.1. Deployment requirements](#21-deployment-requirements)
    -  [2.2. Deployment instructions](#22-deployment-instructions)
    -  [2.3. Deployment diagram](#23-deployment-diagram)
-   [3. Architectural Overview](#3-architectural-overview)
    -   [3.1. Bootstrapping](#31-bootstrapping)
    -   [3.2. Routing](#32-routing)
    -   [3.3. Design class diagram](#33-design-class-diagram)
-   [4. Modules](#4-modules)
-   [5. Code styling guide](#5-code-styling-guide)
    -  [5.1. HTML / CSS style guide](#51-html-css-style-guide)
    -  [5.2. PHP style guide](#52-php-style-guide)

# 1. Introduction

## 1.1. Overall description
The 'software design description' (SDD) describes the technical side important to Quaco.

## 1.2. Definitions, acronyms, and abbreviations
|Term | Description |
|--|--|
| **Admin panel** *a.k.a.* **back-end** | The actual GUI where the site is being managed by admins or authors |
| **Theme** *a.k.a.* **front-end** | Refers to the front-end that users will see |
| **Module** *a.k.a.* **plugin** | A module adds additional functionality to Quaco 
| **Client** | Refers to either 'front-end client' or 'back-end client' |


# 2. Deployment 

## 2.1 Deployment requirements

**PHP version will change on 28 November to 7.4**

- **[*]** = Version is required and tested
- **[ ]**  = Untested, 

| Type | version | 
|--|--|
| **[*]** PHP | 7+ |
| **[*]** MySQL| 5+ |
| **[ ]** Apache webserver | 2.4+ |
| **[ ]** DB Type| MariaDB 10+ |
| **[ ]** DB Engine| InnoDB |
| **[ ]** DB Charset | utf8mb4 |
| **[ ]** DB Collate | utf8mb4_unicode_520_ci |

## 2.2 Deployment instruction

**PRE CONDITION:** Make you sure you have Apache webserver running. For development purposes I recommend using [XAMP](https://www.apachefriends.org/download.html) for Windows or [AMPPS](https://ampps.com/download) for Mac.

 1. [Clone](https://help.github.com/en/articles/cloning-a-repository) the [project repository](https://github.com/beumerr/quaco) from GitHub to your webserver folder (htdocs).
 2. Create a new database (with phpMyAdmin).
 3. Open in the 'src' root folder 'config.php' and edit '`DB_*`' fields.
 4. Execute `localhost/quaco/src/admin/init_db.php` in the browser, this will seed the database
 5. **Done** 
     5.1.  `localhost/quaco/src/admin/`will display the admin panel 
     5.2. `localhost/quaco/src/`will display the theme

**Deploying to a different folder structure**
 1. Copy the files in 'src' to a  webserver folder you want to use
 2. Open 'config.php' edit`BASE_DIR`, if you are using your htdocs root folder use value `'/'`
 3. Edit both .htaccess files for base rewriting
   3.1. Open 'src/.htaccess' edit `RewriteBase` like you did in #2 and `RewriteRule`
   3.1. Open 'src/admin/.htaccess' edit `RewriteBase` like you did in #2 and `RewriteRule`

:fire:  For these 2 .htaccess files there is an issue open to merge both files into 1.
:wrench: Learn how to contribute

## 2.3 Deployment diagram
![enter image description here](https://i.ibb.co/mtHF2x5/Deployment-Diagram.jpg)

# 3. Architectural Overview
## 3.1. Bootstrapping
**Bootstrapping** refers to the process that is completed bilaterally from the start point to the end. At this moment in time there are 3 bootstrappers (yes this needs to be changed, please review this issue). A bootstrapper first validates the URL request in `qc-route.php` and then either redirect or continue strapping the page.

 1. **src/index.php** - used to compile the theme
 2. **src/admin/index.php** - used to compile the admin panel
 3. **src/admin/inc/qc-load-xml.php** - used to compile an XML requests

## 3.2. Routing
The Quaco theme and admin panel both work with dynamic URL's. Both clients have their own .htaccess to redirect to their client root folder ('/theme' or '/admin') index.php file but contain  their URL.

**[*] = wildcard**

| Main route | Rewrite to | Used for |
|--|--|--|
| /* | scr/index.php | Used to compile the theme that visitors will see |
| /admin/* | scr/admin/index.php | Used to compile the admin panel  |

The activity diagram below shows how routing affects the panel from being loaded.
*Note: There is no user authentication YET but this is issue will be open once [this](https://github.com/beumerr/quaco/issues/7) database class issue is completed.* 

![enter image description here](https://i.ibb.co/Ry83HL8/Admin-routing-with-XML-support.jpg)

## 3.3. Design class diagram
*Coming soon*

# 4. Modules
*Coming soon*

# 5. Code Styling Guide
The styling guide refers to the code format that Quaco expects. Contribution will be checked on these factors. Don't wanna read the hole thing? Download the code styles:

 - [Code-style.xml](/code-styling/code-style.xml)
 - [Code-style.json](/code-styling/code-style.json)

## 5.1. HTML / CSS style guide

  - Tab size is 4 spaces
  - HTML needs to be written according [W3 validator standards](https://validator.w3.org/)
  - Code must support IE 10+ 
  - Content must be responsive
  - Use global HTML/CSS classes found in `src/admin/assets/css/global.css`
  - Use comments to declare sections
  - No empty lines after bracket unless new section
  - Use flex to style responsive elements
  - Use rem for scalable content
  - Use element selectors for id's
  - Bonus for points for HTML5 and other CSS3 elements
  - Unlike the PHP style that uses underscore notation, use dash notation for HTML 
  - Prefer are RGB(A) over named colors like 'black' 
  - @max-width for responsive styling

**CSS example**

    /*-- MAIN STYLING --*/
    body {
	    background: rgba(0,0,0,.2);
	    color: rgb(0,0,0)
    }
    p:first-line {
        margin: 25px 0 0 0
    }

    /*-- NEW SECTION --*/
    section#new-section {
		display: flex;
		flex-direction: row;
    }

## 5.2. PHP style guide

 - Tab size is 4 spaces
 - Named variable with underscore instead of camel casing 
 - Simple methods in one line
 - Named index in array. *Ex:* `$arr['my-index-name']`
 - Brace placement at the end of line
 - Spaces after a comma. *Ex:* `[values, with, commas]`
 - Double quotes
 - Classes starting with capital letter
 - Var declaration alignment

**Function example:** 

    <?php
    function foo() {
        if($x > 5) {
            echo "bar";
        }
    }
    
**Organized declarations:** 

    // Array declarations
    $arr = [
		"Foo" => $foo,
		"Bar" => $boo
    ];

    // Multi var declarations
    $a			= "Awesome value";
    $item_id 	= "Underscore > camel"
    
**PHPDoc used to explain complicated functions/methods**

    /**
     * This is a sample function to illustrate additional PHP formatter
     * options.
     * 
     * @param 			$one The first parameter
     * @param int 		$two The second parameter
     * @param string 	$three The third parameter with a longer comment to illustrate wrapping.
     * @return void
     */

**Comment used to explain simple functions/methods and variable**

    // Sample for 'inline' comments
