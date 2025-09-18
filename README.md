# TYPO3 Extension `masterplan`

[![Packagist][packagist-logo-stable]][extension-packagist-url]
[![Latest Stable Version][extension-build-shield]][extension-ter-url]
[![Total Downloads][extension-downloads-badge]][extension-packagist-url]
[![Monthly Downloads][extension-monthly-downloads]][extension-packagist-url]
[![TYPO3 13.4][TYPO3-shield]][TYPO3-13-url]

![Build Status](https://github.com/jweiland-net/jw_forms/workflows/CI/badge.svg)

With masterplan you can create and show projects you're currently working on and show detail information
onto your website. You can define start- and end date, add some pictures or additional files for download.

## 1 Usage

### 1.1 Installation

#### Installation using Composer

The recommended way to install the extension is using Composer.

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/masterplan
```

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install `masterplan` with the extension manager module.

### 1.2 Minimal setup

1) Include the static TypoScript of the extension.
2) Create a masterplan records on a sysfolder.
3) Create a plugin on a page and select at least the sysfolder as startingpoint.

## 2 Support

Free Support is available via [Github Issue Tracker](https://github.com/jweiland-net/masterplan/issues).

For commercial support, please contact us at [support@jweiland.net](support@jweiland.net).

<!-- MARKDOWN LINKS & IMAGES -->

[extension-build-shield]: https://poser.pugx.org/jweiland/masterplan/v/stable.svg?style=for-the-badge

[extension-downloads-badge]: https://poser.pugx.org/jweiland/masterplan/d/total.svg?style=for-the-badge

[extension-monthly-downloads]: https://poser.pugx.org/jweiland/masterplan/d/monthly?style=for-the-badge

[extension-ter-url]: https://extensions.typo3.org/extension/masterplan/

[extension-packagist-url]: https://packagist.org/packages/jweiland/masterplan/

[packagist-logo-stable]: https://img.shields.io/badge/--grey.svg?style=for-the-badge&logo=packagist&logoColor=white

[TYPO3-13-url]: https://get.typo3.org/version/13

[TYPO3-shield]: https://img.shields.io/badge/TYPO3-13.4-green.svg?style=for-the-badge&logo=typo3
