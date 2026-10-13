# PHP Manual — Nepali Translation Style Guide
(नेपाली अनुवाद शैली निर्देशिका)

यो निर्देशिका आधिकारिक PHP Manual (php.net) को नेपाली अनुवाद (`doc-ne`) का लागि तय गरिएको मानक हो। यसको उद्देश्य नेपाली विकासकर्ता समुदायका लागि स्पष्ट, प्राकृतिक र प्राविधिक रूपमा त्रुटिरहित म्यानुअल तयार पार्नु हो।

---

## १. अनुवाद दर्शन (Core Translation Philosophy)

यस परियोजनाको मुख्य उद्देश्य **"एक कुशल नेपाली PHP विकासकर्ताले अर्को विकासकर्तालाई सहजै बुझाउने शैली"** मा लेख्नु हो।

- **कुनै कृत्रिम वा मेकानिकल अनुवाद होइन**: रोबोटिक, शब्द-शब्दको शाब्दिक (literal), वा अत्यधिक संस्कृतनिष्ठ अनुवाद पूर्णतया निषेध छ।
- **प्राकृतिक वाक्य संरचना**: नेपाली भाषाको दैनिक बोलचाल र प्राविधिक कुराकानीमा प्रयोग हुने व्याकरण र लवज प्रयोग गर्नुहोस्।
- **सटीक प्राविधिक अर्थ**: मूल अंग्रेजी डकुमेन्टेसनको प्राविधिक अर्थ, सूक्ष्म चेतावनी र नियमहरूलाई दुरुस्त राख्नुपर्छ।

---

## २. शब्दावली नीति (Terminology & Script Policy)

### क. अंग्रेजीमै राख्नुपर्ने प्राविधिक शब्दहरू
संसारभर र नेपालमा पनि सफ्टवेयर विकासकर्ताहरूले बुझ्ने मानक प्राविधिक शब्दहरूलाई अंग्रेजीमै (English script मा) लेख्नुपर्छ। यी शब्दहरूका लागि अनावश्यक वा अप्रचलित नेपाली अनुवाद बनाउन पाइँदैन।

**प्रमुख उदाहरणहरू:**
PHP, software, hardware, computer, program, code, variable, value, function, method, class, object, property, array, string, integer, float, boolean, null, type, interface, trait, namespace, exception, error, callback, reference, pointer, memory, server, client, request, response, database, query, API, CLI, framework, package, library, Composer, extension, runtime, compiler, interpreter, script, syntax, loop, condition, return, parameter, argument, testing, debugging, performance, cache, session, cookie, file, folder, directory, configuration, deployment, HTTP, JSON.

> **नोट:** यो सूची उदाहरण मात्र हो। अन्य कुनै पनि कम्प्युटरसम्बन्धी प्राविधिक शब्द जुन विकासकर्ताहरू माझ स्वाभाविक छ, त्यसलाई अंग्रेजीमै राख्नुपर्छ।

### ख. लिपि नियम (Script Rules)
1. **प्राथमिक लिपि (Primary Script)**: सामान्य नेपाली वाक्य, व्याख्या र क्रियापदहरू **देवनागरी लिपि (Devanagari)** मा लेखिन्छ।
2. **प्राविधिक शब्दावली**: सामान्यतया मौलिक अंग्रेजी हिज्जे (Latin script) मा राखिन्छ।
3. **अनावश्यक लिप्यन्तरण निषेध**: "software" लाई जबरजस्ती "सफ्टवेयर" वा "database" लाई "डाटाबेस" नबनाउनुहोस्, जबसम्म कुनै विशेष शीर्षक वा सन्दर्भले माग गर्दैन।
4. **रोमनाइज्ड नेपाली (Romanized Nepali)**: भविष्यमा दोस्रो प्रस्तुतिको रूपमा विचार गर्न सकिने भए पनि, आधिकारिक अपस्ट्रिम म्यानुअल (`ne`) देवनागरीमा मात्र केन्द्रित रहनेछ।

---

## ३. अनुवादका उदाहरणहरू (Good vs. Bad Examples)

### उदाहरण १: Variable को व्याख्या
- **English**: *"A variable can store a value, which can be changed during program execution."*
- **✅ प्राकृतिक नेपाली (Natural)**:
  > "variable मा कुनै value राख्न सकिन्छ। program चलिरहेको बेला त्यो value परिवर्तन गर्न पनि सकिन्छ।"
