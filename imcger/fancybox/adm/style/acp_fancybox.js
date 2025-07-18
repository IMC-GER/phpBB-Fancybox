/**
 * Implements the image viewer Fancybox in phpBB.
 * An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2022, Thorsten Ahlers
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */
const imcgerFancybox = {
	fancybox3Transitioneffect: '',
	fancybox5Transitioneffect: '',
	formSelectBox: document.getElementById('imcger_fancybox_transitionEffect'),

	// Customize settings dialog for FancyBox version 3, 4 or 5
	setVersion: function (FancyboxVersion) {
		if (FancyboxVersion == 3) {
			document.getElementById('FancyboxSettingsEffect').style.display = 'block';
			document.getElementById('FancyboxToolbarButtonShare').style.display = 'block';
			document.getElementById('FancyboxToolbarButtonRotate').style.display = 'none';
			this.setElementVisible('.fancybox5', 'none');
			this.setElementVisible('.fancybox3', 'initial');

			if (!this.fancybox3Transitioneffect) {
				this.formSelectBox.selectedIndex = 1;
				this.fancybox3Transitioneffect = this.formSelectBox.value;
			} else {
				this.formSelectBox.value = this.fancybox3Transitioneffect;
			}
		} else if (FancyboxVersion == 4) {
			document.getElementById('FancyboxSettingsEffect').style.display = 'none';
			document.getElementById('FancyboxToolbarButtonShare').style.display = 'none';
			document.getElementById('FancyboxToolbarButtonRotate').style.display = 'none';
		} else if (FancyboxVersion == 5) {
			document.getElementById('FancyboxSettingsEffect').style.display = 'block';
			document.getElementById('FancyboxToolbarButtonShare').style.display = 'none';
			document.getElementById('FancyboxToolbarButtonRotate').style.display = 'block';
			this.setElementVisible('.fancybox3', 'none');
			this.setElementVisible('.fancybox5', 'initial');

			if (!this.fancybox5Transitioneffect) {
				this.formSelectBox.selectedIndex = 1;
				this.fancybox5Transitioneffect = this.formSelectBox.value;
			} else {
				this.formSelectBox.value = this.fancybox5Transitioneffect;
			}
		}
	},
	// Make option in select box visible for Fancybox version
	setElementVisible: function (fancyboxVersion, displayStatus) {
		let elementArray = document.querySelectorAll(fancyboxVersion);

		elementArray.forEach(function (element) {
			element.style.display = displayStatus;
		});
	},
	// Store the SelectBox value for Fancybox version
	changeSelectBox: function () {
		if (document.getElementById('imcger_fancybox_version_3').checked) {
			this.fancybox3Transitioneffect = this.formSelectBox.value;
		}

		if (document.getElementById('imcger_fancybox_version_5').checked) {
			this.fancybox5Transitioneffect = this.formSelectBox.value;
		}
	},
	// Initialise the form
	init: function () {
		let radioButton;

		if (!document.querySelector('input[name="imcger_fancybox_version"]:checked')) {
			document.getElementsByName('imcger_fancybox_version')[0].click();
		}

		radioButton = document.querySelector('input[name="imcger_fancybox_version"]:checked').value;

		if (radioButton == 3) {
			this.fancybox3Transitioneffect = this.formSelectBox.value;
		}

		if (radioButton == 5) {
			this.fancybox5Transitioneffect = this.formSelectBox.value;
		}

		this.setVersion(radioButton);

		this.formSelectBox.addEventListener('change', (event) => {
			this.changeSelectBox();
		});
	},
}

// When loading the page, customize the settings dialog for FancyBox version.
imcgerFancybox.init();
