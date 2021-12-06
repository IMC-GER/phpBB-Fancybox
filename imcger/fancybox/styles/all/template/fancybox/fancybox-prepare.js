/**
		IMC JavaScript Programm
	--------------------------------------------------------------
		Name: fancybox-prepare.js
		Last edit: 06.12.2021
		Copyright: (c) 2021 Thorsten Ahlers
		License: GNU General Public License, version 2 (GPL-2.0)
	--------------------------------------------------------------	
		AddOn für die phpBB Forum Software.
		Das Skript durchsucht die Seite nach Dateianhängen verlinkte Bilder
		und Bilder die mit den BBCode eingefügt sind. Den Elementen werden
		die Fancybox Attribute hinzugefügt damit diese mit den Fancybox
		Bildbetrachter geöffnet werden können.
*/

var x, i;

/* Dateianhänge  S_THUMBNAIL */
x = document.querySelectorAll("a > .postimage");
for (i = 0; i < x.length; i++) {
	x[i].closest('a').setAttribute("data-fancybox","image");
	x[i].closest('a').setAttribute("data-caption", x[i].getAttribute("alt"));
}

/* Dateianhänge  S_IMAGE */
x  = document.querySelectorAll(".attach-image > .postimage");
for (i = 0; i < x.length; i++) {
	var srcAttr = x[i].getAttribute("src");
	var altAttr = x[i].getAttribute("alt");
	var newEle = '<a href="' + srcAttr + '" data-fancybox="image" data-caption="' + altAttr + '">' + x[i].outerHTML + '</a>';

	x[i].insertAdjacentHTML("afterend",newEle);
	x[i].remove();
}

/* Verlinkte Bilder  BBCode IMG */
x  = document.querySelectorAll(".content > .postimage");
for (i = 0; i < x.length; i++) {
	var srcAttr = x[i].getAttribute("src");
	var newEle = '<a href="' + srcAttr + '" data-fancybox="image" data-caption="' + srcAttr + '">' + x[i].outerHTML + '</a>';

	x[i].insertAdjacentHTML("afterend",newEle);
	x[i].remove();
}
x  = document.querySelectorAll(".imcger-img-wrap");
for (i = 0; i < x.length; i++) {
	var srcAttr = x[i].children[0].getAttribute("src");
	var newEle = '<a href="' + srcAttr + '" data-fancybox="image" data-caption="' + srcAttr + '">' + x[i].outerHTML + '</a>';

	x[i].insertAdjacentHTML("afterend",newEle);
	x[i].remove();
}

/* Verlinkte Bilder */
x  = document.querySelectorAll(".postlink");
for (i = 0; i < x.length; i++) {
	var ext = ["jpg", "jpeg", "gif", "png", "webp", "bmp", "svg"];
	var url = x[i].getAttribute("href");
	var usa = url.split(".");
	
	/* Wenn auf ein erlaubtes Bild verlinkt wird Attribute setzen */
	if(ext.includes(usa[usa.length-1].toLocaleLowerCase())) {
		x[i].setAttribute("data-fancybox","image");
		x[i].setAttribute("data-caption", url);
	}
}
