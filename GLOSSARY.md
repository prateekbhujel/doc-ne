# PHP Manual — Nepali Technical Glossary
(प्राविधिक शब्दावली कोष)

यो शब्दावलीले आधिकारिक PHP Manual को नेपाली अनुवादमा प्रयोग हुने मानक प्राविधिक शब्दहरूको नीति निर्धारण गर्दछ। यसको उद्देश्य अनुवादमा एकरूपता कायम गर्नु र विकासकर्ताहरूका लागि परिचित शब्दावली सुरक्षित गर्नु हो।

---

## १. शब्दावली नियम (Core Terminology Rules)

1. **अंग्रेजीमै सुरक्षित राख्ने (Retain in English)**: विकासकर्ताहरूले कोडिङ गर्दा वा प्राविधिक छलफल गर्दा प्रयोग गर्ने शब्दहरूलाई नेपाली हिज्जेमा जबर्जस्ती अनुवाद गर्नु हुँदैन।
2. **सिक्का बनाउन निषेध (No Invented Neologisms)**: "Variable" लाई "परिवर्तनीय पात्र", "Function" लाई "कार्य", वा "Compiler" लाई "संकलक" जस्ता कृत्रिम शब्दहरू प्रयोग गर्न पूर्णतया निषेध गरिएको छ।
3. **नेपाली विभक्ति र व्याकरणको सहज संयोजन**: अंग्रेजी शब्दसँग नेपाली नामयोगी र विभक्तिहरू स्वाभाविक रूपमा जोडिन्छन् (जस्तै: `function मा`, `array भित्र`, `class बाट`, `method लाई`)।

---

## २. शब्दावली तालिका (Standard Terminology Mapping)

| अंग्रेजी शब्द (English Term) | मानक प्रयोग (Standard Usage) | निषेधित / अस्वाभाविक अनुवाद (Prohibited) |
| :--- | :--- | :--- |
| **PHP** | PHP | पी.एच.पी. |
| **software** | software | सफ्टवेयर (अनावश्यक रूपमा) / यन्त्र-आज्ञा |
| **hardware** | hardware | हार्डवेयर / भौतिक यन्त्र |
| **code / coding** | code / coding | संकेत / सांकेतिक भाषा |
| **program / programming** | program / programming | कार्यक्रम / कार्यक्रमण |
| **variable** | variable | परिवर्तनीय / चल / अस्थिर मान |
| **value** | value | मान (केही सन्दर्भमा) / मूल्य |
| **constant** | constant | अचर / स्थिर मान |
| **function** | function | कार्य / प्रकार्य |
| **method** | method | विधि / तरिका |
| **class** | class | वर्ग / श्रेणी |
| **object** | object | वस्तु / तत्व |
| **property** | property | गुण / सम्पत्ति |
| **array** | array | सूची / लस्कर / व्यूह |
| **string** | string | डोरी / अक्षरमाला / सूत्र |
| **integer** | integer | पूर्णाङ्क (गणितबाहेक कोडमा integer नै) |
| **float / floating point** | float | दशमलव संख्या |
| **boolean** | boolean | सत्य/असत्य मान (कोडमा boolean) |
| **null** | null | शून्य / रित्तो |
| **type / data type** | type / data type | प्रकार / स्वरूप |
| **interface** | interface | अन्तरपृष्ठ / सम्पर्कबिन्दु |
| **trait** | trait | गुणधर्म / विशेषता |
| **enum / enumeration** | enum | गणना सूची |
| **namespace** | namespace | नाम-स्थान |
| **exception** | exception | अपवाद |
| **error** | error | त्रुटि / गल्ती |
| **callback** | callback | पुनःआह्वान |
| **reference** | reference | सन्दर्भ / संकेत |
| **pointer** | pointer | सूचक |
| **memory** | memory | स्मरण शक्ति / भण्डारण |
| **server** | server | सेवक यन्त्र / सेवाप्रदायक |
| **client** | client | ग्राहक यन्त्र |
| **request** | request | अनुरोध |
| **response** | response | प्रतिक्रिया / उत्तर |
| **database** | database | तथ्याङ्क भण्डार |
| **query** | query | सोधपुछ / प्रश्न |
| **API** | API | ए.पी.आई. |
| **CLI** | CLI (Command Line Interface) | कमाण्ड लाइन इन्टरफेस |
| **framework** | framework | ढाँचा |
| **package** | package | पोको / थैलो |
| **library** | library | पुस्तकालय |
| **Composer** | Composer | कम्पोजर |
| **extension** | extension | विस्तार / थप अङ्ग |
| **runtime** | runtime | चालू अवस्था / निष्पादन काल |
| **compiler** | compiler | संकलक |
| **interpreter** | interpreter | अनुवादक / दोभाषे |
| **script** | script | लिपि / कार्यतालिका |
| **syntax** | syntax | वाक्य संरचना / नियम |
| **loop** | loop | चक्र / फन्को |
| **condition** | condition | शर्त |
| **return** | return (वा return गर्ने) | फिर्ता पठाउने |
| **parameter** | parameter | मापदण्ड / इनपुट मान |
| **argument** | argument | तर्क / पठाइएको मान |
| **testing** | testing | परीक्षण |
| **debugging** | debugging | किरा मार्ने / बग हटाउने |
| **performance** | performance | कार्यक्षमता / गति |
| **cache / caching** | cache / caching | गुप्त भण्डारण / क्यास |
| **session** | session | सत्र |
| **cookie** | cookie | कुकी / बिस्कुट |
| **file** | file | फाइल / अभिलेख |
| **folder / directory** | folder / directory | फोल्डर / निर्देशिका |
| **configuration** | configuration (वा config) | विन्यास / संरचना सेटिङ |
| **deployment** | deployment | तैनाथी / प्रत्यक्ष प्रसारण |
| **HTTP** | HTTP | एच.टी.टी.पी. |
| **JSON** | JSON | जेसन |

---

## ३. सामान्य शब्द र तिनीहरूको मानक नेपाली रूप

केही गैर-प्राविधिक वा सामान्य अंग्रेजी शब्दहरूलाई नेपालीमा स्वाभाविक रूपमा लेखिन्छ:

- **default**: डिफल्ट
- **example**: उदाहरण
- **note**: नोट
- **warning**: चेतावनी
- **caution**: सावधानी
- **tip**: सुझाव
- **important**: महत्वपूर्ण
- **see also**: यो पनि हेर्नुहोस्
- **description**: विवरण
- **changelog**: परिवर्तन इतिहास (Changelog)
- **table of contents**: विषयसूची
- **user-defined**: प्रयोगकर्ता-परिभाषित (वा विकासकर्ताले बनाएको)
- **predefined**: पूर्वपरिभाषित