- **❌ अस्वीकार्य अनुवाद (Unacceptable / Mechanical)**:
  > "कार्यक्रम निष्पादनको अवधिमा परिवर्तनीय पात्रमा भण्डारित मान परिवर्तन गर्न सकिन्छ।"

### उदाहरण २: Function call गर्ने तरिका
- **English**: *"You can call a function by using its name followed by parentheses."*
- **✅ प्राकृतिक नेपाली (Natural)**:
  > "function call गर्न त्यसको नाम लेखेर पछाडि \"()\" राख्नुपर्छ।"
- **❌ अस्वीकार्य अनुवाद (Unacceptable / Archaic)**:
  > "कार्यको आह्वान निमित्त नामपश्चात् कोष्ठकहरूको प्रयोग गर्नुहोस्।"

### उदाहरण ३: Condition र Loop
- **English**: *"The `if` construct is one of the most important features of many languages, including PHP."*
- **✅ प्राकृतिक नेपाली (Natural)**:
  > "PHP लगायत थुप्रै programming language हरूमा `if` construct एकदमै महत्वपूर्ण विशेषता हो।"
- **❌ अस्वीकार्य अनुवाद (Unacceptable)**:
  > "`यदि` संरचना धेरै भाषाहरूमध्येको एक सबैभन्दा महत्त्वपूर्ण अङ्ग हो।"

---

## ४. अनिवार्य नियमहरू (Mandatory Rules)

1. **प्राकृतिक र पठनीय नेपाली**: वाक्य पढ्दा नेपाली भाषामै सोचेर लेखिएको जस्तो लागोस्, अनुवाद गरिएको यन्त्रवत वाक्य नहोस्।
2. **छोटा र स्पष्ट वाक्य**: लामा र जटिल वाक्यलाई आवश्यक परेमा दुई वा तीनवटा साना, स्पष्ट वाक्यमा विभाजन गर्नुहोस्।
3. **प्राविधिक पहिचानकर्ताको सुरक्षा**: PHP keywords, function names, class names, variable names (`$foo`), XML tags, र XML IDs जस्ताको तस्तै राख्नुपर्छ।
4. **कोड उदाहरणहरू अक्षुण्ण**: उदाहरणका कोड, आउटपुट र सिन्ट्याक्समा कुनै परिवर्तन नगर्नुहोस्।
5. **चेतावनी र Edge Cases**: PHP को सुरक्षा वा चेतावनी (Warnings, Cautions, Notes) मा उल्लिखित शर्तहरूलाई हलुका नबनाउनुहोस्।
6. **कुनै मनगढन्ते व्याख्या होइन**: मूल डकुमेन्टमा नभएको कुरा आफ्नै तर्फबाट थप्ने वा डकुमेन्ट गरिएको व्यवहार बदल्ने काम नगर्नुहोस्।
7. **सम्पादकीय स्तर र प्रुफरिडिङ (Editorial Standards & Proofreading)**: अनुवादको प्राविधिक शुद्धता र भाषाको सरलता कायम राख्न मुख्य प्रबन्धक प्रतिक (Pratik) द्वारा शब्दशः मानव सम्पादन र प्रुफरिडिङ (Human Proofreading) सम्पन्न नभएसम्म नयाँ पृष्ठहरूलाई `Status: draft` राखिन्छ र पूर्ण प्रमाणीकरणपछि मात्र `Status: ready` बनाइन्छ।

---

## ५. DocBook XML र EN-Revision नियम

1. प्रत्येक अनुवादित फाइलको सुरुमा आधिकारिक `EN-Revision` हुनैपर्छ:
   ```xml
   <!-- EN-Revision: [real git commit hash] Maintainer: prateekbhujel Status: [ready|draft] -->
   ```
2. कमिट ह्यास (commit hash) वास्तविक `php/doc-en` को Git history बाटै लिइएको हुनुपर्छ।
3. XML को ढाँचा, Entity सन्दर्भहरू (`&true;`, `&false;`, `&null;`), र आन्तरिक लिङ्कहरू (`<link linkend="...">`) पूर्ण रूपमा मान्य (valid) हुनुपर्छ।
