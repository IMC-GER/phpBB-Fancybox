# phpBB-Fancybox

## Description

This phpBB extension adds the fancybox attribute to all images in the posts. 
The attached image files get the alternate text of the image as caption. With the other images, the link is displayed.
It will turn on a fancybox for displaying the large image of thumbnails.  It defaults as a gallery showing all the attached images on the page.  

## Requirements
- phpBB 3.2.0 or higher
- Fancybox v3.5.7 or Fancybox v4.0

## Installation

Copy the extension to `phpBB/ext/imcger/fancybox`

Download Fancybox v3.5.7 from [github](https://github.com/fancyapps/fancybox/tags) and copy `jquery.fancybox.min.css` and `jquery.fancybox.min.js` to the folder `phpBB/ext/imcger/fancybox/styles/all/fancybox`.
Fancybox v3 is licensed under the [GPLv3](https://opensource.org/licenses/GPL-3.0) license for all open source applications.
A commercial license is required for all commercial applications (including sites, themes and apps you plan to sell).

If you use Fancybox v4 you need a Fancyapps license. More infos [Fancyapps](https://fancyapps.com).
Buy a license and  copy the `fancybox.css` and `fancybox.umd.js` to `phpBB/ext/imcger/fancybox/styles/all/fancybox`.

Go to "ACP" > "Customise" > "Extensions Manager" and enable the "Fancybox" extension.

## Settings

From the ACP, you can customize the toolbar and the transition effect during image change.
Go to "ACP" > "Extensions" > "Fancybox settings" and customize "Fancybox".

## Changelog

### v1.0.0 (11-10-2021)
 
## Uninstallation
- Navigate in the ACP to `Customise -> Manage extensions`.
- Click the `Disable` link for Fancybox.
- To permanently uninstall, click `Delete Data`, then delete the `fancybox` folder from `phpBB3/ext/imcger/`.

## License
**phpBB-Fancybox**
[GPLv2](https://opensource.org/licenses/GPL-2.0)

**Fancybox v3**
Is licensed under the [GPLv3](https://opensource.org/licenses/GPL-3.0) license for all open source applications.
A commercial license is required for commercial use.

**Fancybox v4** 
You need a Fancybox license for none commercial use and commercial use.
[Fancyapps](https://fancyapps.com)
