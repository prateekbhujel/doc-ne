<p align="center"><a href="https://github.com/prateekbhujel/doc-ne" target="_blank">
    <img src="https://www.php.net/images/logos/new-php-logo.svg" alt="PHP" width="140">
</a></p>

<h3 align="center">
  PHP Manual — नेपाली (Nepali Translation of the PHP Manual)
</h3>

<p align="center">
  <a href="CONTRIBUTING.md">योगदान (Contribute)</a>
  <span> | </span>
  <a href="STYLE_GUIDE.md">शैली निर्देशिका (Style Guide)</a>
  <span> | </span>
  <a href="GLOSSARY.md">शब्दावली (Glossary)</a>
  <span> | </span>
  <a href="STATUS.md">अनुवाद स्थिति (Status)</a>
</p>

<p align="center">
  <a href="https://github.com/prateekbhujel/doc-ne/actions/workflows/validate.yml"><img src="https://github.com/prateekbhujel/doc-ne/actions/workflows/validate.yml/badge.svg" alt="Validation CI"></a>
  <a href="STATUS.md"><img src="https://img.shields.io/badge/status-active%20translation-brightgreen.svg" alt="Status"></a>
  <a href="https://creativecommons.org/licenses/by/3.0/"><img src="https://img.shields.io/badge/license-CC--BY%203.0-orange.svg" alt="License: CC-BY 3.0"></a>
</p>

यो आधिकारिक **PHP Manual** को नेपाली अनुवाद भण्डार हो, जसको लक्ष्य अपस्ट्रिम PHP Documentation Project अन्तर्गत [`php/doc-ne`](https://github.com/php/doc-ne) को रूपमा आधिकारिक मान्यता प्राप्त गरी [php.net](https://www.php.net) मा प्रकाशन हुनु हो।

- **भाषा (Language)**: नेपाली / Nepali (`ne`)
- **प्रबन्धक (Maintainer)**: Pratik Bhujel ([@prateekbhujel](https://github.com/prateekbhujel))
- **लक्षित अपस्ट्रिम (Upstream Target)**: `php/doc-ne`
- **स्रोत ढाँचा (Format)**: DocBook XML

---

## अनुवाद दर्शन (Translation Philosophy)

यस परियोजनाको मुख्य नीति **स्वाभाविक देवनागरी नेपाली र स्थापित अङ्ग्रेजी प्राविधिक शब्दावलीको सन्तुलित संयोजन** हो।
- यान्त्रिक, शाब्दिक वा अनावश्यक संस्कृतनिष्ठ अनुवाद निषेध छ।
- `PHP`, `variable`, `value`, `function`, `method`, `class`, `object`, `property`, `array`, `string`, `integer`, `float`, `boolean`, `null`, `type`, `interface`, `trait`, `namespace`, `exception`, `return`, `loop` जस्ता स्थापित प्राविधिक शब्दहरू आफ्नै अङ्ग्रेजी रूपमा राखिन्छन्।
- विस्तृत नियमहरू [STYLE_GUIDE.md](STYLE_GUIDE.md) र शब्दावली वर्गीकरण [GLOSSARY.md](GLOSSARY.md) मा उल्लिखित छन्।

---

## अनुवाद स्थिति (Translation Status)

सिकारु र कार्यरत विकासकर्ताहरूका लागि आवश्यक आधारभूत अध्यायहरू पूर्ण रूपमा अनुवाद गरी प्रमाणीकरण गरिएको छ:
- **अनुवादित फाइलहरू**: ४६
- **प्रकाशित तथा स्वीकृत फाइलहरू (`ready`)**: ४६ (१००%)
- **समीक्षाधीन मस्यौदा (`draft`)**: ०
- **अनुमानित शब्द सङ्ख्या**: ~४३,४००+ शब्द

अध्याय-वार विस्तृत प्रगति विवरण [STATUS.md](STATUS.md) मा हेर्न सकिन्छ।

---

## स्थानीय परीक्षण र निर्माण (Build & Validation)

### १. प्रमाणीकरण (Validation Harness)
```bash
php tools/validate.php
```

### २. स्थानीय HTML Preview निर्माण (PhD Build)
```bash
php tools/build.php
```
निर्माण सम्पन्न भएपछि `preview/php-chunked-xhtml/index.html` खोलेर स्थानीय preview हेर्न सकिन्छ।

---

## योगदान (Contributing)

योगदान गर्न इच्छुक हुनुहुन्छ भने कृपया [CONTRIBUTING.md](CONTRIBUTING.md) हेर्नुहोस्।

---

## अनुमतिपत्र (License)

PHP Documentation Group को मूल प्रतिलिपि अधिकार अन्तर्गत यो अनुवाद [Creative Commons Attribution 3.0 License (CC-BY 3.0)](https://creativecommons.org/licenses/by/3.0/) मा उपलब्ध छ।
