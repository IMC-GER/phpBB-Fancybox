# phpBB-Fancybox

## Description
This phpBB extension adds the image viewer Fancybox 3, 4 or 5 to your forum. It adds Fancybox attribute to all images in the posts. 
The attached image files get the alternate text or the file comment as caption. For other external images, the link is displayed.
It displays all attached images on the page as one gallery. Fancybox v3 is part of this package. It is licensed under the [GPLv3](https://www.gnu.org/licenses/gpl-3.0.en.html).
[Fancybox ](https://fancyapps.com/fancybox)  

## Requirements
- php 5.4.7 or higher
- phpBB 3.2.0 or higher
- Fancybox v3.5.7 or higher

## Installation
Copy the extension to `phpBB3/ext/imcger/fancybox`

Fancybox v3 is licensed under the [GPLv3](https://www.gnu.org/licenses/gpl-3.0.en.html) license for all open source applications.
A commercial license is required for all commercial applications.

If you use Fancybox v4 or v5 you need a Fancyapps license. More infos [Fancyapps](https://fancyapps.com).
Buy a license and  copy the `fancybox.css` and `fancybox.umd.js` to `phpBB3/ext/imcger/fancybox/styles/all/template/fancybox`.

Go to "ACP" > "Customise" > "Extensions Manager" and enable the "Fancybox" extension.

## Importent
When you use the extension "External Links" (`imcger/externallinks`) please update it to version v1.2.2 or higher.

## Settings
From the ACP, you can customize the toolbar and the transition effect during image change.
Go to "ACP" > "Extensions" > "Fancybox settings" and customize "Fancybox".

## Compatible with
- phpBB.de \- External Image as Link (`phpbbde/externalimgaslink`)
- External Link In New Window (`martin/externallinkinnewwindow`)
- External Links Open in New Window (`rmcgirr83/elonw`)
- External Links (`imcger/externallinks`)

## Changelog

### v1.3.0 (21-03-2023)
- ACP added controller
- ACP changed from radio button to toggel
- ACP revised Twig code
- Minore code change
- Added check system requirements
- Added support for `External Links Open in New Window`
- Added support for `Fancybox 5`
- Removed deprecated method for user language

### v1.2.5 (07-10-2022)
- Code change

### v1.2.4 (06-04-2022)
- Code change (remove JS)

### v1.2.3 (19-03-2022)
- Cleanup Code

### v1.2.2 (09-12-2021)
- Bug: Support UCP setting `Display images within posts´, has priority.

### v1.2.1 (06-12-2021)
- Remove: shows plain-text images like images inserted with BBcode, ist a part of phpBB extension "external-links".
- Minor code change for php 8.0.
- Compatible with  phpBB extension "external-links".

### v1.2.0 (25-11-2021)
- shows plain-text images like images inserted with BBcode

### v1.1.0 (06-11-2021)
- Minor code change.
- Show the Fancybox version in ACP.
- Add settings for picture frame.

### v1.0.1 (15-10-2021)
- Minor code change.
- Using phpBB’s template syntax.
- Add Fancybox v3.5.7 files.

### v1.0.0 (11-10-2021)

## Update
- Navigate in the ACP to `Customise -> Manage extensions`.
- Click the `Disable` link for Fancybox.
- Delete the `fancybox` folder from `phpBB3/ext/imcger/`.
- Install the new Fancyboy extension.
 
## Uninstallation
- Navigate in the ACP to `Customise -> Manage extensions`.
- Click the `Disable` link for Fancybox.
- To permanently uninstall, click `Delete Data`, then delete the `fancybox` folder from `phpBB3/ext/imcger/`.

## License
**phpBB-Fancybox**
[GPLv2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)

**Fancybox v3**
Is licensed under the [GPLv3](https://www.gnu.org/licenses/gpl-3.0.en.html) license for all open source applications.
A commercial license is required for commercial use. [Fancybox 3](https://fancyapps.com/fancybox)

**Fancybox v4 or higher** 
You need a Fancybox license for none commercial use and commercial use.
[Fancyapps](https://fancyapps.com)
