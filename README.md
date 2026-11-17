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
  <span> | </span>
  <a href="https://prateekbhujel.github.io/doc-ne/"><strong>प्रत्यक्ष पूर्वावलोकन (Live Preview)</strong></a>
</p>

<p align="center">
  <a href="https://prateekbhujel.github.io/doc-ne/"><img src="https://img.shields.io/badge/docs-live%20preview-blue.svg" alt="Live Docs"></a>
  <a href="https://github.com/prateekbhujel/doc-ne/actions/workflows/validate.yml"><img src="https://github.com/prateekbhujel/doc-ne/actions/workflows/validate.yml/badge.svg" alt="Validation CI"></a>
  <a href="STATUS.md"><img src="https://img.shields.io/badge/status-active%20translation-brightgreen.svg" alt="Status"></a>
  <a href="https://creativecommons.org/licenses/by/3.0/"><img src="https://img.shields.io/badge/license-CC--BY%203.0-orange.svg" alt="License: CC-BY 3.0"></a>
</p>

यो **PHP Manual** को सामग्री नेपाली भाषामा अनुवाद गर्ने समुदाय-आधारित परियोजना हो। यसको लक्ष्य PHP Documentation Project अन्तर्गत [`php/doc-ne`](https://github.com/php/doc-ne) को रूपमा आधिकारिक मान्यता प्राप्त गरी [php.net](https://www.php.net) मा प्रकाशन हुनु हो। हाल यो स्वतन्त्र अनुवाद परियोजना हो, आधिकारिक `php.net` नेपाली म्यानुअल होइन।

- **भाषा (Language)**: नेपाली / Nepali (`ne`)
- **प्रबन्धक (Maintainer)**: Pratik Bhujel ([@prateekbhujel](https://github.com/prateekbhujel))
- **लक्षित अपस्ट्रिम (Upstream Target)**: `php/doc-ne`
- **स्रोत ढाँचा (Format)**: DocBook XML

---

## अनुवाद दर्शन (Translation Philosophy)

यस परियोजनाको मुख्य नीति **स्वाभाविक देवनागरी नेपाली र स्थापित अङ्ग्रेजी प्राविधिक शब्दावलीको सन्तुलित संयोजन** हो।
- यान्त्रिक, शाब्दिक वा अनावश्यक संस्कृतनिष्ठ अनुवाद निषेध छ।
- `PHP`, `variable`, `value`, `function`, `method`, `class`, `object`, `property`, `array`, `string`, `integer`, `float`, `boolean`, `null`, `type`, `interface`, `trait`, `namespace`, `exception`, `return`, `loop` जस्ता स्थापित प्राविधिक शब्दहरू आफ्नै अङ्ग्रेजी रूपमा राखिन्छन्।
- मानक नेपाली व्याकरण (नेपाल प्रज्ञा-प्रतिष्ठान), चन्द्रबिन्दु (ँ), ह्रस्व-दीर्घ र स्वाभाविक वर्गीकरण (एउटा, दुईवटा) को पूर्ण पालना गरिन्छ।
- विस्तृत नियमहरू [STYLE_GUIDE.md](STYLE_GUIDE.md) र शब्दावली वर्गीकरण [GLOSSARY.md](GLOSSARY.md) मा उल्लिखित छन्।

अनुवादको भाषा, प्राविधिक अर्थ र code examples को अन्तिम समीक्षा Pratik Bhujel ले गर्नुहुन्छ। नयाँ अनुवाद वा परिमार्जनलाई `draft` राखिन्छ र उहाँको समीक्षा तथा स्वीकृतिपछि `ready` बनाइन्छ।

---

## अनुवाद स्थिति (Translation Status)

[STATUS.md](STATUS.md) अनुसार:
- **अनुवादित XML फाइलहरू**: ५५१
- **`ready` चिह्न लगाइएका फाइलहरू**: १६५
- **`draft` चिह्न लगाइएका फाइलहरू**: ३८६

यी सङ्ख्याहरू यस भण्डारमा अनुवाद भएका XML फाइलहरूको स्थिति हुन्। हाल परिमार्जन गरिएका १२ फाइलहरू र नयाँ तयार गरिएका ३७४ फाइलहरू अन्तिम मानवीय समीक्षाका लागि `draft` मा छन्। सम्पूर्ण PHP Manual को अनुवाद जारी छ; अनुवाद नभएका पृष्ठहरूमा मूल अङ्ग्रेजी सामग्री स्वतः प्रयोग हुन्छ। अद्यावधिक फाइल-वार विवरण [STATUS.md](STATUS.md) मा छ।

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

### ३. नेपाली अक्षरको प्रस्तुति (Typography)

Preview ले PHP Manual को मूल PhD theme कायम राख्छ। नेपाली देवनागरी पाठ स्पष्ट र सहज रूपमा पढ्न सकियोस् भनेर अतिरिक्त [typography stylesheet](resources/styles/ne-typography.css) मा **Noto Sans Devanagari** (Google Fonts) लाई प्राथमिक वेब फन्टका रूपमा प्रयोग गरिएको छ, साथै **Annapurna SIL** र अन्य स्थानीय system fonts लाई fallback को रूपमा राखिएको छ।
- English programming terms का लागि विद्यमान Latin font fallback कायम छ।
- Code blocks को monospace styling बदलिएको छैन।
- नेपाली मात्रा (ु, ू, ृ, े, ै, ं, ँ) नखप्टिऊन् भनेर उपयुक्त line-height (1.65) कायम गरिएको छ।

---

## योगदान (Contributing)

योगदान गर्न इच्छुक हुनुहुन्छ भने कृपया [CONTRIBUTING.md](CONTRIBUTING.md) हेर्नुहोस्।

---

## अनुमतिपत्र (License)

PHP Documentation Group को मूल प्रतिलिपि अधिकार अन्तर्गत यो अनुवाद [Creative Commons Attribution 3.0 License (CC-BY 3.0)](https://creativecommons.org/licenses/by/3.0/) मा उपलब्ध छ।
